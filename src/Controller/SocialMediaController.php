<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/social/media')]
final class SocialMediaController extends AbstractController{
    #[Route(name: 'app_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository): Response
    {
        return $this->render('social_media/index.html.twig', [
            'social_media' => $socialMediaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_social_media_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $socialMedia = new SocialMedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($socialMedia);
            $entityManager->flush();

            return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('social_media/new.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form,
        ]);
    }

    #[Route('/{idEB}', name: 'app_social_media_show', methods: ['GET'])]
    public function show(SocialMedia $socialMedia): Response
    {
        return $this->render('social_media/show.html.twig', [
            'social_media' => $socialMedia,
        ]);
    }

    #[Route('/{idEB}/edit', name: 'app_social_media_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('social_media/edit.html.twig', [
            'social_media' => $socialMedia,
            'form' => $form,
        ]);
    }

    #[Route('/{idEB}', name: 'app_social_media_delete', methods: ['POST'])]
    public function delete(Request $request, SocialMedia $socialMedia, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socialMedia->getIdEB(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($socialMedia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
    }
}
