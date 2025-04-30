<?php

namespace App\Controller;

use App\Repository\BonPlanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class AssistantController extends AbstractController
{
    #[Route('/voyageurs/ai-assistant', name: 'ai_assistant_page')]
    public function index(): Response
    {
        return $this->render('dashVoyageurs/aiAssistant.html.twig');
    }

    #[Route('/api/assistant/suggestions', name: 'api_assistant_suggestions', methods: ['POST'])]
    public function getSuggestions(Request $request, BonPlanRepository $bonPlanRepository, LoggerInterface $logger): JsonResponse
    {
        try {
            // Enable CORS
            $response = new JsonResponse();
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'POST');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');

            // Log the incoming request
            $logger->info('Received suggestions request', [
                'method' => $request->getMethod(),
                'content_type' => $request->headers->get('Content-Type'),
                'content_length' => $request->headers->get('Content-Length'),
                'client_ip' => $request->getClientIp()
            ]);

            // Verify content type
            if (!$request->headers->has('Content-Type') || $request->headers->get('Content-Type') !== 'application/json') {
                $logger->warning('Invalid content type', [
                    'received' => $request->headers->get('Content-Type')
                ]);
                throw new \Exception('Content-Type must be application/json');
            }

            $content = $request->getContent();
            if (empty($content)) {
                $logger->warning('Empty request body');
                throw new \Exception('Request body is empty');
            }

            $data = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $logger->error('JSON decode error', [
                    'error' => json_last_error_msg(),
                    'content' => $content
                ]);
                throw new \Exception('Invalid JSON: ' . json_last_error_msg());
            }

            $location = $data['location'] ?? '';
            $preferences = $data['preferences'] ?? [];

            $logger->info('Processing search request', [
                'location' => $location,
                'preferences' => $preferences
            ]);

            if (empty($location)) {
                $logger->warning('Empty location parameter');
                return $response->setData([
                    'error' => 'La localisation est requise'
                ]);
            }

            // Recherche des bons plans
            $logger->info('Searching for bon plans');
            $bonPlans = $bonPlanRepository->findByLocationAndPreferences($location);
            $logger->info('Found bon plans', ['count' => count($bonPlans)]);

            $suggestions = [];
            foreach ($bonPlans as $bonPlan) {
                // Score simple basé sur les préférences
                $score = 0;
                foreach ($preferences as $preference) {
                    $preference = strtolower($preference);
                    if (str_contains(strtolower($bonPlan->getDescription()), $preference) ||
                        str_contains(strtolower($bonPlan->getNomplace()), $preference) ||
                        str_contains(strtolower($bonPlan->getTypePlace()), $preference)) {
                        $score += 1;
                    }
                }

                // Ajouter seulement si le score est positif ou s'il n'y a pas de préférences
                if ($score > 0 || empty($preferences)) {
                    $suggestions[] = [
                        'title' => $bonPlan->getNomplace(),
                        'description' => $bonPlan->getDescription(),
                        'location' => $bonPlan->getLocalisation(),
                        'type' => $bonPlan->getTypePlace(),
                        'link' => $this->generateUrl('bonplanVoyageurs_page', ['id' => $bonPlan->getIdP()]),
                        'score' => $score
                    ];
                }
            }

            // Trier par score si des préférences sont définies
            if (!empty($preferences)) {
                usort($suggestions, function($a, $b) {
                    return $b['score'] - $a['score'];
                });
            }

            $logger->info('Preparing response', [
                'suggestions_count' => count($suggestions)
            ]);

            if (empty($suggestions)) {
                return $response->setData([
                    'suggestions' => "Désolé, je n'ai pas trouvé de bons plans correspondant à vos critères pour $location."
                ]);
            }

            // Formater la réponse
            $responseText = "Voici les bons plans que j'ai trouvés à $location :\n\n";
            foreach (array_slice($suggestions, 0, 10) as $suggestion) {
                $responseText .= "🏠 {$suggestion['title']}\n";
                $responseText .= "📍 {$suggestion['location']}\n";
                if ($suggestion['type']) {
                    $responseText .= "🏷️ {$suggestion['type']}\n";
                }
                $responseText .= "ℹ️ {$suggestion['description']}\n";
                $responseText .= "🔗 " . $request->getSchemeAndHttpHost() . $suggestion['link'] . "\n\n";
            }

            $logger->info('Sending successful response');
            return $response->setData([
                'suggestions' => $responseText
            ]);

        } catch (\Exception $e) {
            $logger->error('Error in getSuggestions', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return new JsonResponse([
                'error' => 'Une erreur est survenue lors de la recherche. ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/assistant/suggestions', name: 'api_assistant_suggestions_preflight', methods: ['OPTIONS'])]
    public function handlePreflightRequest(): Response
    {
        $response = new Response();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
} 