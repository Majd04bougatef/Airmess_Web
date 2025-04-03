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
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reservation/transport')]
final class ReservationTransportController extends AbstractController
{
    #[Route(name: 'app_reservation_transport_index', methods: ['GET'])]
    public function index(Request $request, ReservationTransportRepository $reservationTransportRepository): Response
    {
        $reservations = $reservationTransportRepository->findAll();

        // Vérifier si la requête est AJAX
        if ($request->isXmlHttpRequest()) {
            return $this->render('reservation_transport/_list.html.twig', [
                'reservation_transports' => $reservations,
            ]);
        }

        // Si ce n'est pas AJAX, charger la mise en page complète
        return $this->render('reservation_transport/index.html.twig', [
            'reservation_transports' => $reservations,
        ]);
    }

    #[Route('/new/{id}', name: 'app_reservation_transport_new_reservation', methods: ['GET', 'POST'])]
    public function new(Request $request, $id, EntityManagerInterface $entityManager, UserRepository $userRepository, StationRepository $stationRepository): Response
    {
        // Récupérer la station avec l'ID reçu
        $station = $stationRepository->find($id);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        $reservationTransport = new ReservationTransport();

        $user = $userRepository->find(40);  // Vous pouvez obtenir l'utilisateur actuellement connecté ici
        $reservationTransport->setUser($user);

        $reservationTransport->setStation($station);  // Lier la réservation à la station reçue

        $reference = $this->generateReference($user);
        $reservationTransport->setReference($reference);
        $reservationTransport->setStatut('en cours');
        $reservationTransport->setPrix(0);

        $form = $this->createForm(ReservationTransportType::class, $reservationTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservationTransport);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_transport_index');
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
    public function new2(Request $request,  EntityManagerInterface $entityManager, UserRepository $userRepository, StationRepository $stationRepository): Response
    {
        // Récupérer la station avec l'ID reçu
        $station = $stationRepository->find(40);
        
        if (!$station) {
            throw $this->createNotFoundException('Station non trouvée');
        }

        $reservationTransport = new ReservationTransport();

        $user = $userRepository->find(40);  // Vous pouvez obtenir l'utilisateur actuellement connecté ici
        $reservationTransport->setUser($user);

        $reservationTransport->setStation($station);  // Lier la réservation à la station reçue

        $reference = $this->generateReference($user);
        $reservationTransport->setReference($reference);
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



    private function generateReference(User $user): string
    {
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
    public function edit(Request $request, ReservationTransport $reservationTransport, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationTransportType::class, $reservationTransport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_transport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation_transport/edit.html.twig', [
            'reservation_transport' => $reservationTransport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_transport_delete', methods: ['POST'])]
    public function delete(Request $request, ReservationTransport $reservationTransport, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservationTransport->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservationTransport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_transport_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/cardsStation', name: 'app_reservation_transport_station', methods: ['GET'])]
    public function cardStation(Request $request, StationRepository $stationRepository): Response
    {
        $stations = $stationRepository->findAll();

        // Vérifie si la requête est AJAX
        if ($request->isXmlHttpRequest()) {
            return $this->render('reservation_transport/cardsStation.html.twig', [
                'stations' => $stations,
            ]);
        }

        // Retourne la même vue même si ce n'est pas une requête AJAX
        return $this->render('reservation_transport/cardsStation.html.twig', [
            'stations' => $stations,
        ]);
    }

    
}
