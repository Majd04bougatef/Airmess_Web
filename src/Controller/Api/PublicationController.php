<?php

namespace App\Controller\Api;

use App\Entity\Publication;
use App\Repository\PublicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/api', name: 'api_')]
class PublicationController extends AbstractController
{
    private $em;
    private $publicationRepository;

    public function __construct(EntityManagerInterface $em, PublicationRepository $publicationRepository)
    {
        $this->em = $em;
        $this->publicationRepository = $publicationRepository;
    }

    #[Route('/publications/process-future', name: 'process_future_publications', methods: ['POST'])]
    public function processFuturePublications(): JsonResponse
    {
        try {
            $now = new \DateTime();
            
            // Récupérer toutes les publications futures qui doivent être publiées
            $futurePublications = $this->publicationRepository->findFuturePublications();
            
            $processed = 0;
            foreach ($futurePublications as $publication) {
                if ($publication->getPublicationDate() <= $now) {
                    $publication->setStatus('published');
                    $processed++;
                }
            }
            
            $this->em->flush();
            
            return new JsonResponse([
                'success' => true,
                'message' => sprintf('%d publications ont été traitées', $processed)
            ]);
            
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors du traitement des publications: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/publications/status', name: 'publications_status', methods: ['GET'])]
    public function getPublicationsStatus(): JsonResponse
    {
        try {
            $futureCount = $this->publicationRepository->countFuturePublications();
            $publishedCount = $this->publicationRepository->countPublishedPublications();
            
            return new JsonResponse([
                'success' => true,
                'data' => [
                    'future_publications' => $futureCount,
                    'published_publications' => $publishedCount
                ]
            ]);
            
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur lors de la récupération des statistiques: ' . $e->getMessage()
            ], 500);
        }
    }
} 