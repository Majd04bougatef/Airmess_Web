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
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;


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
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $bonPlan = new BonPlan();
        $form = $this->createForm(BonPlanType::class, $bonPlan);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
    
            $imageFile = $form->get('imageBP')->getData();
    
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
    
                try {
                    $imageFile->move(
                        $this->getParameter('uploads_directory'), // défini dans services.yaml
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Une erreur est survenue lors de l\'upload de l\'image.');
                    return $this->redirectToRoute('app_bonplan_new');
                }
    
                $bonPlan->setImageBP($newFilename); // Assure-toi que l'entité a bien ce setter
            } else {
                $this->addFlash('error', 'L\'image est requise.');
                return $this->redirectToRoute('app_bonplan_new');
            }
    
            $entityManager->persist($bonPlan);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_bonplan_index');
        }
    
        return $this->render('bonplan/new.html.twig', [
            'form' => $form,
            'bonplan' => $bonPlan,
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