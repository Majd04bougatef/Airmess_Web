<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Offre;
use App\Entity\User;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\OffreRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Stripe\Stripe;
use Stripe\Charge;
use Symfony\Component\Security\Core\User\UserInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    #[Route(name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findAll(),
        ]);
    }

    #[Route('/new/{idO}', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, Offre $offre, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Vérifier s'il reste des places disponibles
        if ($offre->getNumberLimit() <= 0) {
            $this->addFlash('error', 'Cette offre ne dispose plus de places disponibles.');
            return $this->redirectToRoute('offreVoyageurs_page');
        }

        // Stocker les informations de l'offre dans la session
        $offreData = [
            'id' => $offre->getIdO(),
            'place' => $offre->getPlace(),
            'description' => $offre->getDescription(),
            'price' => $offre->getPriceAfter(),
            'date' => new \DateTime(),
        ];
        $session->set('current_offre', $offreData);

        $reservation = new Reservation();
        $reservation->setOffre($offre);
        
        // Si l'utilisateur est connecté, l'associer à la réservation
        $user = null;
        $userId = null;
        
        if ($this->getUser()) {
            $user = $userRepository->find($session->get('user_id'));
            if ($user) {
                $reservation->setUser($user);
                $userId = $user->getIdU();
            }
        }

        $form = $this->createForm(\App\Form\ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $reservation->setDateRes(new \DateTime()); // Date actuelle si nécessaire
                
                // Décrémenter le nombre de places disponibles
                $offre->setNumberLimit($offre->getNumberLimit() - 1);
                
                $entityManager->persist($reservation);
                $entityManager->persist($offre);
                $entityManager->flush();

                // Générer une référence pour la réservation
                $prefix = 'RE'; // Préfixe pour les réservations
                $sessionUserId = $session->get('user_id', '0');
                $timestamp = time();
                $reference = $prefix . $sessionUserId . $timestamp . random_int(1000, 9999);

                // Stocker les informations de la réservation dans la session
                $reservationData = [
                    'id' => $reservation->getIdR(),
                    'offre_id' => $offre->getIdO(),
                    'user_id' => $session->get('user_id'),
                    'date_res' => new \DateTime(),
                    'price' => $offre->getPriceAfter(),
                    'reference' => $reference,
                    'status' => 'pending'
                ];
                
                $session->set('current_reservation', $reservationData);

                $this->addFlash('success', 'Votre réservation a été créée avec succès !');
                // Rediriger vers la phase suivante (par exemple, récapitulatif)
                return $this->redirectToRoute('app_reservation_recap', ['idR' => $reservation->getIdR()]);
            } else {
                // Ajouter des messages flash pour les erreurs de validation
                foreach ($form->getErrors(true) as $error) {
                    $this->addFlash('error', $error->getMessage());
                }
            }
        }

        return $this->render('reservation/new.html.twig', [
            'form' => $form->createView(),
            'offre' => $offre,
        ]);
    }

    #[Route('/{idR}/show', name: 'app_reservation_show', methods: ['GET'])]
    public function show(Reservation $reservation): Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/{idR}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{idR}/delete', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getIdR(), $request->getPayload()->getString('_token'))) {
            // Récupérer l'offre associée avant de supprimer la réservation
            $offre = $reservation->getOffre();
            
            // Supprimer la réservation
            $entityManager->remove($reservation);
            
            // Incrémenter le nombre de places disponibles
            if ($offre) {
                $offre->setNumberLimit($offre->getNumberLimit() + 1);
                $entityManager->persist($offre);
            }
            
            $entityManager->flush();
            
            $this->addFlash('success', 'Votre réservation a été annulée avec succès.');
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/recap/{idR}', name: 'app_reservation_recap', methods: ['GET'])]
    public function recap(Reservation $reservation, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Mettre à jour les données de session si nécessaire
        $currentReservation = $session->get('current_reservation');
        if (!$currentReservation || $currentReservation['id'] != $reservation->getIdR()) {
            // Générer une référence si elle n'existe pas
            $prefix = 'RE'; // Préfixe pour les réservations
            $sessionUserId = $session->get('user_id', '0');
            $timestamp = time();
            $reference = $prefix . $sessionUserId . $timestamp . random_int(1000, 9999);
            
            $reservationData = [
                'id' => $reservation->getIdR(),
                'offre_id' => $reservation->getOffre()->getIdO(),
                'user_id' => $session->get('user_id'),
                'date_res' => $reservation->getDateRes() ?: new \DateTime(),
                'price' => $reservation->getOffre()->getPriceAfter(),
                'reference' => $reference,
                'status' => 'pending'
            ];
            
            $session->set('current_reservation', $reservationData);
        }

        return $this->render('reservation/recap.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/paymentoffre/{idR}', name: 'app_reservation_payment', methods: ['GET', 'POST'])]
    public function payment(Request $request, Reservation $reservation, EntityManagerInterface $entityManager, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Vérifier si l'utilisateur est connecté
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer un paiement.');
            return $this->redirectToRoute('login');
        }

        $user = $userRepository->find($session->get('user_id'));
        if (!$user) {
            $this->addFlash('error', 'Utilisateur non trouvé. Veuillez vous reconnecter.');
            return $this->redirectToRoute('login');
        }

        // Vérifier si la réservation appartient à l'utilisateur
        if ($reservation->getUser() && $reservation->getUser()->getIdU() !== $user->getIdU()) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à accéder à cette réservation.');
            return $this->redirectToRoute('app_reservation_index');
        }

        // Si ce n'est pas déjà fait, associer l'utilisateur à la réservation
        if (!$reservation->getUser()) {
            $reservation->setUser($user);
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            // Mettre à jour les données de session
            $currentReservation = $session->get('current_reservation', []);
            $currentReservation['user_id'] = $session->get('user_id');
            $session->set('current_reservation', $currentReservation);
        }

        return $this->render('reservation/payment.html.twig', [
            'reservation' => $reservation,
            'stripe_public_key' => $_ENV['STRIPE_PUBLIC_KEY']
        ]);
    }

    #[Route('/process-payment/{idR}', name: 'app_reservation_process_payment', methods: ['POST'])]
    public function processPayment(Request $request, Reservation $reservation, EntityManagerInterface $entityManager, OffreRepository $offreRepository, SessionInterface $session, UserRepository $userRepository, \App\Service\ReservationEmailService $emailService): Response
    {
        // Vérifier si l'utilisateur est connecté
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer un paiement.');
            return $this->redirectToRoute('login');
        }

        $user = $userRepository->find($session->get('user_id'));
        if (!$user) {
            $this->addFlash('error', 'Utilisateur non trouvé. Veuillez vous reconnecter.');
            return $this->redirectToRoute('login');
        }

        // Vérifier si la réservation appartient à l'utilisateur
        if ($reservation->getUser() && $reservation->getUser()->getIdU() !== $user->getIdU()) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à accéder à cette réservation.');
            return $this->redirectToRoute('app_reservation_index');
        }

        // Get the Stripe token from the form
        $stripeToken = $request->request->get('stripeToken');
        if (!$stripeToken) {
            $this->addFlash('error', 'Erreur de paiement: Token Stripe manquant.');
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        }

        try {
            // Set your secret key
            \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
            
            // Récupérer la référence depuis la session
            $currentReservation = $session->get('current_reservation', []);
            $reference = $currentReservation['reference'] ?? 'RES-' . $reservation->getIdR();

            // Create a charge
            $charge = \Stripe\Charge::create([
                'amount' => $reservation->getOffre()->getPriceAfter() * 100, // Amount in cents
                'currency' => 'eur',
                'source' => $stripeToken,
                'description' => 'Réservation d\'offre - Référence: ' . $reference
            ]);

            // Verify the charge was successful
            if ($charge->status !== 'succeeded') {
                throw new \Exception('Le paiement n\'a pas été validé par Stripe.');
            }

            // Mark the reservation as paid/confirmed
            $reservation->setDateRes(new \DateTime()); // Update with current date if needed
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            // Mettre à jour le statut dans la session
            $currentReservation = $session->get('current_reservation', []);
            $currentReservation['status'] = 'confirmed';
            $session->set('current_reservation', $currentReservation);

            // Envoyer l'email de confirmation avec le nouveau service
            $emailSent = $emailService->sendConfirmationEmail($user, $reservation, $reference);
            
            if (!$emailSent) {
                // Ajouter un message flash pour informer que l'email n'a pas pu être envoyé
                $this->addFlash('warning', 'Votre paiement a été validé, mais nous n\'avons pas pu vous envoyer l\'email de confirmation. Veuillez vérifier vos réservations dans votre espace client.');
            }

            // Redirect to the confirmation page
            return $this->redirectToRoute('app_reservation_confirmation', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            $this->addFlash('error', 'Erreur de carte: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            $this->addFlash('error', 'Trop de tentatives. Veuillez réessayer plus tard.');
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            $this->addFlash('error', 'Erreur de paramètres: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            $this->addFlash('error', 'Erreur d\'authentification avec Stripe.');
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            $this->addFlash('error', 'Erreur de connexion avec Stripe. Veuillez vérifier votre connexion internet.');
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user
            $this->addFlash('error', 'Une erreur est survenue lors du paiement. Veuillez réessayer.');
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        } catch (\Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $this->addFlash('error', 'Une erreur inattendue est survenue: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_payment', ['idR' => $reservation->getIdR()]);
        }
    }

    #[Route('/confirmationoffre/{idR}', name: 'app_reservation_confirmation', methods: ['GET'])]
    public function confirmation(Reservation $reservation, SessionInterface $session): Response
    {
        // Nettoyer la session une fois que la réservation est terminée (facultatif)
        // $session->remove('current_reservation');
        // $session->remove('current_offre');
        
        return $this->render('reservation/confirmation.html.twig', [
            'reservation' => $reservation,
        ]);
    }
    
    #[Route('/receipt/{idR}', name: 'app_reservation_receipt', methods: ['GET'])]
    public function generateReceipt(Reservation $reservation): Response
    {
        if (!$reservation) {
            throw $this->createNotFoundException('La réservation demandée n\'existe pas');
        }
        
        // Générer le HTML pour le reçu
        $html = $this->renderView('reservation/receipt.html.twig', [
            'reservation' => $reservation,
            'date' => new \DateTime()
        ]);
        
        // Configurer Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        
        // Créer une instance de Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        
        // Préparer la réponse
        $filename = 'receipt_' . $reservation->getIdR() . '.pdf';
        
        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]
        );
    }
}
