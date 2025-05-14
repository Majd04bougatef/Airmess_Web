<?php

namespace App\Controller;

use App\Entity\BonPlan;
use App\Repository\BonPlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VrExperienceController extends AbstractController
{
    #[Route('/bonplan/{id}/vr', name: 'app_bonplan_vr')]
    public function viewBonplanVR(BonPlan $bonplan): Response
    {
        return $this->render('bonplan/vr_experience.html.twig', [
            'bonplan' => $bonplan,
        ]);
    }

    #[Route('/bonplan/vr/list', name: 'app_bonplan_vr_list')]
    public function listVRExperiences(BonPlanRepository $bonPlanRepository): Response
    {
        // Only get bonplans that have VR content
        $bonplansWithVR = $bonPlanRepository->findBy(['hasVRContent' => true]);
        
        return $this->render('bonplan/vr_list.html.twig', [
            'bonplans' => $bonplansWithVR,
        ]);
    }
} 