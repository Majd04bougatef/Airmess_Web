<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class MuxService
{
    private $httpClient;
    private $muxTokenId;
    private $muxTokenSecret;
    private $logger;

    public function __construct(
        HttpClientInterface $httpClient,
        string $muxTokenId,
        string $muxTokenSecret,
        LoggerInterface $logger = null
    ) {
        $this->httpClient = $httpClient;
        $this->muxTokenId = $muxTokenId;
        $this->muxTokenSecret = $muxTokenSecret;
        $this->logger = $logger;
    }

    public function createLiveStream(string $title): array
    {
        try {
            $this->log('Création d\'un nouveau live stream avec le titre: ' . $title);
            $this->log('Utilisation des clés Mux - Token ID: ' . substr($this->muxTokenId, 0, 5) . '...');

            $response = $this->httpClient->request('POST', 'https://api.mux.com/video/v1/live-streams', [
                'auth_basic' => [$this->muxTokenId, $this->muxTokenSecret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'playback_policy' => ['public'],
                    'new_asset_settings' => [
                        'playback_policy' => ['public'],
                        'title' => $title
                    ],
                    'reduced_latency' => true,
                    'test' => false
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $this->log('Réponse reçue de Mux avec le code: ' . $statusCode);

            if ($statusCode !== 201 && $statusCode !== 200) {
                throw new \Exception('Erreur Mux: Code de statut inattendu ' . $statusCode);
            }

            $data = $response->toArray();
            $this->log('Stream créé avec succès. Stream ID: ' . ($data['data']['id'] ?? 'non disponible'));

            return $data;
        } catch (TransportExceptionInterface $e) {
            $this->log('Erreur de transport lors de la création du stream: ' . $e->getMessage(), 'error');
            throw new \Exception('Erreur de connexion à l\'API Mux: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->log('Erreur lors de la création du stream: ' . $e->getMessage(), 'error');
            throw $e;
        }
    }

    public function getLiveStream(string $streamId): array
    {
        try {
            $this->log('Récupération du statut du stream: ' . $streamId);

            $response = $this->httpClient->request('GET', "https://api.mux.com/video/v1/live-streams/{$streamId}", [
                'auth_basic' => [$this->muxTokenId, $this->muxTokenSecret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $this->log('Réponse reçue de Mux avec le code: ' . $statusCode);

            if ($statusCode !== 200) {
                throw new \Exception('Erreur Mux: Code de statut inattendu ' . $statusCode);
            }

            return $response->toArray();
        } catch (\Exception $e) {
            $this->log('Erreur lors de la récupération du stream: ' . $e->getMessage(), 'error');
            throw $e;
        }
    }

    public function deleteLiveStream(string $streamId): void
    {
        try {
            $this->log('Suppression du stream: ' . $streamId);

            $response = $this->httpClient->request('DELETE', "https://api.mux.com/video/v1/live-streams/{$streamId}", [
                'auth_basic' => [$this->muxTokenId, $this->muxTokenSecret],
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $this->log('Réponse reçue de Mux avec le code: ' . $statusCode);

            if ($statusCode !== 204) {
                throw new \Exception('Erreur Mux: Code de statut inattendu ' . $statusCode);
            }

            $this->log('Stream supprimé avec succès');
        } catch (\Exception $e) {
            $this->log('Erreur lors de la suppression du stream: ' . $e->getMessage(), 'error');
            throw $e;
        }
    }

    private function log(string $message, string $level = 'info'): void
    {
        if ($this->logger) {
            switch ($level) {
                case 'error':
                    $this->logger->error($message);
                    break;
                default:
                    $this->logger->info($message);
            }
        }
    }
} 