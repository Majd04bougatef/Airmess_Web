<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Offre;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\OffreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function new(Request $request, EntityManagerInterface $entityManager, Offre $offre): Response
    {
        $reservation = new Reservation();
        $reservation->setOffre($offre);
        $reservation->setUser($this->getUser()); // Utilisateur connecté

        $form = $this->createForm(\App\Form\ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setDateRes(new \DateTime()); // Date actuelle si nécessaire
            $entityManager->persist($reservation);
            $entityManager->flush();

            // Rediriger vers la phase suivante (par exemple, récapitulatif)
            return $this->redirectToRoute('app_reservation_recap', ['idR' => $reservation->getIdR()]);
        }

        return $this->render('reservation/new.html.twig', [
            'form' => $form->createView(),
            'offre' => $offre,
        ]);
    }

    #[Route('/{idR}', name: 'app_reservation_show', methods: ['GET'])]
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

    #[Route('/{idR}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getIdR(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/recap/{idR}', name: 'app_reservation_recap', methods: ['GET'])]
    public function recap(Reservation $reservation): Response
    {
        return $this->render('reservation/recap.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/payment/{idR}', name: 'app_reservation_payment', methods: ['GET', 'POST'])]
    public function payment(Reservation $reservation): Response
    {
        return $this->render('reservation/payment.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/confirmation/{idR}', name: 'app_reservation_confirmation', methods: ['GET'])]
    public function confirmation(Reservation $reservation): Response
    {
        return $this->render('reservation/confirmation.html.twig', [
            'reservation' => $reservation,
        ]);
    }
}
