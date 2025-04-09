<?php

namespace App\Controller;

use App\Entity\BonPlan;
use App\Form\BonPlanType;
use App\Repository\BonPlanRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/bon/plan')]
final class BonPlanController extends AbstractController
{
    #[Route(name: 'app_bonplan_index', methods: ['GET'])]
    public function index(BonPlanRepository $bonPlanRepository): Response
    {
        return $this->render('bonplan/index.html.twig', [
            'bonplans' => $bonPlanRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bonplan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bonPlan = new BonPlan();
        $form = $this->createForm(BonPlanType::class, $bonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bonPlan);
            $entityManager->flush();

            return $this->redirectToRoute('app_bonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bonplan/new.html.twig', [
            'bonplan' => $bonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idP}', name: 'app_bonplan_show', methods: ['GET'])]
    public function show(BonPlan $bonPlan): Response
    {
        return $this->render('bonplan/show.html.twig', [
            'bonplan' => $bonPlan,
        ]);
    }

    #[Route('/{idP}/edit', name: 'app_bonplan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BonPlanType::class, $bonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bonplan/edit.html.twig', [
            'bonplan' => $bonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idP}', name: 'app_bonplan_delete', methods: ['POST'])]
    public function delete(Request $request, BonPlan $bonPlan, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bonPlan->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bonPlan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bonplan_index', [], Response::HTTP_SEE_OTHER);
    }
}
