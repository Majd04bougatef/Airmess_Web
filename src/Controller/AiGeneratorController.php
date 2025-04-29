<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AiGeneratorController extends AbstractController
{
    private $httpClient;
    private $geminiApiKey;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        // Idéalement, récupérer la clé API depuis les paramètres de l'application
        $this->geminiApiKey = $_ENV['GEMINI_API_KEY'] ?? null;
    }

    #[Route('/api/generate-description', name: 'app_generate_ai_description', methods: ['POST'])]
    public function generateDescription(Request $request): JsonResponse
    {
        try {
            // Vérifier si la clé API est configurée
            if (!$this->geminiApiKey) {
                return $this->json([
                    'success' => false,
                    'message' => 'Clé API Gemini non configurée'
                ], 500);
            }

            // Récupérer les données d'entrée de l'offre
            $data = json_decode($request->getContent(), true);
            
            if (!$data) {
                return $this->json([
                    'success' => false,
                    'message' => 'Données JSON invalides'
                ], 400);
            }

            $place = $data['place'] ?? '';
            $startDate = $data['startDate'] ?? '';
            $endDate = $data['endDate'] ?? '';
            $priceInit = $data['priceInit'] ?? '';
            $priceAfter = $data['priceAfter'] ?? '';
            $description = $data['description'] ?? '';

            // Construire le prompt pour Gemini
            $prompt = "Génère une description attractive pour une offre touristique avec les détails suivants:\n";
            $prompt .= "Lieu: $place\n";
            $prompt .= "Date de début: $startDate\n";
            $prompt .= "Date de fin: $endDate\n";
            $prompt .= "Prix initial: $priceInit €\n";
            $prompt .= "Prix après réduction: $priceAfter €\n";
            $prompt .= "Description existante: $description\n\n";
            $prompt .= "La description doit être vendeuse, attrayante, en français, environ 200 mots, et mettre en valeur la réduction. Évite les phrases génériques et inclus des détails spécifiques sur le lieu si possible.";

            // Utiliser la version Gemini 1.5 Flash pour une meilleure performance
            $geminiRequestData = [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 800,
                ]
            ];
            
            // Appeler l'API Gemini (en utilisant l'API la plus récente)
            $response = $this->httpClient->request(
                'POST', 
                'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent', 
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'query' => [
                        'key' => $this->geminiApiKey,
                    ],
                    'json' => $geminiRequestData
                ]
            );

            $content = $response->toArray();

            // Log la réponse complète pour le débogage
            error_log(json_encode($content));

            // Extraire la description générée
            if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                $generatedText = $content['candidates'][0]['content']['parts'][0]['text'];
                
                return $this->json([
                    'success' => true,
                    'description' => $generatedText
                ]);
            } else {
                // Si le premier format n'existe pas, essayons un autre modèle (Gemini Pro)
                $response = $this->httpClient->request(
                    'POST', 
                    'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent', 
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'query' => [
                            'key' => $this->geminiApiKey,
                        ],
                        'json' => $geminiRequestData
                    ]
                );
                
                $content = $response->toArray();
                
                if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                    $generatedText = $content['candidates'][0]['content']['parts'][0]['text'];
                    
                    return $this->json([
                        'success' => true,
                        'description' => $generatedText
                    ]);
                }
                
                return $this->json([
                    'success' => false,
                    'message' => 'Aucune description générée',
                    'error' => $content['error']['message'] ?? 'Erreur inconnue',
                    'modelInfo' => 'Essayez de mettre à jour votre clé API pour avoir accès aux modèles Gemini les plus récents'
                ], 500);
            }
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur lors de la génération: ' . $e->getMessage()
            ], 500);
        }
    }
} 