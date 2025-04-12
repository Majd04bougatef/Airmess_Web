<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SocialMediaRepository;
use App\Service\ForbiddenWordsChecker;

#[Route('/commentaire')]
final class CommentaireController extends AbstractController
{
    public function __construct(
        private \App\Service\ForbiddenWordsChecker $forbiddenWordsChecker
    ) {
    }
    
    #[Route('/', name: 'app_commentaire_index', methods: ['GET'])]
    public function index(CommentaireRepository $commentaireRepository): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'commentaires' => $commentaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_commentaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_commentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaire/new.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form,
        ]);
    }

    #[Route('/ajouter/{idEB}', name: 'ajouter_commentaire', methods: ['POST'])]
    public function ajouterCommentaire(Request $request, SocialMediaRepository $smRepo, EntityManagerInterface $em, int $idEB): Response
    {
        $socialMedia = $smRepo->find($idEB);

        if (!$socialMedia) {
            throw $this->createNotFoundException("Publication non trouvée.");
        }

        $content = $request->request->get('description');
        if (empty($content)) {
            $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $idEB]);
        }

        if ($this->forbiddenWordsChecker->containsForbiddenWords($content)) {
            $this->addFlash('error', 'Le commentaire contient des mots interdits.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $idEB]);
        }

        $commentaire = new Commentaire();
        $commentaire->setDescription($content);
        $commentaire->setSocialMedia($socialMedia);
        $commentaire->setUser($this->getUser());
        $commentaire->setNumberlike(0);
        $commentaire->setNumberdislike(0);

        $em->persist($commentaire);
        $em->flush();

        if ($request->isXmlHttpRequest()) {
            return $this->render('commentaire/_commentaire.html.twig', [
                'commentaire' => $commentaire
            ]);
        }

        $this->addFlash('success', 'Commentaire ajouté avec succès !');
        return $this->redirectToRoute('app_social_media_show', ['idEB' => $idEB]);
    }

    #[Route('/{idC}', name: 'app_commentaire_show', methods: ['GET'])]
    public function show(Commentaire $commentaire): Response
    {
        return $this->render('commentaire/show.html.twig', [
            'commentaire' => $commentaire,
        ]);
    }

    #[Route('/{idC}/edit', name: 'app_commentaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        // Check if the user is allowed to edit this comment
        if ($commentaire->getUser()->getIdU() != 1) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }
        
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Commentaire modifié avec succès !');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }

        return $this->render('commentaire/edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idC}/delete', name: 'app_commentaire_delete', methods: ['POST'])]
    public function delete(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        $socialMediaId = $commentaire->getSocialMedia()->getIdEB();
        
        // Check if the user is allowed to delete this comment
        if ($commentaire->getUser()->getIdU() != 1) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMediaId]);
        }
        
        if ($this->isCsrfTokenValid('delete'.$commentaire->getIdC(), $request->request->get('_token'))) {
            $entityManager->remove($commentaire);
            $entityManager->flush();
            $this->addFlash('success', 'Commentaire supprimé avec succès !');
        }

        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMediaId]);
    }

    #[Route('/{idC}/like', name: 'app_commentaire_like', methods: ['POST'])]
    public function likeCommentaire(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('like_commentaire' . $commentaire->getIdC(), $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'error' => 'Invalid CSRF token'], 403);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }
        
        // Vérifier si l'utilisateur a déjà liké ce commentaire
        $session = $request->getSession();
        $userCommentActions = $session->get('user_comment_actions', []);
        $commentId = $commentaire->getIdC();
        
        try {
            // Si l'utilisateur a déjà liké ce commentaire, retirer le like
            if (isset($userCommentActions[$commentId]) && $userCommentActions[$commentId] === 'like') {
                $commentaire->setNumberlike($commentaire->getNumberlike() - 1);
                unset($userCommentActions[$commentId]);
                $message = 'J\'aime retiré du commentaire!';
                $isLiked = false;
            } 
            // Sinon, ajouter un like
            else {
                $commentaire->setNumberlike($commentaire->getNumberlike() + 1);
                $userCommentActions[$commentId] = 'like';
                $message = 'Commentaire aimé!';
                $isLiked = true;
            }
            
            // Sauvegarder les actions de l'utilisateur et le commentaire
            $session->set('user_comment_actions', $userCommentActions);
            $entityManager->flush();
            
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => true,
                    'likeCount' => $commentaire->getNumberlike(),
                    'message' => $message,
                    'isLiked' => $isLiked
                ]);
            }
            
            $this->addFlash('success', $message);
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
            
        } catch (\Exception $e) {
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => false, 
                    'error' => 'Erreur de base de données: ' . $e->getMessage()
                ], 500);
            }
            
            $this->addFlash('error', 'Erreur lors de l\'ajout du j\'aime au commentaire.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }
    }

    /**
     * Helper method to check if the current user is allowed to modify/delete a comment
     */
    private function isUserAllowedToModifyComment(Commentaire $commentaire): bool
    {
        // Vérifier si le commentaire appartient à l'utilisateur avec l'ID 1 (utilisateur par défaut)
        return $commentaire->getUser()->getIdU() === 1;
    }

    #[Route('/{idC}/edit-ajax', name: 'app_commentaire_edit_ajax', methods: ['POST'])]
    public function editAjax(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        // Check if the user is allowed to edit this comment
        if ($commentaire->getUser()->getIdU() != 1) {
            return $this->json([
                'success' => false,
                'error' => 'Vous n\'êtes pas autorisé à modifier ce commentaire.'
            ], 403);
        }
        
        $description = $request->request->get('description');
        
        // Validation de base
        if (empty(trim($description))) {
            return $this->json([
                'success' => false,
                'error' => 'Le commentaire ne peut pas être vide.'
            ], 400);
        }
        
        // Vérifier les mots interdits
        $forbiddenWords = $this->forbiddenWordsChecker->containsForbiddenWords($description);
        if (!empty($forbiddenWords)) {
            return $this->json([
                'success' => false,
                'error' => 'Votre commentaire contient des mots interdits: ' . implode(', ', $forbiddenWords)
            ], 400);
        }
        
        try {
            // Mettre à jour le commentaire
            $commentaire->setDescription($description);
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'message' => 'Commentaire modifié avec succès!',
                'description' => $description
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'error' => 'Erreur lors de la modification: ' . $e->getMessage()
            ], 500);
        }
    }
}
