<?php

namespace App\EventListener;

use App\Entity\Expense;
use App\Entity\Reservation;
use App\Entity\ReservationTransport;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Events;

#[AsDoctrineListener(event: Events::postPersist)]
class ReservationExpenseListener
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function postPersist(PostPersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof Reservation) {
            $this->createExpenseForReservation($entity);
        } elseif ($entity instanceof ReservationTransport) {
            $this->createExpenseForTransportReservation($entity);
        }
    }

    private function createExpenseForReservation(Reservation $reservation): void
    {
        $user = $reservation->getUser();
        if (!$user) {
            return; // Skip if no user is associated
        }

        $offre = $reservation->getOffre();
        if (!$offre) {
            return; // Skip if no offer is associated
        }

        $expense = new Expense();
        $expense->setUser($user);
        $expense->setAmount($offre->getPriceAfter());
        $expense->setDescription("Réservation d'offre: " . $offre->getDescription());
        $expense->setCategory('Transport');
        $expense->setDateE(new \DateTime());
        $expense->setNameEx('Réservation #' . $reservation->getIdR());
        $expense->setImagedepense('default-receipt.jpg');

        $this->entityManager->persist($expense);
        $this->entityManager->flush();
    }

    private function createExpenseForTransportReservation(ReservationTransport $reservation): void
    {
        $user = $reservation->getUser();
        if (!$user) {
            return; // Skip if no user is associated
        }

        $station = $reservation->getStation();
        if (!$station) {
            return; // Skip if no station is associated
        }

        // Calculate duration in hours
        $startDate = $reservation->getDateRes();
        $endDate = $reservation->getDateFin();
        $duration = ($endDate->getTimestamp() - $startDate->getTimestamp()) / 3600; // Hours
        
        // Calculate total price
        $pricePerHour = $station->getPrixHeure();
        $totalPrice = $pricePerHour * $duration * $reservation->getNombreVelo();
        
        $expense = new Expense();
        $expense->setUser($user);
        $expense->setAmount($totalPrice);
        $expense->setDescription("Location de vélo(s) à " . $station->getNom() . 
                                " du " . $startDate->format('d/m/Y H:i') . 
                                " au " . $endDate->format('d/m/Y H:i'));
        $expense->setCategory('Transport');
        $expense->setDateE(new \DateTime());
        $expense->setNameEx('Location #' . $reservation->getReference());
        $expense->setImagedepense('default-receipt.jpg');

        $this->entityManager->persist($expense);
        $this->entityManager->flush();
    }
} 