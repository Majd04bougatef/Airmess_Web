<?php
// Test email sending with native PHP mail function
$to = 'oussemabelhajbb22@gmail.com';
$subject = 'Test Email from Airmess';
$message = '
<html>
<head>
  <title>Test Email</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 20px; color: #333; }
    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
    h1 { color: #4158D0; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Test Email from Airmess</h1>
    <p>This is a test email sent using PHP\'s native mail function.</p>
    <p>If you can read this, then basic email sending is working!</p>
    <p>Sent at: ' . date('Y-m-d H:i:s') . '</p>
  </div>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'From: Airmess Test <test@airmess.com>' . "\r\n";

echo "Testing email send to $to using PHP's native mail function...\n";

// Try to send the email
$success = mail($to, $subject, $message, $headers);

if ($success) {
    echo "Email sent successfully using mail() function!\n";
} else {
    echo "Failed to send email using mail() function.\n";
    echo "This may be because:\n";
    echo "1. Your PHP mail configuration is not set up correctly\n";
    echo "2. You don't have a local mail server installed\n";
    echo "3. Your server's outgoing port 25 might be blocked\n";
}

// Check PHP mail configuration
echo "\nChecking PHP mail configuration...\n";
$mailConfig = [
    'SMTP' => ini_get('SMTP'),
    'smtp_port' => ini_get('smtp_port'),
    'sendmail_path' => ini_get('sendmail_path'),
    'sendmail_from' => ini_get('sendmail_from')
];

echo "Current mail configuration:\n";
foreach ($mailConfig as $key => $value) {
    echo "- $key: " . ($value ?: 'not set') . "\n";
}

echo "\nTo fix mail sending issues in your Symfony project:\n";
echo "1. Make sure you have the HttpClient component installed for curl transport: composer require symfony/http-client\n";
echo "2. Update your .env file to use: MAILER_DSN=smtp://oussemabelhajbb22@gmail.com:pukkrnjfybrjlhsr@smtp.gmail.com:587?verify_peer=0\n";
echo "3. Or use Mailtrap for testing: MAILER_DSN=smtp://username:password@smtp.mailtrap.io:2525\n";
echo "4. For Gmail, make sure you're using an App Password if you have 2FA enabled\n"; 