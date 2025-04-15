<?php

namespace App\Controller;

use App\Entity\ReviewBonPlan;
use App\Form\ReviewBonPlanType;
use App\Repository\ReviewBonPlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/review/bon/plan')]
final class ReviewBonPlanController extends AbstractController
{
    #[Route(name: 'app_reviewbonplan_index', methods: ['GET'])]
    public function index(ReviewBonPlanRepository $reviewBonPlanRepository): Response
    {
        return $this->render('reviewbonplan/index.html.twig', [
            'reviewbonplans' => $reviewBonPlanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reviewbonplan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reviewBonPlan = new ReviewBonPlan();
        $form = $this->createForm(ReviewBonPlanType::class, $reviewBonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reviewBonPlan);
            $entityManager->flush();

            return $this->redirectToRoute('app_reviewbonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reviewbonplan/new.html.twig', [
            'reviewbonplan' => $reviewBonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idR}', name: 'app_reviewbonplan_show', methods: ['GET'])]
    public function show(ReviewBonPlan $reviewBonPlan): Response
    {
        return $this->render('reviewbonplan/show.html.twig', [
            'reviewbonplan' => $reviewBonPlan,
        ]);
    }

    #[Route('/{idR}/edit', name: 'app_reviewbonplan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReviewBonPlan $reviewBonPlan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReviewBonPlanType::class, $reviewBonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reviewbonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reviewbonplan/edit.html.twig', [
            'reviewbonplan' => $reviewBonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idR}', name: 'app_reviewbonplan_delete', methods: ['POST'])]
    public function delete(Request $request, ReviewBonPlan $reviewBonPlan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reviewBonPlan->getIdR(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reviewBonPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reviewbonplan_index', [], Response::HTTP_SEE_OTHER);
    }
}
