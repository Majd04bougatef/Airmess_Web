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


}
