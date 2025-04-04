<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/social/media')]
class SocialMediaController extends AbstractController
{
    #[Route(name: 'app_social_media_index', methods: ['GET'])]
public function index(SocialMediaRepository $socialMediaRepository, PaginatorInterface $paginator, Request $request): Response
{
    // Création du query builder pour la pagination
    $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
        ->select('s', 'u') // Sélectionner les données du post et de l'utilisateur
        ->leftJoin('s.user', 'u')
        ->orderBy('s.publicationDate', 'DESC');

    // Pagination
    $pagination = $paginator->paginate(
        $queryBuilder,
        $request->query->getInt('page', 1),  // Récupérer le numéro de page de l'URL ou mettre 1 par défaut
        5 // 5 articles par page
    );

    // Vérification de la requête AJAX
    if ($request->isXmlHttpRequest()) {
        // Rendre uniquement le contenu partiel pour AJAX
        return $this->render('social_media/_index_content.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    // Si ce n'est pas une requête AJAX, on charge la page entière
    return $this->render('social_media/index.html.twig', [
        'pagination' => $pagination,
    ]);
}

    // --- Action NEW ---
    #[Route('/new', name: 'app_social_media_new', methods: ['GET', 'POST'])]
    // #[IsGranted('IS_AUTHENTICATED_FULLY')] // Re-enable security before production
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $socialMedia = new SocialMedia();

        // Assign the current user or fallback to a default user
        $loggedInUser = $this->getUser();
        $socialMedia->setUser($loggedInUser ?? $this->getDefaultUser($entityManager));

        // Set other defaults
        $socialMedia->setImagemedia('');
        $socialMedia->setPublicationDate(new \DateTimeImmutable());
        $socialMedia->setLikee(0);
        $socialMedia->setDislike(0);

        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleImageUpload($form, $socialMedia, $slugger, $request);
            $entityManager->persist($socialMedia);
            $entityManager->flush();

            return $this->handlePostSaveRedirect($request, $entityManager, $socialMedia);
        }

        return $this->renderCustomForm($request, 'social_media/new.html.twig', $socialMedia, $form, 'Ajouter');
    }

    // --- Action SHOW ---
    #[Route('/{idEB}', name: 'app_social_media_show', methods: ['GET'], requirements: ['idEB' => '\d+'])]
    public function show(Request $request, SocialMedia $socialMedia): Response
    {
        return $this->renderShow($request, 'social_media/show.html.twig', $socialMedia);
    }

    // --- Action EDIT ---
    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'], requirements: ['idEB' => '\d+'])]
    // #[IsGranted('POST_EDIT', subject: 'socialMedia')] // Re-enable security before production
    public function edit(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $originalImage = $socialMedia->getImagemedia() ?? '';
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleImageUpload($form, $socialMedia, $slugger, $request, $originalImage);
            $entityManager->flush();

            return $this->handlePostSaveRedirect($request, $entityManager, $socialMedia);
        }

