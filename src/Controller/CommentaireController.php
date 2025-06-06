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
use App\Service\GeminiService;

/**
 * Contrôleur pour la gestion des commentaires
 * 
 * Note: Pour ajouter des commentaires à une publication, utilisez préférentiellement la méthode 
 * ajouterCommentaire du SocialMediaController (route: app_social_media_ajouter_commentaire)
 * La méthode ajouterCommentaire de ce contrôleur est maintenue pour compatibilité mais redirige
 * vers la méthode principale.
 */
#[Route('/commentaire')]
final class CommentaireController extends AbstractController
{
    public function __construct(
        private \App\Service\ForbiddenWordsChecker $forbiddenWordsChecker,
        private GeminiService $geminiService
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
        $session = $request->getSession();
        if (!$session->has('user_id') || $commentaire->getUser()->getIdU() != $session->get('user_id')) {
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }
        
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Vérifier les mots interdits
                $forbiddenWords = $this->forbiddenWordsChecker->containsForbiddenWords($commentaire->getDescription());
                if (!empty($forbiddenWords)) {
                    return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
                }

                // Améliorer le texte avec Gemini
                $improvedDescription = $this->geminiService->improveText($commentaire->getDescription());
                $commentaire->setDescription($improvedDescription);

                $entityManager->flush();

                // Redirection silencieuse
                return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
            } catch (\Exception $e) {
                return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
            }
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
        $session = $request->getSession();
        if (!$session->has('user_id') || $commentaire->getUser()->getIdU() != $session->get('user_id')) {
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMediaId]);
        }
        
        if ($this->isCsrfTokenValid('delete'.$commentaire->getIdC(), $request->request->get('_token'))) {
            $entityManager->remove($commentaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMediaId]);
    }

    #[Route('/{idC}/like', name: 'app_commentaire_like', methods: ['POST'])]
    public function likeCommentaire(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('like_commentaire' . $commentaire->getIdC(), $submittedToken)) {
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
                $isLiked = false;
            } 
            // Sinon, ajouter un like
            else {
                $commentaire->setNumberlike($commentaire->getNumberlike() + 1);
                $userCommentActions[$commentId] = 'like';
                $isLiked = true;
            }
            
            // Sauvegarder les actions de l'utilisateur et le commentaire
            $session->set('user_comment_actions', $userCommentActions);
            $entityManager->flush();
            
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => true,
                    'likeCount' => $commentaire->getNumberlike(),
                    'isLiked' => $isLiked
                ]);
            }
            
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
            
        } catch (\Exception $e) {
            if ($request->isXmlHttpRequest()) {
                return $this->json([
                    'success' => false, 
                    'error' => 'Erreur de base de données: ' . $e->getMessage()
                ], 500);
            }
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $commentaire->getSocialMedia()->getIdEB()]);
        }
    }

    /**
     * Helper method to check if the current user is allowed to modify/delete a comment
     */
    private function isUserAllowedToModifyComment(Commentaire $commentaire, Request $request): bool
    {
        $session = $request->getSession();
        // Check if user is logged in and is the owner of the comment
        return $session->has('user_id') && $commentaire->getUser()->getIdU() === $session->get('user_id');
    }

    #[Route('/{idC}/edit-ajax', name: 'app_commentaire_edit_ajax', methods: ['POST'])]
    public function editAjax(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        // Check if the user is allowed to edit this comment
        $session = $request->getSession();
        if (!$session->has('user_id') || $commentaire->getUser()->getIdU() != $session->get('user_id')) {
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
