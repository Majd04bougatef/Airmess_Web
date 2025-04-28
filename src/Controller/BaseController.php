<?php

namespace App\Controller;

use App\Repository\SocialMediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StationRepository;

class BaseController extends AbstractController
{
    use TrackPageViewTrait;

    #[Route('/', name: 'homepage')]
    #[Route('/base', name: 'app_base')]
    public function index(SocialMediaRepository $socialMediaRepository, StationRepository $stationRepository): Response
    {
        // Récupérer les 4 publications sociales les plus aimées
        $mostLiked = $socialMediaRepository->findMostLiked(8);
        
        // Mélanger et prendre 4 publications aléatoirement
        shuffle($mostLiked);
        $randomPublications = array_slice($mostLiked, 0, 4);
        
        // Si on n'a pas assez de publications, compléter avec des publications aléatoires
        if (count($randomPublications) < 4) {
            $random = $socialMediaRepository->findRandom(4 - count($randomPublications));
            $publications = array_merge($randomPublications, $random);
            
            // Empêcher les doublons
            $uniquePublications = [];
            foreach ($publications as $pub) {
                $uniquePublications[$pub->getIdEB()] = $pub;
                if (count($uniquePublications) >= 4) {
                    break;
                }
            }
            $socialMedia = array_values($uniquePublications);
        } else {
            $socialMedia = $randomPublications;
        }

        // Get station statistics
        $totalStations = $stationRepository->count([]);
        $electricStations = $stationRepository->count(['typeVelo' => 'velo électrique']);
        $regularStations = $stationRepository->count(['typeVelo' => 'velo urbain']);
        $chargingPoints = $stationRepository->createQueryBuilder('s')
            ->select('SUM(s.capacite)')
            ->where('s.typeVelo = :type')
            ->setParameter('type', 'velo électrique')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;
        
        return $this->render('base.html.twig', [
            'socialMedia' => $socialMedia,
            'totalStations' => $totalStations,
            'electricStations' => $electricStations,
            'regularStations' => $regularStations,
            'chargingPoints' => $chargingPoints
        ]);
    }

    #[Route('/station-stats', name: 'app_station_stats')]
    public function getStationStats(StationRepository $stationRepository): Response
    {
        // Get total number of stations
        $totalStations = $stationRepository->count([]);
        
        // Get number of electric stations
        $electricStations = $stationRepository->count(['type' => 'electric']);
        
        // Get number of regular stations
        $regularStations = $stationRepository->count(['type' => 'regular']);
        
        // Get total number of charging points
        $chargingPoints = $stationRepository->createQueryBuilder('s')
            ->select('SUM(s.chargingPoints)')
            ->where('s.type = :type')
            ->setParameter('type', 'electric')
            ->getQuery()
            ->getSingleScalarResult() ?? 0;

        return $this->render('base.html.twig', [
            'totalStations' => $totalStations,
            'electricStations' => $electricStations,
            'regularStations' => $regularStations,
            'chargingPoints' => $chargingPoints
        ]);
    }

    /**
     * Override the render method to automatically track page views
     */
    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $response = parent::render($view, $parameters, $response);
        
        // Track the page view
        return $this->trackPageView($response);
    }
}

?>