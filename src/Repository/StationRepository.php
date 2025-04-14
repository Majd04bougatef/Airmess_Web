<?php

namespace App\Repository;

use App\Entity\Station;
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

}