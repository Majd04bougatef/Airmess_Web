<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\TwilioService;
use Symfony\Component\HttpClient\HttpClient;

// Set recipient number - ensure it's in E.164 format
$phoneNumber = '+21620981776'; // Adjust country code if needed

// Test message
$message = 'This is a test message from Airmess';

// Create TwilioService instance directly
$twilioService = new TwilioService('TEST_SID', 'TEST_TOKEN', '+12345678900');

// Send the SMS
$result = $twilioService->sendSms($phoneNumber, $message);

// Output result
echo "SMS Test Result:\n";
echo "---------------\n";
echo "Success: " . ($result['success'] ? 'Yes' : 'No') . "\n";

if ($result['success']) {
    echo "Message SID: " . ($result['message_sid'] ?? 'N/A') . "\n";
    echo "Status: " . ($result['status'] ?? 'N/A') . "\n";
    if (isset($result['note'])) {
        echo "Note: " . $result['note'] . "\n";
    }
} else {
    echo "Error: " . ($result['error'] ?? 'Unknown error') . "\n";
    if (isset($result['code'])) {
        echo "Error Code: " . $result['code'] . "\n";
    }
}

echo "\nDone.\n"; 