<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiAIService
{
    private const API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    private string $apiKey;
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient, string $geminiApiKey = 'AIzaSyBfpRBjyYF3yoZgXeh02RJNjQGqR1DSSiM')
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $geminiApiKey;
    }

    public function generateResponse(string $prompt): array
    {
        $response = $this->httpClient->request('POST', self::API_URL . '?key=' . $this->apiKey, [
            'json' => [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.9,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 2048,
                ]
            ]
        ]);

        return $response->toArray();
    }

    public function getBonPlanSuggestions(string $location, array $preferences = [], array $types = []): array
    {
        // Construction d'un prompt plus spécifique pour générer de nouveaux bons plans
        $prompt = "Tu es un expert local et un guide touristique passionné qui connaît parfaitement {$location}. 
        
        TÂCHE: Propose des bons plans VARIÉS, CONCRETS, DÉTAILLÉS et SPÉCIFIQUES à {$location}. Tu DOIS absolument fournir des réponses, même si tu n'es pas certain. Ne dis JAMAIS que tu n'as pas trouvé de bons plans correspondants.";
        
        // Toujours proposer un mélange de différents types de lieux
        $prompt .= "Propose un mélange équilibré avec exactement: 
        - 1 restaurant unique ou café spécial
        - 1 lieu culturel intéressant (musée, monument, etc.)
        - 1 activité locale ou expérience authentique
        - 1 lieu secret ou peu connu des touristes";
        
        $prompt .= "Format requis pour CHAQUE suggestion:
        
        ## [NOM DU LIEU]
        📍 [ADRESSE OU QUARTIER PRÉCIS]
        
        ✨ **Pourquoi y aller**: [Description vivante et détaillée de 3-4 phrases]
        
        🔑 **Le secret d'initié**: [Un conseil unique que seuls les locaux connaissent]
        
        ⏰ **Meilleur moment pour visiter**: [Indication de la période ou moment de la journée idéal]
        
        Fournis EXACTEMENT 4 suggestions pour {$location}. Utilise un ton enthousiaste et personnel. 
        N'utilise PAS de formulations comme 'Je n'ai pas trouvé' ou 'Voici quelques suggestions générales'.
        Assure-toi que chaque suggestion soit unique et non-touristique.";
        
        $response = $this->generateResponse($prompt);
        return $this->formatResponse($response);
    }

    private function formatResponse(array $response): array
    {
        // Extraire le texte de la réponse
        $text = $response['candidates'][0]['content']['parts'][0]['text'] ?? '';
        
        // Log de debug pour voir la réponse complète
        error_log('Réponse Gemini brute: ' . substr($text, 0, 500) . '...');
        
        // Vérifier si la réponse est vide ou trop courte
        if (empty($text) || strlen($text) < 50) {
            $text = "## Voici des suggestions personnalisées pour vous:\n\n" .
                   "Je n'ai pas pu générer des recommandations détaillées cette fois-ci, mais voici quelques idées pour votre voyage.\n\n" .
                   "Essayez de préciser votre demande ou d'ajouter des préférences plus spécifiques.";
        }
        
        // Renvoyer la réponse complète de l'IA sans modification
        return [
            'suggestions' => $text,
            'status' => 'success'
        ];
    }
} 