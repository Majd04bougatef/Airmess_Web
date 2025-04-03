<?php

namespace App\Controller;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Form\SocialMediaType;
use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/social/media')]
final class SocialMediaController extends AbstractController
{
    #[Route(name: 'app_social_media_index', methods: ['GET'])]
    public function index(SocialMediaRepository $socialMediaRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $queryBuilder = $socialMediaRepository->createQueryBuilder('s')
            ->orderBy('s.publicationDate', 'DESC'); // Tri par date de publication

        $pagination = $paginator->paginate(
            $queryBuilder, 
            $request->query->getInt('page', 1), // Numéro de page
            10 // Nombre de posts par page
        );

        return $this->render('social_media/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_social_media_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $socialMedia = new SocialMedia();
        $form = $this->createForm(SocialMediaType::class, $socialMedia);
        $form->handleRequest($request);

        // Assurer que l'utilisateur est authentifié
        $user = $this->getUser();
        if ($user instanceof User) {
            $socialMedia->setUser($user); // Lier l'utilisateur à la publication
        } else {
            // Si l'utilisateur n'est pas authentifié, lier un utilisateur par défaut (ID 1)
            $socialMedia->setUser($entityManager->getRepository(User::class)->find(1));
        }

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
        // Vérifier le token CSRF
        if ($this->isCsrfTokenValid('delete' . $socialMedia->getIdEB(), $request->request->get('_token'))) {
            $entityManager->remove($socialMedia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_social_media_index', [], Response::HTTP_SEE_OTHER);
    }
}