        return $this->renderCustomForm($request, 'social_media/edit.html.twig', $socialMedia, $form, 'Mettre à jour');
    }

    // --- Action DELETE ---
    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    // #[IsGranted('POST_DELETE', subject: 'socialMedia')] // Re-enable security before production
    public function delete(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager): Response
    {
        $tokenName = 'delete' . $socialMedia->getIdEB();
        $isValidToken = $this->isCsrfTokenValid($tokenName, $request->request->get('_token'));
        $isAjax = $request->isXmlHttpRequest();

        if ($isValidToken) {
            $this->handleImageDeletion($socialMedia);
            $entityManager->remove($socialMedia);
            $entityManager->flush();

            return $isAjax ? $this->renderUpdatedIndex($entityManager) : $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->renderUpdatedIndex($entityManager);
        }
    }

    // --- Helper Methods ---
    private function getDefaultUser(EntityManagerInterface $entityManager): User
    {
        $defaultUser = $entityManager->getRepository(User::class)->find(1);
        if ($defaultUser) {
            return $defaultUser;
        } else {
            throw new \LogicException('Default user ID 1 not found.');
        }
    }

    private function handleImageUpload($form, SocialMedia $socialMedia, SluggerInterface $slugger, Request $request, $originalImage = null)
    {
        $imageFile = $form->get('imagemedia')->getData();
        if ($imageFile instanceof UploadedFile) {
            $this->uploadImage($imageFile, $slugger, $socialMedia);
            if ($originalImage && $originalImage !== $socialMedia->getImagemedia()) {
                @unlink($this->getParameter('uploads_directory') . '/' . $originalImage);
            }
        } else {
            $socialMedia->setImagemedia($originalImage);
        }
    }

    private function uploadImage(UploadedFile $imageFile, SluggerInterface $slugger, SocialMedia $socialMedia)
    {
        $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
        try {
            $imageFile->move($this->getParameter('uploads_directory'), $newFilename);
            $socialMedia->setImagemedia($newFilename);
        } catch (FileException $e) {
            $this->addFlash('error', 'Image upload failed: ' . $e->getMessage());
            throw $e;
        }
    }

    private function handleImageDeletion(SocialMedia $socialMedia)
    {
        $imageFilename = $socialMedia->getImagemedia();
        if ($imageFilename) {
            @unlink($this->getParameter('uploads_directory') . '/' . $imageFilename);
        }
    }

    private function handlePostSaveRedirect(Request $request, EntityManagerInterface $entityManager, SocialMedia $socialMedia): Response
    {
        if ($request->isXmlHttpRequest()) {
            return $this->renderUpdatedIndex($entityManager);
        } else {
            $this->addFlash('success', 'Publication saved!');
            return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        }
    }

    private function renderUpdatedIndex(EntityManagerInterface $entityManager): Response
    {
        $paginator = $this->container->get('knp_paginator');
        $repo = $entityManager->getRepository(SocialMedia::class);
        $queryBuilder = $repo->createQueryBuilder('s')
            ->select('s', 'u')
            ->leftJoin('s.user', 'u')
            ->orderBy('s.publicationDate', 'DESC');
        $pagination = $paginator->paginate($queryBuilder, 1, 5);

        return $this->render('social_media/_index_content.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    protected function renderCustomForm(Request $request, string $template, SocialMedia $socialMedia, $form, string $buttonLabel): Response
    {
        $status = ($form->isSubmitted() && !$form->isValid()) ? Response::HTTP_UNPROCESSABLE_ENTITY : Response::HTTP_OK;
        return $this->render($request->isXmlHttpRequest() ? 'social_media/_form.html.twig' : $template, [
            'social_media' => $socialMedia,
            'form' => $form->createView(),
            'button_label' => $buttonLabel,
        ], new Response(null, $status));
    }

    private function renderShow(Request $request, string $template, SocialMedia $socialMedia): Response
    {
        if ($request->isXmlHttpRequest()) {
            return $this->render('social_media/_show_content.html.twig', [
                'social_media' => $socialMedia,
            ]);
        }

        return $this->render($template, [
            'social_media' => $socialMedia,
        ]);
    }
    // --- Action AJOUTER COMMENTAIRE ---
    #[Route('/{idEB}/commentaire', name: 'app_social_media_ajouter_commentaire', methods: ['POST'], requirements: ['idEB' => '\d+'])]
    public function ajouterCommentaire(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager): Response
    {
        // Vérification de l'existence du commentaire
        $content = $request->request->get('content');
        if (empty($content)) {
            $this->addFlash('error', 'Le commentaire ne peut pas être vide.');
            return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
        }

        // Création du nouveau commentaire
        $commentaire = new Commentaire();
        $commentaire->setContent($content);
        $commentaire->setSocialMedia($socialMedia);
        $commentaire->setUser($this->getUser());  // Utiliser l'utilisateur connecté

        // Enregistrement dans la base de données
        $entityManager->persist($commentaire);
        $entityManager->flush();

        // Réponse AJAX
        if ($request->isXmlHttpRequest()) {
            // Récupération du dernier commentaire pour l'afficher dans la réponse AJAX
            $lastComment = $entityManager->getRepository(Commentaire::class)->findOneBy([], ['createdAt' => 'DESC']);
            
            // Rendre la vue du commentaire ajouté
            return $this->render('social_media/_commentaire.html.twig', [
                'commentaire' => $lastComment
            ]);
        }

        // Redirection vers la page de la publication
        $this->addFlash('success', 'Commentaire ajouté avec succès !');
        return $this->redirectToRoute('app_social_media_show', ['idEB' => $socialMedia->getIdEB()]);
    }
}
