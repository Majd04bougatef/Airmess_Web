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

    public function getTotalRevenue(): float
    {
        $result = $this->createQueryBuilder('r')
            ->select('SUM(r.prix) as total')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $result ?? 0;
    }

    public function getOccupancyRate(): float
    {
        $qb = $this->createQueryBuilder('r')
            ->select('COUNT(r) as total, SUM(CASE WHEN r.statut = :active THEN 1 ELSE 0 END) as active')
            ->setParameter('active', 'active');
        
        $result = $qb->getQuery()->getSingleResult();
        
        return $result['total'] > 0 ? ($result['active'] / $result['total']) * 100 : 0;
    }

    public function getMonthlyStats(): array
    {
        return $this->createQueryBuilder('r')
            ->select('SUBSTRING(r.dateRes, 1, 7) as month, COUNT(r) as count')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getTopStations(): array
    {
        return $this->createQueryBuilder('r')
            ->select('s.nom as station_name, COUNT(r) as reservation_count')
            ->join('r.station', 's')
            ->groupBy('s.nom')
            ->orderBy('reservation_count', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

}