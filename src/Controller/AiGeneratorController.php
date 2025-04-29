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

    #[Route('/api/station-recommendation', name: 'app_station_recommendation', methods: ['POST'])]
    public function generateStationRecommendation(Request $request): JsonResponse
    {
        try {
            // Vérifier si la clé API est configurée
            if (!$this->geminiApiKey) {
                return $this->json([
                    'success' => false,
                    'message' => 'Clé API Gemini non configurée'
                ], 500);
            }

            // Récupérer les données d'entrée de la station
            $data = json_decode($request->getContent(), true);
            
            if (!$data) {
                return $this->json([
                    'success' => false,
                    'message' => 'Données JSON invalides'
                ], 400);
            }

            $nom = $data['nom'] ?? '';
            $capacite = $data['capacite'] ?? '';
            $nombreVelo = $data['nombreVelo'] ?? '';
            $typeVelo = $data['typeVelo'] ?? '';
            $prixHeure = $data['prixHeure'] ?? '';
            $pays = $data['pays'] ?? '';
            $latitude = $data['latitude'] ?? '';
            $longitude = $data['longitude'] ?? '';
            $analysePays = $data['analyse_pays'] ?? false;

            // Construire le prompt pour Gemini en fonction du type d'analyse
            $prompt = "Analyse pour l'implantation d'une nouvelle station de vélos dans le pays: $pays.\n\n";
            
            if ($analysePays) {
                $prompt .= "Fais une analyse concise avec ces sections (maximum 150 mots au total, 1-2 phrases par section):\n\n";
                $prompt .= "1. **Emplacements recommandés**\n";
                $prompt .= "   - Liste uniquement 2-3 villes recommandées et un quartier précis pour chacune\n\n";
                $prompt .= "2. **Types de vélos**\n";
                $prompt .= "   - Recommande uniquement un des trois types de vélos suivants : vélo électrique, vélo de route, ou vélo urbain\n\n";
                $prompt .= "3. **Tarification**\n";
                $prompt .= "   - Suggère seulement une fourchette de prix par heure\n\n";
                $prompt .= "4. **Capacité**\n";
                $prompt .= "   - Donne une simple recommandation approximative de capacité\n\n";
                $prompt .= "5. **Estimation des réservations**\n";
                $prompt .= "   - Estime le nombre moyen de réservations par jour en basse et haute saison, avec un nombre précis pour chaque période\n";
                $prompt .= "   - Format: 'X-Y réservations/jour en basse saison, Z-W réservations/jour en haute saison'\n\n";
                $prompt .= "Format: Très concis, avec titres en gras.";
            } else {
                $prompt = "En tant qu'expert en mobilité urbaine et en location de vélos, analyse cette station de vélos et donne des recommandations détaillées sur:\n\n";
                $prompt .= "Nom de la station: $nom\n";
                $prompt .= "Capacité totale: $capacite vélos\n";
                $prompt .= "Nombre de vélos disponibles: $nombreVelo\n";
                $prompt .= "Type de vélos: $typeVelo\n";
                $prompt .= "Prix horaire: $prixHeure €\n";
                $prompt .= "Pays: $pays\n";
                $prompt .= "Coordonnées: Latitude $latitude, Longitude $longitude\n\n";
                $prompt .= "Donne des recommandations sur:\n";
                $prompt .= "1. L'emplacement optimal (est-ce un bon endroit selon les coordonnées?)\n";
                $prompt .= "2. Le ratio de vélos disponibles par rapport à la capacité\n";
                $prompt .= "3. Le prix (est-il compétitif?)\n";
                $prompt .= "4. Des suggestions pour améliorer la visibilité et la rentabilité\n";
                $prompt .= "5. Des idées de services additionnels à proposer\n\n";
                $prompt .= "Présente tout cela de manière structurée et concise en français, en utilisant des titres pour chaque section.";
            }

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
                    'maxOutputTokens' => 600, // Réduit pour des réponses plus courtes
                ]
            ];
            
            // Appeler l'API Gemini
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

            // Extraire les recommandations générées
            if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                $generatedText = $content['candidates'][0]['content']['parts'][0]['text'];
                
                return $this->json([
                    'success' => true,
                    'recommendation' => $generatedText
                ]);
            }
            
            // Si le premier format échoue, essayer avec Gemini Pro
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
                    'recommendation' => $generatedText
                ]);
            }
            
            return $this->json([
                'success' => false,
                'message' => 'Aucune recommandation générée',
                'error' => $content['error']['message'] ?? 'Erreur inconnue',
            ], 500);
            
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur lors de la génération: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/predict-station', name: 'app_predict_station', methods: ['POST'])]
    public function predictStation(Request $request): JsonResponse
    {
        try {
            // Vérifier si la clé API est configurée
            if (!$this->geminiApiKey) {
                return $this->json([
                    'success' => false,
                    'message' => 'Clé API Gemini non configurée'
                ], 500);
            }

            // Récupérer les données d'entrée
            $data = json_decode($request->getContent(), true);
            
            if (!$data) {
                return $this->json([
                    'success' => false,
                    'message' => 'Données JSON invalides'
                ], 400);
            }

            $pays = $data['pays'] ?? '';
            $latitude = $data['latitude'] ?? '';
            $longitude = $data['longitude'] ?? '';
            
            if (empty($pays) || empty($latitude) || empty($longitude)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Pays et coordonnées requis'
                ], 400);
            }

            // Construire le prompt pour Gemini
            $prompt = "En tant qu'expert en mobilité urbaine et en location de vélos, fais une analyse prédictive détaillée pour implanter une nouvelle station de vélos aux coordonnées suivantes dans le pays $pays (Latitude: $latitude, Longitude: $longitude).\n\n";
            $prompt .= "Ton analyse doit être très structurée avec ces sections exactes (utilise ces titres précis):\n\n";
            $prompt .= "**EMPLACEMENT**\n";
            $prompt .= "- Évalue si l'emplacement est optimal, en fonction des coordonnées données\n";
            $prompt .= "- Recommande des ajustements si nécessaire\n\n";
            
            $prompt .= "**TYPES DE VÉLOS**\n";
            $prompt .= "- Recommande uniquement un des trois types de vélos suivants : vélo électrique, vélo de route, ou vélo urbain\n";
            $prompt .= "- Indique précisément lequel de ces trois types de vélo est le plus adapté à cet emplacement et justifie brièvement\n\n";
            
            $prompt .= "**PRIX**\n";
            $prompt .= "- Suggère un prix horaire optimal en euros\n";
            $prompt .= "- Justifie brièvement ce choix de prix\n\n";
            
            $prompt .= "**CAPACITÉ**\n";
            $prompt .= "- Recommande une capacité totale de vélos\n";
            $prompt .= "- Suggère un nombre optimal de vélos disponibles\n\n";
            
            $prompt .= "**ESTIMATION DES RÉSERVATIONS**\n";
            $prompt .= "- Donne une prévision précise du nombre de réservations par jour\n";
            $prompt .= "- Utilise le format: X-Y réservations/jour en basse saison, Z-W réservations/jour en haute saison\n\n";
            
            $prompt .= "Sois concis et précis dans tes recommandations.";

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
            
            // Appeler l'API Gemini
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

            // Extraire les prédictions générées
            if (isset($content['candidates'][0]['content']['parts'][0]['text'])) {
                $generatedText = $content['candidates'][0]['content']['parts'][0]['text'];
                
                return $this->json([
                    'success' => true,
                    'result' => $generatedText
                ]);
            }
            
            // Si le premier format échoue, essayer avec Gemini Pro
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
                    'result' => $generatedText
                ]);
            }
            
            // Aucune génération n'a fonctionné
            return $this->json([
                'success' => false,
                'error' => 'Impossible de générer une prédiction. Veuillez réessayer plus tard.'
            ]);
        } catch (Exception $e) {
            return $this->json([
                'success' => false,
                'error' => 'Une erreur est survenue lors de la génération de la prédiction: ' . $e->getMessage()
            ]);
        }
    }
} 