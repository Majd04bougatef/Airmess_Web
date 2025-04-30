<?php

namespace App\Controller;

use App\Service\AvailabilityService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api', name: 'api_')]
class AvailabilityController extends AbstractController
{
    private $availabilityService;
    
    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }
    
    /**
     * Endpoint pour récupérer les disponibilités d'un lieu par son nom
     */
    #[Route('/availability/search', name: 'availability_search', methods: ['GET'])]
    public function searchAvailability(Request $request): JsonResponse
    {
        $placeName = $request->query->get('place_name');
        
        if (empty($placeName)) {
            return $this->json([
                'success' => false,
                'error' => 'Le nom du lieu est requis'
            ], 400);
        }
        
        $result = $this->availabilityService->searchAvailability($placeName);
        
        return $this->json($result);
    }
} 