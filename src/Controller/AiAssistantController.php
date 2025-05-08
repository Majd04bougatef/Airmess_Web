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
        
        // Ne pas utiliser les préférences et types pour être sûr de contourner la base de données
        $preferences = [];
        $types = [];

        if (empty($location)) {
            return new JsonResponse(['error' => 'Location is required'], 400);
        }

        try {
            // Forcer l'utilisation de Gemini AI UNIQUEMENT
            $suggestions = $this->geminiService->getBonPlanSuggestions($location, $preferences, $types);
            
            // Ajouter une note claire que cette réponse vient de l'IA et non de la base de données
            $suggestions['source'] = 'gemini_ai_forced';
            
            return new JsonResponse($suggestions);
        } catch (\Exception $e) {
            error_log("ERREUR AI ASSISTANT: " . $e->getMessage());
            return new JsonResponse([
                'error' => $e->getMessage(),
                'trace' => 'Erreur lors de l\'appel à Gemini API. Voir les logs pour plus de détails.'
            ], 500);
        }
    }
} 