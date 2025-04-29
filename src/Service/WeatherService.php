<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class WeatherService
{
    private $httpClient;
    private $apiKey;
    private $cache;

    public function __construct(HttpClientInterface $httpClient, ParameterBagInterface $params)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = '61fbbb8db7b40cfb32cc54cc3dd32bde'; // Clé API en dur temporairement
        $this->cache = new FilesystemAdapter();
    }

    public function getCurrentWeather(string $location): array
    {
        $cacheKey = 'weather_' . md5($location);
        
        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($location) {
            $item->expiresAfter(3600); // Cache pour 1 heure
            
            try {
                // Extraire latitude et longitude
                $coordinates = explode(',', $location);
                if (count($coordinates) !== 2) {
                    throw new \Exception('Format de localisation invalide');
                }
                
                $lat = trim($coordinates[0]);
                $lon = trim($coordinates[1]);
                
                $response = $this->httpClient->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
                    'query' => [
                        'lat' => $lat,
                        'lon' => $lon,
                        'appid' => $this->apiKey,
                        'units' => 'metric',
                        'lang' => 'fr'
                    ]
                ]);

                return $response->toArray();
            } catch (\Exception $e) {
                // En cas d'erreur, retourner un tableau avec des valeurs par défaut
                return [
                    'weather' => [
                        [
                            'description' => 'Données non disponibles',
                            'icon' => '01d'
                        ]
                    ],
                    'main' => [
                        'temp' => 20
                    ]
                ];
            }
        });
    }

    public function getWeatherRecommendation(array $weatherData): string
    {
        $temp = $weatherData['main']['temp'];
        $weatherId = $weatherData['weather'][0]['id'];

        if ($temp < 10) {
            return 'cold';
        } elseif ($temp > 25) {
            return 'hot';
        } elseif ($weatherId >= 200 && $weatherId < 600) {
            return 'rainy';
        } elseif ($weatherId >= 600 && $weatherId < 700) {
            return 'snowy';
        } else {
            return 'good';
        }
    }

    public function isSeasonalActivity(string $typePlace): bool
    {
        $currentMonth = (int)date('m');
        $summerMonths = [6, 7, 8];
        $winterMonths = [12, 1, 2];

        $summerActivities = ['Plage', 'Piscine', 'Parc aquatique', 'Randonnée'];
        $winterActivities = ['Ski', 'Snowboard', 'Patinoire'];

        if (in_array($currentMonth, $summerMonths) && in_array($typePlace, $summerActivities)) {
            return true;
        }

        if (in_array($currentMonth, $winterMonths) && in_array($typePlace, $winterActivities)) {
            return true;
        }

        return false;
    }
} 