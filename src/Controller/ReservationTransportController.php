<?php

namespace App\Controller;

use App\Entity\ReservationTransport;
use App\Entity\User;
use App\Form\ReservationTransportType;
use App\Repository\ReservationTransportRepository;
use App\Repository\StationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Stripe\Stripe;
use Stripe\Charge;

#[Route('/reservation/transport')]
final class ReservationTransportController extends AbstractController
{
    #[Route(name: 'app_reservation_transport_index', methods: ['GET'])]
    public function index(ReservationTransportRepository $reservationTransportRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
      
        $reservations = $reservationTransportRepository->findByUserId($user->getIdU());

        return $this->render('reservation_transport/index.html.twig', [
            'reservation_transports' => $reservations,
        ]);
    }

    #[Route('/new/{id}', name: 'app_reservation_transport_new_reservation', methods: ['GET', 'POST'])]
    public function new(Request $request, $id, EntityManagerInterface $entityManager, StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);

        // Récupérer la station avec l'ID reçu
        $station = $stationRepository->find($id);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        $reservationTransport = new ReservationTransport();
        $reservationTransport->setUser($user);
        $reservationTransport->setStation($station);
        $reference = $this->generateReference($session, $userRepository);
        $reservationTransport->setReference($reference);
        $reservationTransport->setStatut('en cours');
        $reservationTransport->setPrix(0);

