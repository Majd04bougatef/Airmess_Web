<?php

namespace App\Controller;

use App\Service\WeatherService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/api/weather', name: 'api_weather')]
    public function getWeather(Request $request, WeatherService $weatherService): JsonResponse
    {
        try {
            $lat = $request->query->get('lat');
            $lon = $request->query->get('lon');

            if (!$lat || !$lon) {
                return new JsonResponse([
                    'weather' => [
                        [
                            'description' => 'Données non disponibles',
                            'icon' => '01d'
                        ]
                    ],
                    'main' => [
                        'temp' => 20
                    ],
                    'recommendation' => 'good'
                ]);
            }

            $location = $lat . ',' . $lon;
            $weatherData = $weatherService->getCurrentWeather($location);
            
            // Vérifier si les données sont valides
            if (!isset($weatherData['weather']) || !isset($weatherData['weather'][0]) || !isset($weatherData['main'])) {
                return new JsonResponse([
                    'weather' => [
                        [
                            'description' => 'Données non disponibles',
                            'icon' => '01d'
                        ]
                    ],
                    'main' => [
                        'temp' => 20
                    ],
                    'recommendation' => 'good'
                ]);
            }

            $weatherData['recommendation'] = $weatherService->getWeatherRecommendation($weatherData);

            return new JsonResponse($weatherData);
        } catch (\Exception $e) {
            return new JsonResponse([
                'weather' => [
                    [
                        'description' => 'Données non disponibles',
                        'icon' => '01d'
                    ]
                ],
                'main' => [
                    'temp' => 20
                ],
                'recommendation' => 'good'
            ]);
        }
    }
} 