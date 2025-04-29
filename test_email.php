<?php
// Test script to send an email using EmailService
require_once __DIR__ . '/vendor/autoload.php';

use App\Service\EmailService;
use App\Entity\User;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Dotenv\Dotenv;
use Psr\Log\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Load environment variables if .env file exists
$dotenv = new Dotenv();
if (file_exists(__DIR__ . '/.env')) {
    $dotenv->load(__DIR__ . '/.env');
}

// Setup logger
$logger = new Logger('email_test');
$logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));
$logger->pushHandler(new StreamHandler(__DIR__ . '/var/log/email_test.log', Logger::DEBUG));

// Get mailer DSN from environment or use a default
$dsn = $_ENV['MAILER_DSN'] ?? 'smtp://localhost:25';

try {
    // Create mailer transport from DSN
    $transport = Transport::fromDsn($dsn);
    $mailer = new Mailer($transport);
    
    // Create EmailService instance
    $emailService = new EmailService($mailer, $logger, 'oussemabelhajbb22@gmail.com');
    
    // Create a test user
    $user = new User();
    $user->setEmail('oussemabelhajbb22@gmail.com');
    $user->setName('Belhaj');
    $user->setPrenom('Oussema');
    
    echo "Sending test reactivation email...\n";
    
    // Try to send reactivation email
    $result = $emailService->sendReactivationEmail($user);
    
    if ($result) {
        echo "Email sent successfully!\n";
    } else {
        echo "Failed to send email.\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
} 