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
            // Store reservation data in session instead of database
            $tempData = [
                'user_id' => $user->getIdU(),
                'station_id' => $station->getIdS(),
                'date_res' => $reservationTransport->getDateRes()->format('Y-m-d H:i:s'),
                'date_fin' => $reservationTransport->getDateFin()->format('Y-m-d H:i:s'),
                'nombre_velo' => $reservationTransport->getNombreVelo(),
                'prix' => $reservationTransport->getPrix(),
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
    public function processPayment(Request $request, EntityManagerInterface $entityManager, 
                                StationRepository $stationRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get user from session
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);

        // Get temporary reservation data from session
        $tempData = $session->get('temp_reservation');
        if (!$tempData) {
            return $this->redirectToRoute('app_reservation_transport_station');
        }
        
        // Récupérer la station
        $station = $stationRepository->find($tempData['station_id']);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }
        
        // Création de la réservation dans la base de données après paiement réussi
        $reservation = new ReservationTransport();
        
        // Configuration de la réservation
        $reservation->setUser($user);
        $reservation->setStation($station);
        $reservation->setDateRes(new \DateTime($tempData['date_res']));
        $reservation->setDateFin(new \DateTime($tempData['date_fin']));
        $reservation->setNombreVelo($tempData['nombre_velo']);
        $reservation->setPrix($tempData['prix']);
        $reservation->setReference($tempData['reference']);
        $reservation->setStatut('confirmé');
        
        // Enregistrer dans la base de données
        $entityManager->persist($reservation);
        $entityManager->flush();
        
        // Mettre à jour le nombre de vélos disponibles à la station
        $stationRepository->decrementNbVelosDispo($station->getIdS(), $tempData['nombre_velo']);
        
        // Stocker les données de réservation pour la page de confirmation
        $session->set('confirmed_reservation', [
            'reference' => $reservation->getReference(),
            'station' => $station->getNom(),
            'date' => $tempData['date_res'],
            'nombreVelo' => $tempData['nombre_velo'],
            'prix' => $tempData['prix']
        ]);
        
        // Clear the temporary reservation data
        $session->remove('temp_reservation');
        
        // Rediriger vers la page de confirmation
        return $this->redirectToRoute('app_reservation_transport_confirmation');
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
            'reservation' => $reservation
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
    public function chat(Request $request, ReservationTransport $reservation, EntityManagerInterface $entityManager): Response
    {
        // Check if the user is the owner of the reservation
        $currentUser = $this->getUser() ?? $entityManager->getRepository(User::class)->find(40);
        
        if ($reservation->getUser()->getIdU() !== $currentUser->getIdU()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à accéder à cette conversation.');
        }
        
        // Get existing messages for this reservation
        $messages = $entityManager->getRepository('App\Entity\Message')->findBy(
            ['reservation' => $reservation],
            ['dateM' => 'ASC']
        );
        
        return $this->render('reservation_transport/reservation_chat.html.twig', [
            'reservation' => $reservation,
            'messages' => $messages
        ]);
    }

    #[Route('/{id}/message/new', name: 'app_reservation_message_new', methods: ['POST'])]
    public function newMessage(Request $request, ReservationTransport $reservation, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        // Check if the user is the owner of the reservation
        $currentUser = $this->getUser() ?? $entityManager->getRepository(User::class)->find(40);
        
        if ($reservation->getUser()->getIdU() !== $currentUser->getIdU()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à envoyer un message pour cette réservation.');
        }
        
        // Get content from the request
        $content = $request->request->get('content');
        
        if (empty($content)) {
            $this->addFlash('error', 'Le message ne peut pas être vide.');
            return $this->redirectToRoute('app_reservation_transport_chat', ['id' => $reservation->getId()]);
        }
        
        // Get the station founder as the receiver
        // We use the station's ID to find its founder
        $station = $reservation->getStation();
        
        // Find the founder/owner of the station (assuming user with ID 1 is the founder)
        // In a real system, you would have a proper relationship between stations and their founders
        $receiverUser = $userRepository->find(1);
        
        if (!$receiverUser) {
            throw new \Exception('Le fondateur de la station n\'a pas été trouvé.');
        }
        
        // Create new message
        $message = new \App\Entity\Message();
        $message->setContent($content);
        $message->setSender($currentUser);
        $message->setReceiver($receiverUser); // Set the station founder as receiver
        $message->setDateM(new \DateTime());
        $message->setReservation($reservation);
        
        // Save to database
        $entityManager->persist($message);
        $entityManager->flush();
        
        return $this->redirectToRoute('app_reservation_transport_chat', ['id' => $reservation->getId()]);
    }
}