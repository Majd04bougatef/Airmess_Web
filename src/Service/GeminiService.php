<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiService
{
    private const API_KEY = 'AIzaSyBH_tXU7l8OV_-ULvyuVHKrAp_K8bjoFDU';
    private const API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';

    public function __construct(
        private HttpClientInterface $httpClient
    ) {}

    public function improveText(string $text): string
    {
        try {
            $response = $this->httpClient->request('POST', self::API_URL . '?key=' . self::API_KEY, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => "Rewrite the following text to be perfectly grammatical and appropriate. If the text is already perfect, rewrite it to be slightly more elegant or professional. Return only the rewritten text in the same language as the text provided: " . $text
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                return $data['candidates'][0]['content']['parts'][0]['text'];
            }

            return $text;
        } catch (\Exception $e) {
            // En cas d'erreur, retourner le texte original
            return $text;
        }
    }
} 