<?php

namespace App\Controller;

use App\Entity\ReviewBonPlan;
use App\Entity\BonPlan;
use App\Form\ReviewBonPlanType;
use App\Repository\ReviewBonPlanRepository;
use App\Repository\BonPlanRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/review/bon/plan')]
final class ReviewBonPlanController extends AbstractController
{
    #[Route('/', name: 'app_reviewbonplan_index', methods: ['GET'])]
    public function index(ReviewBonPlanRepository $reviewBonPlanRepository, BonPlanRepository $bonPlanRepository, UserRepository $userRepository): Response
    {
        $reviews = $reviewBonPlanRepository->findBy([], ['idR' => 'DESC']);
        
        // Préparer les données pour la vue
        $reviewsData = [];
        foreach ($reviews as $review) {
            $bonPlan = $review->getBonPlan();
            $userId = $review->getIdU();
            
            // On pourrait récupérer les infos utilisateur ici si besoin
            // $user = $userRepository->find($userId);
            
            $reviewsData[] = [
                'review' => $review,
                'bonPlan' => $bonPlan,
                'userId' => $userId
            ];
        }
        
        return $this->render('reviewbonplan/index.html.twig', [
            'reviewsData' => $reviewsData,
        ]);
    }

    #[Route('/admin', name: 'app_reviewbonplan_admin', methods: ['GET'])]
    public function admin(ReviewBonPlanRepository $reviewBonPlanRepository, BonPlanRepository $bonPlanRepository): Response
    {
        // Récupérer toutes les reviews avec leurs relations
        $reviews = $reviewBonPlanRepository->findAll();
        
        // Récupérer tous les bons plans pour le formulaire d'ajout
        $bonplans = $bonPlanRepository->findAll();
        
        return $this->render('reviewbonplan/admin.html.twig', [
            'reviews' => $reviews,
            'bonplans' => $bonplans,
        ]);
    }

    #[Route('/new', name: 'app_reviewbonplan_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, BonPlanRepository $bonPlanRepository): Response
    {
        $reviewBonPlan = new ReviewBonPlan();
        $form = $this->createForm(ReviewBonPlanType::class, $reviewBonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reviewBonPlan);
            $entityManager->flush();

            // Rediriger vers la page d'admin si on vient de là
            $referer = $request->headers->get('referer');
            if (strpos($referer, 'admin') !== false) {
                return $this->redirectToRoute('app_reviewbonplan_admin');
            }
            
            return $this->redirectToRoute('app_reviewbonplan_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reviewbonplan/new.html.twig', [
            'reviewbonplan' => $reviewBonPlan,
            'form' => $form,
        ]);
    }

    #[Route('/{idR}', name: 'app_reviewbonplan_show', methods: ['GET'])]
    public function show(ReviewBonPlan $reviewBonPlan, BonPlanRepository $bonPlanRepository): Response
    {
        $bonPlan = $reviewBonPlan->getBonPlan();
        
        return $this->render('reviewbonplan/show.html.twig', [
            'reviewbonplan' => $reviewBonPlan,
            'bonplan' => $bonPlan,
        ]);
    }

    #[Route('/{idR}/edit', name: 'app_reviewbonplan_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReviewBonPlan $reviewBonPlan, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReviewBonPlanType::class, $reviewBonPlan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Rediriger vers la page d'admin si on vient de là
            $referer = $request->headers->get('referer');
            if (strpos($referer, 'admin') !== false) {
                return $this->redirectToRoute('app_reviewbonplan_admin');
            }
            
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

        // Rediriger vers la page d'admin si on vient de là
        $referer = $request->headers->get('referer');
        if (strpos($referer, 'admin') !== false) {
            return $this->redirectToRoute('app_reviewbonplan_admin');
        }
        
        return $this->redirectToRoute('app_reviewbonplan_index', [], Response::HTTP_SEE_OTHER);
    }

    // API Methods for AJAX
    
    #[Route('/api/add', name: 'api_reviewbonplan_add', methods: ['POST'])]
    public function apiAdd(Request $request, EntityManagerInterface $entityManager, BonPlanRepository $bonPlanRepository): JsonResponse
    {
        try {
            // Get data from request
            $bonPlanId = $request->request->get('bonplanId');
            $rating = $request->request->get('rating');
            $comment = $request->request->get('comment');
            
            // Validate data
            if (!$bonPlanId || !$rating || !$comment) {
                return $this->json(['success' => false, 'message' => 'Tous les champs sont requis'], 400);
            }
            
            // Find BonPlan
            $bonPlan = $bonPlanRepository->find($bonPlanId);
            if (!$bonPlan) {
                return $this->json(['success' => false, 'message' => 'Bon plan non trouvé'], 404);
            }
            
            // Create and save review
            $review = new ReviewBonPlan();
            $review->setBonPlan($bonPlan);
            $review->setRating((int)$rating);
            $review->setCommente($comment);
            
            // TODO: Get real user ID from session
            $review->setIdU(1);
            
            $entityManager->persist($review);
            $entityManager->flush();
            
            return $this->json([
                'success' => true, 
                'message' => 'Avis ajouté avec succès',
                'reviewId' => $review->getIdR()
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur: ' . $e->getMessage()], 500);
        }
    }
    
    #[Route('/api/{idR}/edit', name: 'api_reviewbonplan_edit', methods: ['POST'])]
    public function apiEdit(ReviewBonPlan $reviewBonPlan, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            // Get data from request
            $rating = $request->request->get('rating');
            $comment = $request->request->get('comment');
            
            // Validate data
            if (!$rating || !$comment) {
                return $this->json(['success' => false, 'message' => 'Tous les champs sont requis'], 400);
            }
            
            // Update review
            $reviewBonPlan->setRating((int)$rating);
            $reviewBonPlan->setCommente($comment);
            
            $entityManager->flush();
            
            return $this->json([
                'success' => true, 
                'message' => 'Avis modifié avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur: ' . $e->getMessage()], 500);
        }
    }
    
    #[Route('/api/{idR}/delete', name: 'api_reviewbonplan_delete', methods: ['POST'])]
    public function apiDelete(ReviewBonPlan $reviewBonPlan, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            $entityManager->remove($reviewBonPlan);
            $entityManager->flush();
            
            return $this->json([
                'success' => true, 
                'message' => 'Avis supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur: ' . $e->getMessage()], 500);
        }
    }
    
    #[Route('/api/list/{idP}', name: 'api_reviewbonplan_list', methods: ['GET'])]
    public function apiListByBonPlan(BonPlan $bonPlan, ReviewBonPlanRepository $reviewBonPlanRepository): JsonResponse
    {
        try {
            $reviews = $reviewBonPlanRepository->findBy(['bonPlan' => $bonPlan], ['idR' => 'DESC']);
            
            $reviewsData = [];
            foreach ($reviews as $review) {
                $reviewsData[] = [
                    'id' => $review->getIdR(),
                    'rating' => $review->getRating(),
                    'comment' => $review->getCommente(),
                    'userId' => $review->getIdU()
                ];
            }
            
            return $this->json([
                'success' => true,
                'reviews' => $reviewsData
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'message' => 'Erreur: ' . $e->getMessage()], 500);
        }
    }
}