        $form = $this->createForm(ReservationTransportType::class, $reservationTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Calculate the price with potential discount
            $interval = $reservationTransport->getDateRes()->diff($reservationTransport->getDateFin());
            $heures = $interval->h + ($interval->days * 24);
            $prixTotal = $station->getPrixHeure() * $heures * $reservationTransport->getNombreVelo();
            
            // Apply 20% discount if station has more than 50 bikes
            if ($station->getNombreVelo() > 50) {
                $prixTotal = $prixTotal * 0.8;
            }
            
            $reservationTransport->setPrix($prixTotal);
            
            $tempData = [
                'user_id' => $user->getIdU(),
                'station_id' => $station->getIdS(),
                'date_res' => $reservationTransport->getDateRes()->format('Y-m-d H:i:s'),
                'date_fin' => $reservationTransport->getDateFin()->format('Y-m-d H:i:s'),
                'nombre_velo' => $reservationTransport->getNombreVelo(),
                'prix' => $prixTotal,
                'reference' => $reference
            ];
            
            $session->set('temp_reservation', $tempData);
    
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => true,
                    'redirect' => $this->generateUrl('app_reservation_transport_recap', [
                        'id' => $id,
                        'dateRes' => $reservationTransport->getDateRes()->format('Y-m-d H:i:s'),
                        'dateFin' => $reservationTransport->getDateFin()->format('Y-m-d H:i:s'),
                        'nombreVelo' => $reservationTransport->getNombreVelo(),
                    ])
                ]);
            }

            return $this->redirectToRoute('app_reservation_transport_recap', [
                'id' => $id,
                'dateRes' => $reservationTransport->getDateRes()->format('Y-m-d H:i:s'),
                'dateFin' => $reservationTransport->getDateFin()->format('Y-m-d H:i:s'),
                'nombreVelo' => $reservationTransport->getNombreVelo(),
            ]);
        }

        if ($form->isSubmitted() && !$form->isValid() && $request->isXmlHttpRequest()) {
            $errors = [];
            foreach ($form->getErrors(true) as $error) {
                $errors[$error->getOrigin()->getName()] = $error->getMessage();
            }
            return new JsonResponse(['errors' => $errors], 400);
        }

        return $this->render('reservation_transport/new.html.twig', [
            'reservation_transport' => $reservationTransport,
            'idS' => $id,
            'nom' => $station->getNom(),
            'prix' => $station->getPrixHeure(),
            'nombreVelo' => $station->getNombreVelo(),
            'form' => $form,
        ]);
    }

    #[Route('/new2', name: 'app_reservation_transport_new', methods: ['GET', 'POST'])]
    public function new2(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, StationRepository $stationRepository): Response
    {
        // Get the current user from the session
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Récupérer la station avec l'ID reçu
        $station = $stationRepository->find(40);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        $reservationTransport = new ReservationTransport();
        $reservationTransport->setUser($user);
        $reservationTransport->setStation($station);
        $reservationTransport->setReference($this->generateReference($this->getSession(), $userRepository));
        $reservationTransport->setStatut('en cours');
        $reservationTransport->setPrix(0);

        $form = $this->createForm(ReservationTransportType::class, $reservationTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservationTransport);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_transport_index');
        }

        return $this->render('reservation_transport/steps.html.twig', [
            'reservation_transport' => $reservationTransport,
            'form' => $form,
        ]);
    }

    private function generateReference(SessionInterface $session, UserRepository $userRepository): string
    {
        // Get user from session
        if (!$session->has('user_id')) {
            throw new \Exception('User not found in session');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            throw new \Exception('User not found in database');
        }
        
        $dateRes = new \DateTime(); 
        $nom = strtoupper(substr($user->getName(), 0, 2)); // 2 premières lettres du nom
        $prenom = strtoupper(substr($user->getPrenom(), -2)); // 2 dernières lettres du prénom
        $randomCode = str_pad(random_int(1000, 9999), 4, '0', STR_PAD_LEFT); // Code aléatoire de 4 chiffres
        $userId = str_pad($user->getIdU(), 4, '0', STR_PAD_LEFT); // ID utilisateur sur 4 chiffres

        return sprintf("AIR-%s-%s%s-%s-%s", 
            $dateRes->format('Ymd'), 
            $nom, 
            $prenom, 
            $randomCode, 
            $userId
        );
    }

    #[Route('/show/{id}', name: 'app_reservation_transport_show', methods: ['GET'])]
    public function show(ReservationTransport $reservationTransport): Response
    {
        return $this->render('reservation_transport/show.html.twig', [
            'reservation_transport' => $reservationTransport,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservation_transport_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReservationTransport $reservationTransport, EntityManagerInterface $entityManager, StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Check if the user is the owner of the reservation
        if ($reservationTransport->getUser()->getIdU() !== $user->getIdU()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à modifier cette réservation.');
        }

        $station = $stationRepository->find($reservationTransport->getStation()->getIdS());
        
        // Calculate current duration and price
        $interval = $reservationTransport->getDateRes()->diff($reservationTransport->getDateFin());
        $currentHeures = $interval->h + ($interval->days * 24);
        $currentPrix = $station->getPrixHeure() * $currentHeures * $reservationTransport->getNombreVelo();

        $form = $this->createForm(ReservationTransportType::class, $reservationTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Calculate new duration and price
            $newInterval = $reservationTransport->getDateRes()->diff($reservationTransport->getDateFin());
            $newHeures = $newInterval->h + ($newInterval->days * 24);
            $newPrix = $station->getPrixHeure() * $newHeures * $reservationTransport->getNombreVelo();
            
            // Update the price
            $reservationTransport->setPrix($newPrix);
            
            // Save changes
            $entityManager->flush();

            $this->addFlash('success', 'La réservation a été mise à jour avec succès.');
            return $this->redirectToRoute('app_reservation_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation_transport/edit.html.twig', [
            'reservation_transport' => $reservationTransport,
            'form' => $form,
            'station' => $station,
            'currentHeures' => $currentHeures,
            'currentPrix' => $currentPrix,
        ]);
    }

    #[Route('/process-payment', name: 'app_reservation_transport_process_payment', methods: ['POST'])]
    public function processPayment(Request $request, EntityManagerInterface $entityManager, StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        if (!$session->has('user_id')) {
            $this->addFlash('error', 'Vous devez être connecté pour effectuer un paiement.');
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);

        // Get temporary reservation data from session
        $tempData = $session->get('temp_reservation');
        if (!$tempData) {
            $this->addFlash('error', 'Données de réservation non trouvées. Veuillez recommencer.');
            return $this->redirectToRoute('app_reservation_transport_station');
        }
        
        // Get the station
        $station = $stationRepository->find($tempData['station_id']);
        
        if (!$station) {
            $this->addFlash('error', 'Station non trouvée.');
            return $this->redirectToRoute('app_reservation_transport_station');
        }

        // Get the Stripe token from the form
        $stripeToken = $request->request->get('stripeToken');
        if (!$stripeToken) {
            $this->addFlash('error', 'Erreur de paiement: Token Stripe manquant.');
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        }

        try {
            // Set your secret key
            \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

            // Create a charge
            $charge = \Stripe\Charge::create([
                'amount' => $tempData['prix'] * 100, // Amount in cents
                'currency' => 'eur',
                'source' => $stripeToken,
                'description' => 'Réservation de transport - Référence: ' . $tempData['reference']
            ]);

            // Verify the charge was successful
            if ($charge->status !== 'succeeded') {
                throw new \Exception('Le paiement n\'a pas été validé par Stripe.');
            }

            // Create the reservation in the database after successful payment
            $reservation = new ReservationTransport();
            
            // Configure the reservation
            $reservation->setUser($user);
            $reservation->setStation($station);
            $reservation->setDateRes(new \DateTime($tempData['date_res']));
            $reservation->setDateFin(new \DateTime($tempData['date_fin']));
            $reservation->setNombreVelo($tempData['nombre_velo']);
            $reservation->setPrix($tempData['prix']);
            $reservation->setReference($tempData['reference']);
            $reservation->setStatut('confirmé');
            
            // Save to database
            $entityManager->persist($reservation);
            $entityManager->flush();
            
            // Update the number of available bikes at the station
            $stationRepository->decrementNbVelosDispo($station->getIdS(), $tempData['nombre_velo']);
            
            // Store reservation data for the confirmation page
            $session->set('confirmed_reservation', [
                'reference' => $reservation->getReference(),
                'station' => $station->getNom(),
                'date' => $tempData['date_res'],
                'nombreVelo' => $tempData['nombre_velo'],
                'prix' => $tempData['prix']
            ]);
            
            // Clear the temporary reservation data
            $session->remove('temp_reservation');
            
            // Redirect to confirmation page
            return $this->redirectToRoute('app_reservation_transport_confirmation');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card errors
            $this->addFlash('error', 'Erreur de carte: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            $this->addFlash('error', 'Trop de tentatives. Veuillez réessayer plus tard.');
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            $this->addFlash('error', 'Erreur de paramètres: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            $this->addFlash('error', 'Erreur d\'authentification avec Stripe.');
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            $this->addFlash('error', 'Erreur de connexion avec Stripe. Veuillez vérifier votre connexion internet.');
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user
            $this->addFlash('error', 'Une erreur est survenue lors du paiement. Veuillez réessayer.');
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        } catch (\Exception $e) {
            // Something else happened, completely unrelated to Stripe
            $this->addFlash('error', 'Une erreur inattendue est survenue: ' . $e->getMessage());
            return $this->redirectToRoute('app_reservation_transport_payment', ['id' => $tempData['station_id']]);
        }
    }

    #[Route('/confirmation', name: 'app_reservation_transport_confirmation', methods: ['GET'])]
    public function confirmation(Request $request): Response
    {
        // Récupérer les données de réservation depuis la session
        $confirmedData = $request->getSession()->get('confirmed_reservation');
        
        if (!$confirmedData) {
            // Rediriger vers la liste des réservations si pas de données
            return $this->redirectToRoute('app_reservation_transport_index');
        }
        
        return $this->render('reservation_transport/confirmation.html.twig', [
            'reservation' => $confirmedData
        ]);
    }

    #[Route('/payment/{id}', name: 'app_reservation_transport_payment', methods: ['GET'])]
    public function payment(Request $request, $id, StationRepository $stationRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Pour cette méthode, l'ID est l'identifiant de la station
        $tempData = $request->getSession()->get('temp_reservation');
        
        if (!$tempData) {
            return $this->redirectToRoute('app_reservation_transport_station');
        }
        
        // Récupérer la station et l'utilisateur
        $station = $stationRepository->find($tempData['station_id']);
        $user = $userRepository->find($tempData['user_id']);
        
        if (!$station || !$user) {
            throw $this->createNotFoundException('Station ou utilisateur non trouvé');
        }
        
        // Créer un objet réservation temporaire pour l'affichage
        $reservation = new ReservationTransport();
        $reservation->setUser($user);
        $reservation->setStation($station);
        $reservation->setDateRes(new \DateTime($tempData['date_res']));
        $reservation->setDateFin(new \DateTime($tempData['date_fin']));
        $reservation->setNombreVelo($tempData['nombre_velo']);
        $reservation->setPrix($tempData['prix']);
        $reservation->setReference($tempData['reference']); // Use the stored reference
        
        return $this->render('reservation_transport/payment.html.twig', [
            'reservation' => $reservation,
            'stripe_public_key' => $_ENV['STRIPE_PUBLIC_KEY']
        ]);
    }

    #[Route('/confirm', name: 'app_reservation_transport_confirm', methods: ['POST'])]
    public function confirm(Request $request, EntityManagerInterface $entityManager, 
                        StationRepository $stationRepository, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Récupérer les données du formulaire
        $userId = $request->request->get('user_id');
        $stationId = $request->request->get('station_id');
        $dateRes = $request->request->get('date_res');
        $dateFin = $request->request->get('date_fin');
        $nombreVelo = $request->request->get('nombre_velo');
        $prix = $request->request->get('prix');
        
        // Get user
        $user = $userRepository->find($userId);
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        // Get the stored reference from session
        $tempData = $session->get('temp_reservation');
        if (!$tempData || !isset($tempData['reference'])) {
            throw new \Exception('Reference not found in session');
        }
        
        // Stocker dans la session pour traitement ultérieur après paiement
        $tempData = [
            'user_id' => $userId,
            'station_id' => $stationId,
            'date_res' => $dateRes,
            'date_fin' => $dateFin,
            'nombre_velo' => $nombreVelo,
            'prix' => $prix,
            'reference' => $tempData['reference'] // Use the stored reference
        ];
        
        $request->getSession()->set('temp_reservation', $tempData);
        
        // Rediriger vers la page de paiement avec l'ID de la station
        return $this->redirectToRoute('app_reservation_transport_payment', [
            'id' => $stationId
        ]);
    }

    #[Route('/recap/{id}', name: 'app_reservation_transport_recap', methods: ['GET', 'POST'])]
    public function recap(Request $request, $id, EntityManagerInterface $entityManager, StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Récupérer la station avec l'ID reçu
        $station = $stationRepository->find($id);
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }
    
        // Récupérer les informations passées via l'URL
        $dateRes = $request->query->get('dateRes');
        $dateFin = $request->query->get('dateFin');
        $nombreVelo = $request->query->get('nombreVelo');
    
        if (!$dateRes || !$dateFin || !$nombreVelo) {
            return $this->redirectToRoute('app_reservation_transport_station');
        }
    
        // Convertir les dates
        $dateRes = new \DateTime($dateRes);
        $dateFin = new \DateTime($dateFin);
    
        // Calcul de la durée en heures
        $interval = $dateRes->diff($dateFin);
        $heures = $interval->h + ($interval->days * 24);
    
        // Calcul du prix total
        $prixTotal = $station->getPrixHeure() * $heures * $nombreVelo;
        
        // Appliquer une remise de 20% si la station a plus de 50 vélos disponibles
        if ($station->getNombreVelo() > 50) {
            $prixTotal = $prixTotal * 0.8; // 20% de remise
        }
    
        // Récupérer l'utilisateur
        $user = $this->getUser() ?? $entityManager->getRepository(User::class)->find(40);
    
        // Generate reference once
        $reference = $this->generateReference($session, $userRepository);
    
        // Store all data in session
        $tempData = [
            'user_id' => $user->getIdU(),
            'station_id' => $station->getIdS(),
            'date_res' => $dateRes->format('Y-m-d H:i:s'),
            'date_fin' => $dateFin->format('Y-m-d H:i:s'),
            'nombre_velo' => $nombreVelo,
            'prix' => $prixTotal,
            'reference' => $reference
        ];
        
        $session->set('temp_reservation', $tempData);
    
        // Créer une réservation temporaire pour affichage
        $reservation = new ReservationTransport();
        $reservation->setUser($user);
        $reservation->setStation($station);
        $reservation->setDateRes($dateRes);
        $reservation->setDateFin($dateFin);
        $reservation->setNombreVelo($nombreVelo);
        $reservation->setPrix($prixTotal);
        $reservation->setReference($reference);
        $reservation->setStatut('en attente');
    
        return $this->render('reservation_transport/recap.html.twig', [
            'reservation' => $reservation,
            'station' => $station,
            'currentStep' => 2,
        ]);
    }

    #[Route('/cardsStation', name: 'app_reservation_transport_station', methods: ['GET'])]
    public function cardStation(Request $request, StationRepository $stationRepository): Response
    {
        $stations = $stationRepository->findAll();
    
        if ($request->isXmlHttpRequest()) {
            return $this->render('reservation_transport/cardsStation.html.twig', [
                'stations' => $stations,
            ], new Response('', Response::HTTP_OK));
        }
    
        return $this->render('reservation_transport/cardsStation.html.twig', [
            'stations' => $stations,
        ]);
    }

    // Move the delete route AFTER all other specific routes
    #[Route('/{id}', name: 'app_reservation_transport_delete', methods: ['POST'])]
    public function delete(Request $request, ReservationTransport $reservationTransport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationTransport->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservationTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_transport_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/chat', name: 'app_reservation_transport_chat', methods: ['GET'])]
    public function chat(Request $request, ReservationTransport $reservation, EntityManagerInterface $entityManager, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get current user from session
        $userId = $session->get('user_id');
        $currentUser = $userRepository->find($userId);
        
        if (!$currentUser) {
            return $this->redirectToRoute('app_login');
        }
        
        // Check if the user is the owner of the reservation
        if ($reservation->getUser()->getIdU() !== $currentUser->getIdU()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à accéder à cette conversation.');
        }
        
        // Get the station owner
        $stationOwner = $reservation->getStation()->getUser();
        
        // Get messages between the current user and the station owner
        $messages = $entityManager->getRepository('App\Entity\Message')->findBy(
            [
                'sender' => [$currentUser->getIdU(), $stationOwner->getIdU()],
                'receiver' => [$currentUser->getIdU(), $stationOwner->getIdU()]
            ],
            ['dateM' => 'ASC']
        );
        
        return $this->render('reservation_transport/reservation_chat.html.twig', [
            'reservation' => $reservation,
            'messages' => $messages
        ]);
    }

    #[Route('/{id}/message/new', name: 'app_reservation_message_new', methods: ['POST'])]
    public function newMessage(Request $request, ReservationTransport $reservation, EntityManagerInterface $entityManager, UserRepository $userRepository, SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get current user from session
        $userId = $session->get('user_id');
        $currentUser = $userRepository->find($userId);
        
        if (!$currentUser) {
            return $this->redirectToRoute('app_login');
        }
        
        // Check if the user is the owner of the reservation
        if ($reservation->getUser()->getIdU() !== $currentUser->getIdU()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à envoyer un message pour cette réservation.');
        }
        
        // Get content from the request
        $content = $request->request->get('content');
        
        if (empty($content)) {
            $this->addFlash('error', 'Le message ne peut pas être vide.');
            return $this->redirectToRoute('app_reservation_transport_chat', ['id' => $reservation->getId()]);
        }
        
        // Get the station from the reservation
        $station = $reservation->getStation();
        
        // Get the owner of the station
        $stationOwner = $station->getUser();
        
        if (!$stationOwner) {
            throw new \Exception('Le propriétaire de la station n\'a pas été trouvé.');
        }
        
        // Create new message
        $message = new \App\Entity\Message();
        $message->setContent($content);
        $message->setSender($currentUser);
        $message->setReceiver($stationOwner);
        $message->setDateM(new \DateTime());
        
        // Save to database
        $entityManager->persist($message);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_reservation_transport_chat', ['id' => $reservation->getId()]);
    }
}