<?php

namespace App\Controller;

use App\Service\MuxService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LiveController extends AbstractController
{
    private MuxService $muxService;

    public function __construct(MuxService $muxService)
    {
        $this->muxService = $muxService;
    }

    #[Route('/live/start', name: 'live_start')]
    public function start(Request $request): Response
    {
        try {
            // Vérifier si les clés Mux sont configurées
            if (empty($this->getParameter('mux.token_id')) || empty($this->getParameter('mux.token_secret'))) {
                throw new \Exception('Les clés d\'API Mux ne sont pas configurées. Veuillez configurer MUX_TOKEN_ID et MUX_TOKEN_SECRET dans votre fichier .env.local');
            }

            // Créer un stream avec un titre par défaut
            $streamData = $this->muxService->createLiveStream('Live Stream ' . date('Y-m-d H:i:s'));
            
            if (!isset($streamData['data'])) {
                throw new \Exception('Réponse Mux invalide');
            }

            $data = $streamData['data'];
            
            return $this->render('live/stream_info.html.twig', [
                'stream_key' => $data['stream_key'],
                'playback_id' => $data['playback_ids'][0]['id'],
                'ingest_url' => $data['stream_key'] ? "rtmps://global-live.mux.com:443/app/{$data['stream_key']}" : null
            ]);
        } catch (\Exception $e) {
            // Log l'erreur
            $this->addFlash('error', $e->getMessage());
            
            return $this->render('live/error.html.twig', [
                'error' => $e->getMessage()
            ]);
        }
    }

    #[Route('/live/watch/{playbackId}', name: 'live_watch')]
    public function watch(string $playbackId): Response
    {
        return $this->render('live/watch.html.twig', [
            'playback_id' => $playbackId,
            'stream_url' => "https://stream.mux.com/{$playbackId}.m3u8"
        ]);
    }
} 