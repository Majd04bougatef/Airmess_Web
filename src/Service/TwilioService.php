<?php

namespace App\Service;

class TwilioService
{
    private string $accountSid;
    private string $authToken;
    private string $fromNumber;

    public function __construct(string $accountSid = null, string $authToken = null, string $fromNumber = null)
    {
        // Use the provided Twilio credentials
        $this->accountSid = $accountSid ?? $_ENV['TWILIO_ACCOUNT_SID'] ?? 'ACdad3c4bd21811b3fc1e1f6508c9b6025';
        $this->authToken = $authToken ?? $_ENV['TWILIO_AUTH_TOKEN'] ?? '66b251e37ab9363ef1fac0b02c6422e7';
        $this->fromNumber = $fromNumber ?? $_ENV['TWILIO_PHONE_NUMBER'] ?? '+19133983562';
    }

    /**
     * Send an SMS message
     *
     * @param string $to Recipient phone number (in E.164 format)
     * @param string $message SMS body text
     * @return array Response data
     */
    public function sendSms(string $to, string $message): array
    {
        // Log the input phone number
        error_log('TwilioService: Attempting to send SMS to: ' . $to);
        
        // Validate phone number format (E.164 format +1234567890)
        if (!preg_match('/^\+[1-9]\d{1,14}$/', $to)) {
            error_log('TwilioService: Invalid phone number format: ' . $to);
            
            // Try to fix common Tunisian phone number format issues
            $cleanNumber = preg_replace('/[^0-9]/', '', $to);
            
            // Handle Tunisian numbers (which should be 8 digits with +216 country code)
            if (strlen($cleanNumber) == 8) {
                $to = '+216' . $cleanNumber;
                error_log('TwilioService: Fixed Tunisian number to: ' . $to);
            } else if (strlen($cleanNumber) == 11 && substr($cleanNumber, 0, 3) == '216') {
                $to = '+' . $cleanNumber;
                error_log('TwilioService: Added + prefix to: ' . $to);
            } else {
                return [
                    'success' => false,
                    'error' => 'Invalid phone number format. Must be in E.164 format (e.g., +216XXXXXXXX for Tunisia)'
                ];
            }
        }

        try {
            // Twilio API endpoint for sending SMS
            $url = "https://api.twilio.com/2010-04-01/Accounts/{$this->accountSid}/Messages.json";
            
            // Log the API request details (omitting sensitive info)
            error_log('TwilioService: Sending request to Twilio API with number: ' . $to);
            
            // Set up CURL request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification for testing
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL host verification for testing
            curl_setopt($ch, CURLOPT_USERPWD, "{$this->accountSid}:{$this->authToken}");
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'From' => $this->fromNumber,
                'To' => $to,
                'Body' => $message,
            ]);
            
            // Execute the request
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            // Check for CURL errors
            if ($error) {
                error_log('TwilioService: CURL Error: ' . $error);
                return [
                    'success' => false,
                    'error' => "CURL Error: $error",
                ];
            }
            
            // Parse the JSON response
            $content = json_decode($response, true);
            
            // Log the response status
            error_log('TwilioService: Response HTTP code: ' . $httpCode);
            
            // Check for HTTP errors
            if ($httpCode >= 200 && $httpCode < 300) {
                error_log('TwilioService: SMS sent successfully to: ' . $to);
                return [
                    'success' => true,
                    'message_sid' => $content['sid'] ?? null,
                    'status' => $content['status'] ?? null,
                ];
            } else {
                error_log('TwilioService: Error response: ' . ($content['message'] ?? 'Unknown error'));
                return [
                    'success' => false,
                    'error' => $content['message'] ?? 'Unknown error',
                    'code' => $content['code'] ?? $httpCode,
                ];
            }
        } catch (\Exception $e) {
            error_log('TwilioService: Exception: ' . $e->getMessage());
            return [
                'success' => false,
                'error' => 'An error occurred: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Send verification code via SMS
     *
     * @param string $to Recipient phone number
     * @param string $code Verification code
     * @return array Response data
     */
    public function sendVerificationCode(string $to, string $code): array
    {
        $message = "Your Airmess verification code is: $code. This code will expire in 10 minutes.";
        return $this->sendSms($to, $message);
    }

    /**
     * Validate if credentials are properly set
     *
     * @return bool
     */
    public function hasValidCredentials(): bool
    {
        return !empty($this->accountSid) && !empty($this->authToken) && !empty($this->fromNumber);
    }
} 