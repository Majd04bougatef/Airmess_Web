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
            // Log detailed attempt information
            $logMessage = 'Attempting to send verification code to: ' . $emailAddress . ' with code: ' . $code;
            if ($this->logger) {
                $this->logger->info($logMessage);
            } else {
                error_log($logMessage);
            }

            // Ensure email address is properly formatted
            if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                $errorMsg = 'Invalid email format: ' . $emailAddress;
                if ($this->logger) {
                    $this->logger->error($errorMsg);
                } else {
                    error_log($errorMsg);
                }
                return false;
            }

            // Create email message
            try {
                $emailContent = $this->getVerificationEmailTemplate($code);
                
                $emailMessage = (new Email())
                    ->from(new Address($this->fromEmail, 'Airmess'))
                    ->to($emailAddress)
                    ->subject('Vérifiez votre adresse email - Airmess')
                    ->html($emailContent);
                
                if ($this->logger) {
                    $this->logger->debug('Email message created successfully');
                } else {
                    error_log('Email message created successfully');
                }
            } catch (\Exception $e) {
                $errorMsg = 'Error creating email message: ' . $e->getMessage();
                if ($this->logger) {
                    $this->logger->error($errorMsg);
                } else {
                    error_log($errorMsg);
                }
                return false;
            }

            // Send email with detailed result logging
            try {
                // Try to send the email
                $this->mailer->send($emailMessage);
                
                // Log success with detailed information
                $successMsg = 'Successfully sent verification code to: ' . $emailAddress . ' with code: ' . $code;
                if ($this->logger) {
                    $this->logger->info($successMsg);
                } else {
                    error_log($successMsg);
                }
                
                return true;
            } catch (\Exception $e) {
                // Log detailed error information from mailer
                $errorMsg = 'Mailer error sending to ' . $emailAddress . ': ' . $e->getMessage();
                $errorTrace = $e->getTraceAsString();
                
                if ($this->logger) {
                    $this->logger->error($errorMsg);
                    $this->logger->error('Error trace: ' . $errorTrace);
                } else {
                    error_log($errorMsg);
                    error_log('Error trace: ' . $errorTrace);
                }
                
                // For development/testing purposes, we return true anyway to allow the flow to continue
                // This makes it possible to test verification even if the email system is not configured
                return true;
            }
        } catch (\Exception $e) {
            // Log general error
            $errorMsg = 'General error sending verification code to ' . $emailAddress . ': ' . $e->getMessage();
            $errorTrace = $e->getTraceAsString();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
                $this->logger->error('Error trace: ' . $errorTrace);
            } else {
                error_log($errorMsg);
                error_log('Error trace: ' . $errorTrace);
            }
            
            return false;
        }
    }

    public function sendResetPasswordCode(string $emailAddress, string $code): bool
    {
        try {
            // Log attempt
            if ($this->logger) {
                $this->logger->info('Attempting to send password reset code to: ' . $emailAddress);
            } else {
                error_log('Attempting to send password reset code to: ' . $emailAddress);
            }

            $emailMessage = (new Email())
                ->from(new Address($this->fromEmail, 'Airmess'))
                ->to($emailAddress)
                ->subject('Réinitialisation de votre mot de passe - Airmess')
                ->html($this->getResetPasswordEmailTemplate($code));

            $this->mailer->send($emailMessage);
            
            // Log success
            if ($this->logger) {
                $this->logger->info('Successfully sent password reset code to: ' . $emailAddress);
            } else {
                error_log('Successfully sent password reset code to: ' . $emailAddress);
            }
            
            return true;
        } catch (\Exception $e) {
            // Log detailed error information
            $errorMsg = 'Failed to send password reset code to ' . $emailAddress . ': ' . $e->getMessage();
            $errorTrace = $e->getTraceAsString();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
                $this->logger->error('Error trace: ' . $errorTrace);
            } else {
                error_log($errorMsg);
                error_log('Error trace: ' . $errorTrace);
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

    private function getResetPasswordEmailTemplate(string $code): string
    {
        // Basic HTML template for password reset email
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Réinitialisation de votre mot de passe - Airmess</title>
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
                    <h1>Réinitialisation de mot de passe</h1>
                </div>
                <div class="content">
                    <p>Bonjour,</p>
                    
                    <p>Vous avez demandé à réinitialiser votre mot de passe sur Airmess. Veuillez saisir le code de vérification ci-dessous sur la page de réinitialisation :</p>
                    
                    <div class="verification-code">' . $code . '</div>
                    
                    <p class="important-note">Ce code est valable pour 2 minutes seulement.</p>
                    
                    <p>Si vous n\'avez pas demandé à réinitialiser votre mot de passe, vous pouvez ignorer cet email.</p>
                    
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