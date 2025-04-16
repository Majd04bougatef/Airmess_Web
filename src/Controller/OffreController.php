<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\OffreStatus;

#[Route('/offres')]
final class OffreController extends AbstractController
{
    #[Route(name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository): Response
    {
        return $this->render('dashVoyageurs/offrePageVoyageurs.html.twig', [
            'offres' => $offreRepository->findAll(),
        ]);
    }

    #[Route('/offre/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offre);
            $entityManager->flush();

            $this->addFlash('success', 'Nouvelle offre créée avec succès.');

            return $this->redirectToRoute('offreEntreprise_page');
        }

        return $this->render('offre/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{idO}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre): Response
    {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
    }

    #[Route('/offre/{idO}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistre les modifications dans la base de données
            $entityManager->flush();

            // Ajoute un message de succès
            $this->addFlash('success', 'Les modifications ont été enregistrées avec succès.');

            // Redirige vers la page offrePageEntreprise
            return $this->redirectToRoute('offreEntreprise_page');
        }

        return $this->render('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/offre/{idO}/delete', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $offre->getIdO(), $request->request->get('_token'))) {
            $entityManager->remove($offre);
            $entityManager->flush();

            $this->addFlash('success', 'Offre supprimée avec succès.');
        }

        return $this->redirectToRoute('offreEntreprise_page');
    }

    #[Route('/offre/{idO}/confirm', name: 'app_offre_confirm', methods: ['POST'])]
    public function confirm(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('confirm' . $offre->getIdO(), $request->request->get('_token'))) {
            $offre->setStatusoff(OffreStatus::CONFIRME);
            $entityManager->flush();

            $this->addFlash('success', 'Offre confirmée avec succès.');
        }

        return $this->redirectToRoute('app_offre_page');
    }

    #[Route('/offre/{idO}/reject', name: 'app_offre_reject', methods: ['POST'])]
    public function reject(Request $request, Offre $offre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('reject' . $offre->getIdO(), $request->request->get('_token'))) {
            $offre->setStatusoff(OffreStatus::REJETE);
            $entityManager->flush();

            $this->addFlash('success', 'Offre rejetée avec succès.');
        }

        return $this->redirectToRoute('app_offre_page');
    }
}
