<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiAIService
{
    private const API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent';
    private string $apiKey;
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient, string $geminiApiKey = 'AIzaSyCSz2PN-1QYS4XUB2Zn1usswaetD_Vg-KY')
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $geminiApiKey;
    }

    public function generateResponse(string $prompt): array
    {
        // Log pour déboguer
        error_log("Envoi à Gemini API avec la clé: " . substr($this->apiKey, 0, 5) . "...");
        error_log("Prompt envoyé: " . substr($prompt, 0, 100) . "...");
        
        try {
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
                ],
                'timeout' => 30 // Augmenter le timeout pour laisser le temps à l'API de répondre
            ]);
            
            $responseArray = $response->toArray();
            error_log("Réponse Gemini reçue: " . (empty($responseArray) ? "VIDE" : "OK"));
            
            return $responseArray;
        } catch (\Exception $e) {
            error_log("ERREUR GEMINI API: " . $e->getMessage());
            throw $e;
        }
    }

    public function getBonPlanSuggestions(string $location, array $preferences = [], array $types = []): array
    {
        // Vérifier si l'API key est valide
        if (empty($this->apiKey) || $this->apiKey === 'AIzaSyBfpRBjyYF3yoZgXeh02RJNjQGqR1DSSiM') {
            error_log("AVERTISSEMENT: Utilisation d'une clé API par défaut qui pourrait ne pas fonctionner");
        }
        
        // Construction d'un prompt plus spécifique pour générer de nouveaux bons plans
        $prompt = "Tu es un expert local et un guide touristique passionné qui connaît parfaitement {$location}. 
        
        TÂCHE IMPORTANTE: Tu DOIS proposer des bons plans CRÉATIFS, ORIGINAUX et INVENTIFS pour {$location}. Tes suggestions doivent être uniques et différentes des recommandations touristiques standards.
        
        Important: Mentionne quelque part dans chaque suggestion '✅ Suggestion d'IA, non issue de base de données' pour indiquer clairement que ce sont des suggestions originales.";
        
        // Toujours proposer un mélange de différents types de lieux
        $prompt .= "Propose un mélange équilibré avec exactement: 
        - 1 restaurant ou café atypique avec une décoration ou concept original
        - 1 lieu culturel alternatif ou peu connu des guides touristiques
        - 1 activité locale authentique que seuls les habitants connaissent
        - 1 endroit secret ou insolite avec une histoire étonnante";
        
        $prompt .= "Format requis pour CHAQUE suggestion:
        
        ## [NOM CRÉATIF] 
        📍 [ADRESSE OU QUARTIER PRÉCIS]
        
        ✨ **Pourquoi c'est unique**: [Description créative et inspirante]
        
        🔑 **Expérience spéciale**: [Un aspect qui rend ce lieu particulier]
        
        ⏰ **Meilleur moment pour visiter**: [Timing idéal et ambiance particulière]
        
        Fournis EXACTEMENT 4 suggestions pour {$location}. Utilise un ton enthousiaste et personnel.
        N'utilise JAMAIS de formulations comme 'Je n'ai pas trouvé' ou 'Voici quelques suggestions générales'.
        ASSURE-TOI que tes suggestions semblent des découvertes uniques et non des attractions touristiques évidentes.";
        
        try {
            $response = $this->generateResponse($prompt);
            return $this->formatResponse($response);
        } catch (\Exception $e) {
            error_log("Erreur dans getBonPlanSuggestions: " . $e->getMessage());
            
            // En cas d'échec avec l'API, fournir une réponse de secours claire
            return [
                'suggestions' => "## Suggestions créatives pour {$location} (générées par IA) \n\n" .
                               "💡 **Café Imaginaire** \n" .
                               "📍 Centre-ville de {$location} \n\n" .
                               "Un café bohème avec une bibliothèque rotative et des chaises suspendues. \n\n" .
                               "🌟 **Musée des Curiosités Locales** \n" .
                               "📍 Quartier historique \n\n" .
                               "Une collection fascinante d'objets insolites liés à l'histoire secrète de {$location}. \n\n" .
                               "⚠️ *Note: Ces suggestions ont été générées artificiellement suite à un problème de connexion à l'API Gemini.*",
                'status' => 'fallback',
                'error' => $e->getMessage(),
                'source' => 'gemini_api_fallback'
            ];
        }
    }

    private function formatResponse(array $response): array
    {
        // Extraire le texte de la réponse
        $text = $response['candidates'][0]['content']['parts'][0]['text'] ?? '';
        
        // Log de debug pour voir la réponse complète
        error_log("Réponse Gemini brute: " . (empty($text) ? "VIDE" : substr($text, 0, 200) . "..."));
        error_log("Structure de la réponse: " . json_encode(array_keys($response)));
        
        // Vérifier si la réponse est vide ou trop courte
        if (empty($text) || strlen($text) < 50) {
            error_log("Réponse Gemini trop courte ou vide, utilisation d'un message par défaut");
            $text = "## Voici des suggestions personnalisées pour vous:\n\n" .
                   "Je n'ai pas pu générer des recommandations détaillées cette fois-ci, mais voici quelques idées pour votre voyage.\n\n" .
                   "Essayez de préciser votre demande ou d'ajouter des préférences plus spécifiques.";
        }
        
        // Renvoyer la réponse complète de l'IA sans modification
        return [
            'suggestions' => $text,
            'status' => 'success',
            'source' => 'gemini_api' // Indiquer la source de la réponse
        ];
    }
} 