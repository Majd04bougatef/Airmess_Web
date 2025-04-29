<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Reservation;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

class ReservationEmailService
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

    /**
     * Envoie un email de confirmation de réservation
     * 
     * @param User $user L'utilisateur qui a fait la réservation
     * @param Reservation $reservation La réservation confirmée
     * @param string $reference Référence de la réservation
     * @return bool True si l'email a été envoyé avec succès, false sinon
     */
    public function sendConfirmationEmail(User $user, Reservation $reservation, string $reference): bool
    {
        try {
            // Log attempt
            if ($this->logger) {
                $this->logger->info('Attempting to send reservation confirmation email to: ' . $user->getEmail());
            } else {
                error_log('Attempting to send reservation confirmation email to: ' . $user->getEmail());
            }

            $email = (new Email())
                ->from(new Address($this->fromEmail, 'Airmess'))
                ->to($user->getEmail())
                ->subject('Confirmation de votre réservation - Airmess')
                ->html($this->getConfirmationTemplate($user, $reservation, $reference));

            $this->mailer->send($email);
            
            // Log success
            if ($this->logger) {
                $this->logger->info('Successfully sent reservation confirmation email to: ' . $user->getEmail());
            } else {
                error_log('Successfully sent reservation confirmation email to: ' . $user->getEmail());
            }
            
            return true;
        } catch (\Exception $e) {
            // Log error
            $errorMsg = 'Failed to send reservation confirmation email to ' . $user->getEmail() . ': ' . $e->getMessage();
            
            if ($this->logger) {
                $this->logger->error($errorMsg);
            } else {
                error_log($errorMsg);
            }
            
            return false;
        }
    }
    
    /**
     * Génère le template HTML pour l'email de confirmation de réservation
     * 
     * @param User $user L'utilisateur qui a fait la réservation
     * @param Reservation $reservation La réservation confirmée
     * @param string $reference Référence de la réservation
     * @return string Le template HTML
     */
    private function getConfirmationTemplate(User $user, Reservation $reservation, string $reference): string
    {
        $offre = $reservation->getOffre();
        
        $offreDescription = $offre->getDescription() ?? 'Offre réservée';
        $offrePlace = $offre->getPlace() ?? '';
        $price = $offre->getPriceAfter() ?? '';
        $dateReservation = $reservation->getDateRes() ? $reservation->getDateRes()->format('d/m/Y') : date('d/m/Y');
        $dateDebut = $offre->getStartDate() ? $offre->getStartDate()->format('d/m/Y') : '';
        $dateFin = $offre->getEndDate() ? $offre->getEndDate()->format('d/m/Y') : '';
        
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Confirmation de réservation</title>
            <style>
                body { 
                    font-family: Arial, sans-serif; 
                    line-height: 1.6; 
                    color: #333;
                    margin: 0;
                    padding: 0;
                    -webkit-font-smoothing: antialiased;
                    background-color: #f7f7f7;
                }
                .container { 
                    max-width: 600px; 
                    margin: 0 auto; 
                    background-color: #ffffff;
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                }
                .header { 
                    background: linear-gradient(135deg, #4158D0, #6C63FF);
                    color: white; 
                    padding: 30px 20px; 
                    text-align: center; 
                }
                .header h1 {
                    margin: 0;
                    font-size: 26px;
                    font-weight: 700;
                    letter-spacing: 0.5px;
                }
                .content { 
                    background-color: #ffffff; 
                    padding: 30px 20px; 
                }
                .button { 
                    display: inline-block; 
                    background: linear-gradient(135deg, #4158D0, #6C63FF);
                    color: white !important; 
                    text-decoration: none; 
                    padding: 12px 25px; 
                    border-radius: 50px; 
                    margin-top: 20px;
                    font-weight: 600;
                    text-align: center;
                    box-shadow: 0 4px 10px rgba(108, 99, 255, 0.3);
                    transition: all 0.3s ease;
                }
                .button:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 15px rgba(108, 99, 255, 0.4);
                }
                .footer { 
                    background-color: #f8f9fa;
                    border-top: 1px solid #eaeaea;
                    padding: 20px;
                    text-align: center; 
                    font-size: 12px; 
                    color: #777; 
                }
                .reservation-details { 
                    background-color: #f8f9fa; 
                    padding: 20px; 
                    border-radius: 8px; 
                    margin: 25px 0; 
                    border: 1px solid #eaeaea;
                }
                .data-row {
                    display: flex;
                    justify-content: space-between;
                    border-bottom: 1px solid #eee;
                    padding: 12px 0;
                    margin: 0;
                }
                .data-row:last-child {
                    border-bottom: none;
                }
                .data-label {
                    font-weight: 600;
                    color: #4158D0;
                }
                .data-value {
                    color: #333;
                    font-weight: 500;
                }
                .confirmation-message { 
                    background-color: #e8f5e9;
                    border-left: 4px solid #2dce89;
                    padding: 15px;
                    margin: 20px 0;
                    font-size: 18px;
                    color: #2dce89; 
                    text-align: center; 
                    font-weight: 600;
                    border-radius: 4px;
                }
                .tick-icon {
                    font-size: 20px;
                    margin-right: 5px;
                }
                .greeting {
                    font-size: 18px;
                    color: #333;
                    margin-bottom: 20px;
                }
                .thank-you {
                    font-weight: 500;
                    margin-top: 25px;
                }
                .social-icons {
                    margin-top: 20px;
                }
                .social-icons a {
                    margin: 0 10px;
                    text-decoration: none;
                }
                .footer-links {
                    margin-top: 10px;
                }
                .footer-links a {
                    color: #4158D0;
                    margin: 0 10px;
                    text-decoration: none;
                }
                .reference-box {
                    background-color: #EDF2FF;
                    border: 2px dashed #4158D0;
                    border-radius: 8px;
                    padding: 15px;
                    text-align: center;
                    margin: 25px 0;
                }
                .reference-number {
                    font-size: 22px;
                    font-weight: 700;
                    color: #4158D0;
                    letter-spacing: 1px;
                }
                @media only screen and (max-width: 600px) {
                    .container {
                        width: 100% !important;
                        border-radius: 0;
                    }
                    .data-row {
                        flex-direction: column;
                    }
                    .data-value {
                        margin-top: 5px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>Confirmation de Réservation</h1>
                </div>
                <div class="content">
                    <p class="greeting">Bonjour ' . $user->getPrenom() . ' ' . $user->getName() . ',</p>
                    
                    <div class="confirmation-message">
                        <span class="tick-icon">✓</span> Votre réservation a été confirmée avec succès !
                    </div>
                    
                    <p>Nous vous remercions d\'avoir choisi Airmess pour votre réservation. Voici les détails :</p>
                    
                    <div class="reservation-details">
                        <div class="data-row">
                            <div class="data-label">Offre</div>
                            <div class="data-value">' . $offreDescription . '</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Destination</div>
                            <div class="data-value">' . $offrePlace . '</div>
                        </div>
                        <div class="data-row">
                            <div class="data-label">Date de réservation</div>
                            <div class="data-value">' . $dateReservation . '</div>
                        </div>
                        ' . ($dateDebut ? '
                        <div class="data-row">
                            <div class="data-label">Date de début</div>
                            <div class="data-value">' . $dateDebut . '</div>
                        </div>' : '') . '
                        ' . ($dateFin ? '
                        <div class="data-row">
                            <div class="data-label">Date de fin</div>
                            <div class="data-value">' . $dateFin . '</div>
                        </div>' : '') . '
                        <div class="data-row">
                            <div class="data-label">Prix total</div>
                            <div class="data-value">' . $price . ' €</div>
                        </div>
                    </div>
                    
                    <div class="reference-box">
                        <p style="margin:0;font-size:14px;">Votre numéro de référence</p>
                        <p class="reference-number">' . $reference . '</p>
                    </div>
                    
                    <p>Conservez précieusement cette référence, elle vous sera demandée pour toute communication concernant votre réservation.</p>
                    
                    <p class="thank-you">Vous pouvez télécharger votre reçu de paiement en cliquant sur le bouton ci-dessous.</p>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <a href="http://localhost:8000/reservation/receipt/' . $reservation->getIdR() . '" class="button">
                            <i style="margin-right: 6px;">📄</i> Télécharger mon reçu
                        </a>
                    </div>
                    
                    <p style="margin-top:30px;">Nous vous souhaitons un excellent séjour !</p>
                    
                    <p>L\'équipe Airmess</p>
                </div>
                
                <div class="footer">
                    <div class="social-icons">
                        <a href="https://facebook.com/airmess" target="_blank">Facebook</a> |
                        <a href="https://instagram.com/airmess" target="_blank">Instagram</a> |
                        <a href="https://twitter.com/airmess" target="_blank">Twitter</a>
                    </div>
                    <div class="footer-links">
                        <a href="https://airmess.com/privacy">Confidentialité</a> |
                        <a href="https://airmess.com/terms">Conditions</a> |
                        <a href="https://airmess.com/contact">Contact</a>
                    </div>
                    <p>© ' . date('Y') . ' Airmess. Tous droits réservés.</p>
                    <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
                </div>
            </div>
        </body>
        </html>';
    }
}