<?php

namespace App\Controller;

use Google\Cloud\Core\ServiceBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;

class AiAssistantController extends AbstractController
{
    private $gemini;
    private array $conversationHistory = [];
    private LoggerInterface $logger;

    public function __construct(ParameterBagInterface $params, LoggerInterface $logger)
    {
        $this->logger = $logger;
        try {
            $apiKey = $params->get('app.gemini_api_key');
            if (!$apiKey) {
                throw new \RuntimeException('Gemini API key is not configured in config/packages/gemini.yaml');
            }
            
            // Initialiser le client Gemini
            $this->gemini = new ServiceBuilder([
                'key' => $apiKey
            ]);
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de l\'initialisation de l\'API Gemini: ' . $e->getMessage());
        }
    }

    #[Route('/ai-assistant', name: 'ai_assistant_page')]
    public function index(): Response
    {
        return $this->render('dashVoyageurs/aiAssistant.html.twig', [
            'title' => 'Assistant AI - Airmess',
        ]);
    }

    #[Route('/ai-assistant/chat', name: 'ai_assistant_chat', methods: ['POST'])]
    public function chat(Request $request): JsonResponse
    {
        $this->logger->info('Requête chat reçue');
        
        try {
            if (!$this->gemini) {
                throw new \RuntimeException('Le client Gemini n\'est pas initialisé correctement');
            }

            $content = $request->getContent();
            $this->logger->info('Contenu de la requête: ' . $content);
            
            $data = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON: ' . json_last_error_msg());
            }
            
            if (!isset($data['message'])) {
                throw new \Exception('Le message est requis');
            }

            $message = $data['message'];
            $this->logger->info('Message reçu: ' . $message);

            // Ajouter le message de l'utilisateur à l'historique
            $this->conversationHistory[] = ['role' => 'user', 'content' => $message];

            // Préparer le contexte de la conversation
            $context = "Tu es un assistant AI spécialisé dans les bons plans de voyage. 
            Tu aides les utilisateurs à trouver des restaurants, cafés et espaces de coworking.
            Sois concis, précis et amical dans tes réponses.
            Si tu ne connais pas la réponse, dis-le honnêtement.\n\n";
            
            // Ajouter l'historique de la conversation
            foreach ($this->conversationHistory as $msg) {
                $context .= ($msg['role'] === 'user' ? 'Utilisateur: ' : 'Assistant: ') . $msg['content'] . "\n";
            }

            // Appeler l'API Gemini
            $response = $this->gemini->language()->analyzeSentiment([
                'document' => [
                    'type' => 'PLAIN_TEXT',
                    'content' => $context
                ]
            ]);

            // Générer une réponse basée sur le sentiment
            $sentiment = $response['documentSentiment']['score'];
            $magnitude = $response['documentSentiment']['magnitude'];

            if ($sentiment > 0.5) {
                $aiResponse = "Je suis ravi de vous aider avec vos bons plans de voyage ! Je peux vous recommander des restaurants, cafés et espaces de coworking dans votre région.";
            } elseif ($sentiment > 0) {
                $aiResponse = "Je peux vous aider à trouver des bons plans de voyage. Que recherchez-vous exactement ?";
            } else {
                $aiResponse = "Je comprends que vous cherchez des bons plans de voyage. Pouvez-vous me donner plus de détails sur ce que vous recherchez ?";
            }

            $this->logger->info('Réponse AI générée: ' . $aiResponse);

            // Ajouter la réponse de l'AI à l'historique
            $this->conversationHistory[] = ['role' => 'assistant', 'content' => $aiResponse];

            return new JsonResponse(['response' => $aiResponse]);
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors du traitement: ' . $e->getMessage());
            return new JsonResponse([
                'error' => true,
                'response' => 'Désolé, je rencontre des difficultés techniques. Veuillez réessayer plus tard.',
                'debug' => $e->getMessage()
            ], 500);
        }
    }
} 