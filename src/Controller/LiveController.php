<?php

namespace App\Controller;

use App\Service\MuxService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LiveController extends AbstractController
{
    private MuxService $muxService;

    public function __construct(MuxService $muxService)
    {
        $this->muxService = $muxService;
    }

    #[Route('/live/start', name: 'live_start')]
    public function start(): Response
    {
        try {
            $streamData = $this->muxService->createLiveStream();
            
            return $this->render('live/stream_info.html.twig', [
                'stream_key' => $streamData['stream_key'],
                'playback_id' => $streamData['playback_id'],
                'ingest_url' => $streamData['ingest_url']
            ]);
        } catch (\Exception $e) {
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