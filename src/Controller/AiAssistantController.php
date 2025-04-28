<?php

namespace App\Controller;

use OpenAI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;

class AiAssistantController extends AbstractController
{
    private $openai;
    private array $conversationHistory = [];
    private LoggerInterface $logger;

    public function __construct(ParameterBagInterface $params, LoggerInterface $logger)
    {
        $this->logger = $logger;
        try {
            $apiKey = $params->get('app.openai_api_key');
            if (!$apiKey) {
                throw new \RuntimeException('OpenAI API key is not configured in config/packages/openai.yaml');
            }
            $this->openai = OpenAI::client($apiKey);
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de l\'initialisation de l\'API OpenAI: ' . $e->getMessage());
            // Ne pas relancer l'exception ici, nous gérerons l'erreur dans les méthodes
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
            if (!$this->openai) {
                throw new \RuntimeException('Le client OpenAI n\'est pas initialisé correctement');
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

            $response = $this->openai->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => array_merge(
                    [
                        [
                            'role' => 'system',
                            'content' => 'Tu es un assistant AI spécialisé dans les bons plans de voyage. 
                            Tu aides les utilisateurs à trouver des restaurants, cafés et espaces de coworking.
                            Sois concis, précis et amical dans tes réponses.
                            Si tu ne connais pas la réponse, dis-le honnêtement.'
                        ]
                    ],
                    $this->conversationHistory
                ),
                'temperature' => 0.7,
                'max_tokens' => 150
            ]);

            $aiResponse = $response->choices[0]->message->content;
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