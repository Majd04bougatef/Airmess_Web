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
                    'temperature' => 0.7,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 1024,
                ]
            ]
        ]);

        return $response->toArray();
    }

    public function getBonPlanSuggestions(string $location, array $preferences = [], array $types = []): array
    {
        $prompt = "En tant qu'assistant de voyage, suggère des bons plans et activités à {$location}";
        
        if (!empty($types)) {
            $prompt .= " en te concentrant sur les types suivants : " . implode(", ", $types);
        }
        
        if (!empty($preferences)) {
            $prompt .= " en tenant compte des préférences suivantes : " . implode(", ", $preferences);
        }
        
        $response = $this->generateResponse($prompt);
        return $this->formatResponse($response);
    }

    private function formatResponse(array $response): array
    {
        // Extraire le texte de la réponse
        $text = $response['candidates'][0]['content']['parts'][0]['text'] ?? '';
        
        // Formater la réponse
        return [
            'suggestions' => $text,
            'status' => 'success'
        ];
    }
} 