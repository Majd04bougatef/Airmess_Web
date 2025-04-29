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
                
                // FIXED: Return false to indicate failure
                return false;
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

    public function sendReactivationEmail(User $user): bool
    {
        try {
            // Log attempt
            if ($this->logger) {
                $this->logger->info('Attempting to send reactivation email to: ' . $user->getEmail());
            } else {
                error_log('Attempting to send reactivation email to: ' . $user->getEmail());
            }

            $email = (new Email())
                ->from(new Address($this->fromEmail, 'Airmess'))
                ->to($user->getEmail())
                ->subject('Votre compte Airmess a été réactivé')
                ->html($this->getReactivationEmailTemplate($user));

            $this->mailer->send($email);
            
            // Log success
            if ($this->logger) {
                $this->logger->info('Successfully sent reactivation email to: ' . $user->getEmail());
            } else {
                error_log('Successfully sent reactivation email to: ' . $user->getEmail());
            }
            
            return true;
        } catch (\Exception $e) {
            // Log error
            $errorMsg = 'Failed to send reactivation email to ' . $user->getEmail() . ': ' . $e->getMessage();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
            } else {
                error_log($errorMsg);
            }
            
            return false;
        }
    }
    
    private function getReactivationEmailTemplate(User $user): string
    {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4158D0; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background-color: #f8f9fa; padding: 20px; border-radius: 0 0 5px 5px; }
                .button { display: inline-block; background-color: #4158D0; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; }
                .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Votre compte a été réactivé</h1>
                </div>
                <div class="content">
                    <p>Bonjour ' . $user->getPrenom() . ' ' . $user->getName() . ',</p>
                    <p>Nous vous informons que votre compte Airmess a été réactivé avec succès.</p>
                    <p>Vous pouvez dès maintenant vous connecter à votre compte et profiter de tous nos services.</p>
                    <p>Si vous n\'êtes pas à l\'origine de cette réactivation, veuillez contacter notre support immédiatement.</p>
                    <a href="https://airmess.com/login" class="button">Se connecter</a>
                    <p>Merci de votre confiance,</p>
                    <p>L\'équipe Airmess</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                </div>
            </div>
        </body>
        </html>';
    }

    private function getResetPasswordEmailTemplate(string $code): string
    {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4158D0; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background-color: #f8f9fa; padding: 20px; border-radius: 0 0 5px 5px; }
                .code { font-size: 24px; font-weight: bold; text-align: center; margin: 20px 0; letter-spacing: 5px; color: #4158D0; }
                .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Réinitialisation de mot de passe</h1>
                </div>
                <div class="content">
                    <p>Vous avez demandé la réinitialisation de votre mot de passe.</p>
                    <p>Voici votre code de vérification :</p>
                    <div class="code">' . $code . '</div>
                    <p>Ce code est valable pendant 15 minutes.</p>
                    <p>Si vous n\'avez pas demandé cette réinitialisation, vous pouvez ignorer cet email.</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                </div>
            </div>
        </body>
        </html>';
    }
    
    private function getWelcomeEmailTemplate(User $user): string
    {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4158D0; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background-color: #f8f9fa; padding: 20px; border-radius: 0 0 5px 5px; }
                .button { display: inline-block; background-color: #4158D0; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px; margin-top: 20px; }
                .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Bienvenue sur Airmess !</h1>
                </div>
                <div class="content">
                    <p>Bonjour ' . $user->getPrenom() . ' ' . $user->getName() . ',</p>
                    <p>Nous sommes ravis de vous accueillir sur Airmess !</p>
                    <p>Votre compte a été créé avec succès. Vous pouvez maintenant profiter de tous nos services.</p>
                    <p>N\'hésitez pas à explorer notre plateforme et à découvrir toutes ses fonctionnalités.</p>
                    <a href="https://airmess.com/login" class="button">Accéder à mon compte</a>
                    <p>Merci de votre confiance,</p>
                    <p>L\'équipe Airmess</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                </div>
            </div>
        </body>
        </html>';
    }
    
    private function getVerificationEmailTemplate(string $code): string
    {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #4158D0; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
                .content { background-color: #f8f9fa; padding: 20px; border-radius: 0 0 5px 5px; }
                .code { font-size: 24px; font-weight: bold; text-align: center; margin: 20px 0; letter-spacing: 5px; color: #4158D0; }
                .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Vérification de votre adresse email</h1>
                </div>
                <div class="content">
                    <p>Merci de confirmer votre adresse email pour finaliser votre inscription sur Airmess.</p>
                    <p>Voici votre code de vérification :</p>
                    <div class="code">' . $code . '</div>
                    <p>Ce code est valable pendant 15 minutes.</p>
                </div>
                <div class="footer">
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                </div>
            </div>
        </body>
        </html>';
    }
}
