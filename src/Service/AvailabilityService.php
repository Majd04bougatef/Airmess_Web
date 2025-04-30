<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class AvailabilityService
{
    private $httpClient;
    private $logger;
    private $apiKey;
    
    public function __construct(
        HttpClientInterface $httpClient,
        LoggerInterface $logger,
        string $apiKey = 'simulated_key' // Pour simulation
    ) {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->apiKey = $apiKey;
    }
    
    /**
     * Recherche les disponibilités selon le nom du lieu
     */
    public function searchAvailability(string $placeName): array
    {
        // Dans un environnement de production, nous ferions un appel API réel à TheFork
        // Mais pour cette démonstration, nous simulons la réponse
        
        try {
            // Simulation d'un délai d'API
            usleep(mt_rand(100000, 500000));
            
            // Générer des créneaux aléatoires pour les 3 prochains jours
            $results = $this->generateSimulatedAvailability($placeName);
            
            $this->logger->info('Recherche de disponibilité effectuée pour: ' . $placeName);
            
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de la recherche de disponibilité: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Impossible de récupérer les disponibilités: ' . $e->getMessage()
            ];
        }
    }
    
    /**
     * Génère des créneaux de disponibilité simulés
     */
    private function generateSimulatedAvailability(string $placeName): array
    {
        // Calculer les 3 prochains jours
        $days = [];
        for ($i = 0; $i < 3; $i++) {
            $date = (new \DateTime())->modify('+' . $i . ' days');
            $days[] = $date->format('Y-m-d');
        }
        
        $results = [];
        foreach ($days as $day) {
            // Générer entre 2 et 5 créneaux pour chaque jour
            $slotsCount = mt_rand(2, 5);
            $slots = [];
            
            // Horaires possibles (heures seulement)
            $hours = range(11, 21);
            shuffle($hours);
            $selectedHours = array_slice($hours, 0, $slotsCount);
            sort($selectedHours);
            
            foreach ($selectedHours as $hour) {
                // Ajouter 0, 15, 30 ou 45 minutes aléatoirement
                $minutes = [0, 15, 30, 45][mt_rand(0, 3)];
                $time = sprintf('%02d:%02d', $hour, $minutes);
                
                // Générer un nombre de places disponibles (1-8)
                $places = mt_rand(1, 8);
                
                $slots[] = [
                    'time' => $time,
                    'available_seats' => $places,
                    'booking_url' => '#' // Dans un cas réel, on renverrait une URL de réservation
                ];
            }
            
            $results[] = [
                'date' => $day,
                'day_name' => (new \DateTime($day))->format('l'),
                'slots' => $slots
            ];
        }
        
        return [
            'place_name' => $placeName,
            'availability' => $results
        ];
    }
} 