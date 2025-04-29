<?php
// Script to create .env.local file with the correct MAILER_DSN

$content = <<<EOT
###> symfony/mailer ###
MAILER_DSN=smtp://oussemabelhajbb22@gmail.com:pukkrnjfybrjlhsr@smtp.gmail.com:587?encryption=tls&auth_mode=login&verify_peer=0&verify_peer_name=0
###< symfony/mailer ###
EOT;

// Write to .env.local file
file_put_contents('.env.local', $content);

echo "Created .env.local file with the following content:\n";
echo $content . "\n";
echo "\nNow run: php bin/console cache:clear\n"; 