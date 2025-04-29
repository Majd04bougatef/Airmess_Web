<?php

namespace App\Repository;

use App\Entity\Station;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Station>
 *
 * @method Station|null find($id, $lockMode = null, $lockVersion = null)
 * @method Station|null findOneBy(array $criteria, array $orderBy = null)
 * @method Station[]    findAll()
 * @method Station[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Station::class);
    }

    public function save(Station $station, bool $flush = false): void
    {
        $this->getEntityManager()->persist($station);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Station $station, bool $flush = false): void
    {
        $this->getEntityManager()->remove($station);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Décrémente le nombre de vélos disponibles pour une station donnée
     */
    public function decrementNbVelosDispo(int $stationId, int $nbVelos): void
    {
        $em = $this->getEntityManager();
        
        $station = $this->find($stationId);

        if (!$station) {
            throw new \InvalidArgumentException("Station avec ID $stationId non trouvée.");
        }

        $currentNbVelos = $station->getNombreVelo();
        $newNbVelos = max(0, $currentNbVelos - $nbVelos); // Pour éviter les valeurs négatives

        $station->setNombreVelo($newNbVelos);

        $em->persist($station);
        $em->flush();
    }

    /**
     * Incrémente le nombre de vélos disponibles pour une station donnée
     */
    public function incrementNbVelosDispo(int $stationId, int $nbVelos): void
    {
        $em = $this->getEntityManager();
        
        $station = $this->find($stationId);

        if (!$station) {
            throw new \InvalidArgumentException("Station avec ID $stationId non trouvée.");
        }

        $currentNbVelos = $station->getNombreVelo();

        $station->setNombreVelo($currentNbVelos+$nbVelos);

        $em->persist($station);
        $em->flush();
    }

    /**
     * Find all active stations
     * @return Station[] Returns an array of active Station objects
     */
    public function findActiveStations(): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.statut = :statut')
            ->setParameter('statut', 'active')
            ->orderBy('s.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find active stations for a specific user
     * @return Station[] Returns an array of active Station objects for the given user
     */
    public function findActiveStationsByUser(int $userId): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.user = :userId')
            ->andWhere('s.statut = :statut')
            ->setParameter('userId', $userId)
            ->setParameter('statut', 'active')
            ->orderBy('s.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findStationsActives(): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.statut = :statut')
            ->setParameter('statut', 'active')
            ->getQuery()
            ->getResult();
    }

    public function findStationsEnAttente(): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.statut = :statut')
            ->setParameter('statut', 'inactive')
            ->getQuery()
            ->getResult();
    }

    public function approuverStation(int $stationId): void
    {
        $this->createQueryBuilder('s')
            ->update()
            ->set('s.statut', ':statut')
            ->where('s.id = :id')
            ->setParameter('statut', 'active')
            ->setParameter('id', $stationId)
            ->getQuery()
            ->execute();
    }

    public function getTotalBikes(): int
    {
        $result = $this->createQueryBuilder('s')
            ->select('SUM(s.capacite) as total')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $result ?? 0;
    }

    public function getAvailableBikes(): int
    {
        $result = $this->createQueryBuilder('s')
            ->select('SUM(s.nombreVelo) as total')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $result ?? 0;
    }

    public function findLowAvailabilityStations(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.nombreVelo <= s.capacite * 0.2')
            ->andWhere('s.statut = :active')
            ->setParameter('active', 'active')
            ->orderBy('s.nombreVelo', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findMostPopularStations(): array
    {
        return $this->createQueryBuilder('s')
            ->select('s.nom, COUNT(r) as reservationCount, s.capacite, s.nombreVelo')
            ->leftJoin('App\Entity\ReservationTransport', 'r', 'WITH', 'r.station = s')
            ->groupBy('s.nom, s.capacite, s.nombreVelo')
            ->orderBy('reservationCount', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }
}