<?php

namespace App\Service;

use App\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class EmailService
{
    private $mailer;
    private $fromEmail;
    private $logger;

    public function __construct(
        MailerInterface $mailer, 
        ?LoggerInterface $logger = null, 
        string $fromEmail = 'oussemabelhajbb22@gmail.com'
    ) {
        $this->mailer = $mailer;
        $this->fromEmail = $fromEmail;
        $this->logger = $logger;
    }

    public function sendWelcomeEmail(User $user): bool
    {
        try {
            // Log attempt
            if ($this->logger) {
                $this->logger->info('Attempting to send welcome email to: ' . $user->getEmail());
            } else {
                error_log('Attempting to send welcome email to: ' . $user->getEmail());
            }

            $email = (new Email())
                ->from(new Address($this->fromEmail, 'Airmess'))
                ->to($user->getEmail())
                ->subject('Bienvenue sur Airmess')
                ->html($this->getWelcomeEmailTemplate($user));

            $this->mailer->send($email);
            
            // Log success
            if ($this->logger) {
                $this->logger->info('Successfully sent welcome email to: ' . $user->getEmail());
            } else {
                error_log('Successfully sent welcome email to: ' . $user->getEmail());
            }
            
            return true;
        } catch (\Exception $e) {
            // Log error
            $errorMsg = 'Failed to send welcome email to ' . $user->getEmail() . ': ' . $e->getMessage();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
            } else {
                error_log($errorMsg);
            }
            
            return false;
        }
    }

    public function sendVerificationCode(string $emailAddress, string $code): bool
    {
        try {
            // Log attempt
            if ($this->logger) {
                $this->logger->info('Attempting to send verification code to: ' . $emailAddress);
            } else {
                error_log('Attempting to send verification code to: ' . $emailAddress);
            }

            $emailMessage = (new Email())
                ->from(new Address($this->fromEmail, 'Airmess'))
                ->to($emailAddress)
                ->subject('Vérifiez votre adresse email - Airmess')
                ->html($this->getVerificationEmailTemplate($code));

            $this->mailer->send($emailMessage);
            
            // Log success
            if ($this->logger) {
                $this->logger->info('Successfully sent verification code to: ' . $emailAddress);
            } else {
                error_log('Successfully sent verification code to: ' . $emailAddress);
            }
            
            return true;
        } catch (\Exception $e) {
            // Log error
            $errorMsg = 'Failed to send verification code to ' . $emailAddress . ': ' . $e->getMessage();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
            } else {
                error_log($errorMsg);
            }
            
            return false;
        }
    }

    private function getWelcomeEmailTemplate(User $user): string
    {
        // Basic HTML template for welcome email
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Bienvenue sur Airmess</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .header {
                    background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
                    padding: 20px;
                    text-align: center;
                    color: white;
                    border-radius: 10px 10px 0 0;
                }
                .content {
                    background-color: #f9f9f9;
                    padding: 20px;
                    border-radius: 0 0 10px 10px;
                }
                .footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 12px;
                    color: #777;
                }
                h1 {
                    color: #406dab;
                    margin-bottom: 20px;
                }
                .btn {
                    display: inline-block;
                    background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
                    color: white;
                    padding: 12px 24px;
                    text-decoration: none;
                    border-radius: 50px;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Bienvenue sur Airmess</h1>
                </div>
                <div class="content">
                    <p>Bonjour ' . ($user->getPrenom() ? $user->getPrenom() : $user->getName()) . ',</p>
                    
                    <p>Nous sommes ravis de vous accueillir sur Airmess ! Votre compte a été créé avec succès.</p>
                    
                    <p>Chez Airmess, nous nous engageons à vous offrir la meilleure expérience possible :</p>
                    <ul>
                        <li>Un service client disponible 24/7</li>
                        <li>Des offres exclusives pour nos membres</li>
                        <li>Une plateforme sécurisée et facile à utiliser</li>
                    </ul>
                    
                    <p>N\'hésitez pas à explorer notre plateforme et à découvrir toutes les fonctionnalités qui vous attendent.</p>
                    
                    <div style="text-align: center;">
                        <a href="https://airmess.com/login" class="btn">Connectez-vous maintenant</a>
                    </div>
                    
                    <p>Si vous avez des questions, notre équipe est là pour vous aider.</p>
                    
                    <p>Cordialement,<br>L\'équipe Airmess</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Si vous n\'êtes pas à l\'origine de cette inscription, veuillez ignorer cet email.</p>
                </div>
            </div>
        </body>
        </html>
        ';
    }

    private function getVerificationEmailTemplate(string $code): string
    {
        // Basic HTML template for verification email
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Vérifiez votre adresse email - Airmess</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .header {
                    background: linear-gradient(135deg, #7589ff 0%, #ff9db4 100%);
                    padding: 20px;
                    text-align: center;
                    color: white;
                    border-radius: 10px 10px 0 0;
                }
                .content {
                    background-color: #f9f9f9;
                    padding: 20px;
                    border-radius: 0 0 10px 10px;
                }
                .verification-code {
                    font-size: 32px;
                    font-weight: bold;
                    letter-spacing: 5px;
                    text-align: center;
                    color: #406dab;
                    padding: 20px;
                    margin: 20px 0;
                    background-color: #e8f0fe;
                    border-radius: 10px;
                }
                .footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 12px;
                    color: #777;
                }
                h1 {
                    color: #406dab;
                    margin-bottom: 20px;
                }
                .important-note {
                    font-weight: bold;
                    color: #dc3545;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Vérification de votre adresse email</h1>
                </div>
                <div class="content">
                    <p>Bonjour,</p>
                    
                    <p>Merci de vous être inscrit sur Airmess. Pour finaliser votre inscription, veuillez saisir le code de vérification ci-dessous sur la page de vérification :</p>
                    
                    <div class="verification-code">' . $code . '</div>
                    
                    <p class="important-note">Ce code est valable pour 2 minutes seulement.</p>
                    
                    <p>Si vous n\'avez pas demandé ce code, vous pouvez ignorer cet email.</p>
                    
                    <p>Cordialement,<br>L\'équipe Airmess</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                </div>
            </div>
        </body>
        </html>
        ';
    }
} 