<?php

namespace App\Controller;

use App\Service\GeminiAIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AiAssistantController extends AbstractController
{
    private GeminiAIService $geminiService;

    public function __construct(GeminiAIService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

    #[Route('/api/assistant/suggestions', name: 'api_assistant_suggestions', methods: ['POST'])]
    public function getSuggestions(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $location = $data['location'] ?? '';
        $preferences = $data['preferences'] ?? [];
        $types = $data['types'] ?? [];

        if (empty($location)) {
            return new JsonResponse(['error' => 'Location is required'], 400);
        }

        try {
            $suggestions = $this->geminiService->getBonPlanSuggestions($location, $preferences, $types);
            return new JsonResponse($suggestions);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
} 