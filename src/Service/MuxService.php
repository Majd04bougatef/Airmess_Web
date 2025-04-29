<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MuxService
{
    private HttpClientInterface $client;
    private string $apiKeyId;
    private string $apiKeySecret;

    public function __construct()
    {
        $this->client = HttpClient::create();
        $this->apiKeyId = 'cf8f815e-3a3a-4a2e-9441-e5254c23d0ba
'; // Remplacez par votre vraie clé API
        $this->apiKeySecret = 'ddqNbMF4HvCOY/6M6KLi9x6Bwj680lk1JXKnz/NeiSnLB2dbndJOW2+xRv6Cd5mXvGO4SIBtFoJ'; // Remplacez par votre vraie clé secrète
    }

    public function createLiveStream(): array
    {
        $response = $this->client->request('POST', 'https://api.mux.com/video/v1/live-streams', [
            'auth_basic' => [$this->apiKeyId, $this->apiKeySecret],
            'json' => [
                'playback_policy' => ['public'],
                'new_asset_settings' => [
                    'playback_policy' => ['public']
                ]
            ]
        ]);

        $data = $response->toArray();

        return [
            'stream_key' => $data['data']['stream_key'],
            'playback_id' => $data['data']['playback_ids'][0]['id'],
            'ingest_url' => $data['data']['ingest']['url']
        ];
    }
} 