<?php
// Test direct email sending with curl transport

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

// Get the recipient email
$recipient = 'oussemabelhajbb22@gmail.com';

echo "Testing email send to $recipient using curl transport...\n";

try {
    // Use curl transport which tends to handle SSL better
    // This uses Symfony's HTTP client instead of PHP's native stream functions
    $transport = Transport::fromDsn('smtp+curl://oussemabelhajbb22@gmail.com:pukkrnjfybrjlhsr@smtp.gmail.com:587?encryption=tls&auth_mode=login');
    
    // Create mailer with this transport
    $mailer = new Mailer($transport);
    
    // Create email
    $email = (new Email())
        ->from(new Address('oussemabelhajbb22@gmail.com', 'Airmess Test'))
        ->to($recipient)
        ->subject('Test Email from Airmess (Direct Test)')
        ->text('This is a test email sent directly via curl transport.')
        ->html('
            <div style="font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: 0 auto; border: 1px solid #eee; border-radius: 5px;">
                <h1 style="color: #4158D0;">Test Email from Airmess</h1>
                <p>This is a test email sent directly via curl transport.</p>
                <p>If you can read this, then email sending is working correctly!</p>
                <p style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #666;">
                    Sent at: ' . date('Y-m-d H:i:s') . '
                </p>
            </div>
        ');
    
    echo "Sending email...\n";
    $mailer->send($email);
    echo "Email sent successfully!\n";
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Trace:\n" . $e->getTraceAsString() . "\n";
} 