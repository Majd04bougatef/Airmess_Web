<?php

namespace App\Repository;

use App\Entity\ReservationTransport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReservationTransport>
 */
class ReservationTransportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationTransport::class);
    }

    /**
     * Trouver toutes les réservations pour un utilisateur donné
     */
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->setParameter('user', $userId)
            ->orderBy('r.dateRes', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver toutes les réservations d'une station
     */
    public function findByStation(int $stationId): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.station = :station')
            ->setParameter('station', $stationId)
            ->orderBy('r.dateRes', 'DESC')
            ->getQuery()
            ->getResult();
    }

   /**
     * Trouver toutes les réservations de l'utilisateur connecté
     */
    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('r.dateRes', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find reservations for a station within a date range
     */
    public function findByDateRangeAndStation(\DateTime $startDate, \DateTime $endDate, $station): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.station = :station')
            ->andWhere('r.dateRes >= :startDate')
            ->andWhere('r.dateRes <= :endDate')
            ->setParameter('station', $station)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->orderBy('r.dateRes', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find reservations that are finished (end date is in the past) and not marked as 'terminé'
     */
    public function findFinishedReservations(): array
    {
        $now = new \DateTime();
        
        return $this->createQueryBuilder('r')
            ->andWhere('r.dateFin < :now')
            ->andWhere('r.statut != :statut')
            ->setParameter('now', $now)
            ->setParameter('statut', 'terminé')
            ->orderBy('r.dateFin', 'ASC')
            ->getQuery()
            ->getResult();
    }

}