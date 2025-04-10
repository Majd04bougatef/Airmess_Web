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
    #[Route(name: 'app_commentaire_index', methods: ['GET'])]
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
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commentaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaire/edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form,
        ]);
    }

    #[Route('/{idC}', name: 'app_commentaire_delete', methods: ['POST'])]
    public function delete(Request $request, Commentaire $commentaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaire->getIdC(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($commentaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commentaire_index', [], Response::HTTP_SEE_OTHER);
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
        $commentaire->setDateCommentaire(new \DateTimeImmutable());
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

}
