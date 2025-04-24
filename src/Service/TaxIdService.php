<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TaxIdService
{
    private string $apiKey;
    
    public function __construct(string $apiKey = '2h7zq2r4sdpccxjhxhk7een23knqt3zfrpqa')
    {
        $this->apiKey = $apiKey;
    }
    
    /**
     * Verify a tax ID
     * 
     * @param string $taxId The tax ID to verify
     * @param string $country The two-letter country code
     * @param string $type The type of tax ID (individual, entity, vat, or any)
     * 
     * @return array The verification result with keys: valid, message
     */
    public function verifyTaxId(string $taxId, string $country = 'TN', string $type = 'entity'): array
    {
        try {
            $client = HttpClient::create();
            
            // API endpoint would be something like https://api.taxidpro.com/validate
            // Adjust according to actual API documentation
            $response = $client->request('POST', 'https://api.taxidpro.com/validate', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'country' => $country,
                    'type' => $type,
                    'tin' => $taxId,
                ],
            ]);
            
            $data = $response->toArray();
            
            // Default response structure, adjust based on actual API response
            return [
                'valid' => $data['valid'] ?? false,
                'message' => $data['message'] ?? 'Tax ID verification failed',
            ];
        } catch (TransportExceptionInterface $e) {
            return [
                'valid' => false,
                'message' => 'Connection error: ' . $e->getMessage(),
            ];
        } catch (\Exception $e) {
            return [
                'valid' => false,
                'message' => 'Verification error: ' . $e->getMessage(),
            ];
        }
    }
    
    /**
     * Mock verification for testing when API is not available
     * 
     * @param string $taxId The tax ID to verify
     * @return array The mock verification result
     */
    public function mockVerifyTaxId(string $taxId): array
    {
        // Basic validation (example: must be 8-12 digits)
        $isValid = (bool) preg_match('/^\d{8,12}$/', $taxId);
        
        return [
            'valid' => $isValid,
            'message' => $isValid ? 'Tax ID is valid' : 'Tax ID must be 8-12 digits',
        ];
    }
} 