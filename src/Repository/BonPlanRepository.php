<?php

namespace App\Repository;

use App\Entity\BonPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BonPlan>
 *
 * @method BonPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method BonPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method BonPlan[]    findAll()
 * @method BonPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonPlan::class);
    }

    public function save(BonPlan $bonPlan, bool $flush = false): void
    {
        $this->getEntityManager()->persist($bonPlan);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BonPlan $bonPlan, bool $flush = false): void
    {
        $this->getEntityManager()->remove($bonPlan);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return BonPlan[] Returns an array of BonPlan objects filtered by type
     */
    public function findByType(string $type): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.typePlace = :type')
            ->setParameter('type', $type)
            ->orderBy('b.idP', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche des bon plans en fonction d'un terme de recherche
     * 
     * @param string $searchTerm Le terme de recherche
     * @return BonPlan[] Les bon plans correspondant au terme de recherche
     */
    public function searchBonPlans(string $searchTerm): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.nomplace LIKE :search OR b.description LIKE :search OR b.localisation LIKE :search OR b.typePlace LIKE :search')
            ->setParameter('search', '%' . $searchTerm . '%')
            ->orderBy('b.idP', 'DESC')
            ->getQuery()
            ->getResult();
    }
    
    /**
     * Obtenir le nombre de bon plans par type
     * 
     * @return array Les statistiques par type de bon plan
     */
    public function getStatsByType(): array
    {
        $qb = $this->createQueryBuilder('b')
            ->select('b.typePlace, COUNT(b.idP) as count')
            ->groupBy('b.typePlace')
            ->orderBy('count', 'DESC');
            
        $results = $qb->getQuery()->getResult();
        
        // Formater les résultats
        $stats = [];
        foreach ($results as $result) {
            $type = $result['typePlace'] ?: 'Non défini';
            $stats[$type] = $result['count'];
        }
        
        return $stats;
    }
    
    /**
     * Obtenir des statistiques générales sur les bon plans
     * 
     * @return array Les statistiques générales
     */
    public function getGeneralStats(): array
    {
        // Nombre total de bon plans
        $totalCount = $this->createQueryBuilder('b')
            ->select('COUNT(b.idP)')
            ->getQuery()
            ->getSingleScalarResult();
            
        // Bon plans sans image
        $noImageCount = $this->createQueryBuilder('b')
            ->select('COUNT(b.idP)')
            ->where('b.imageBP IS NULL OR b.imageBP = :empty')
            ->setParameter('empty', '')
            ->getQuery()
            ->getSingleScalarResult();
            
        // Bon plans sans description
        $noDescriptionCount = $this->createQueryBuilder('b')
            ->select('COUNT(b.idP)')
            ->where('b.description IS NULL OR b.description = :empty')
            ->setParameter('empty', '')
            ->getQuery()
            ->getSingleScalarResult();
            
        return [
            'total' => $totalCount,
            'withoutImage' => $noImageCount,
            'withoutDescription' => $noDescriptionCount,
            'completePercentage' => $totalCount > 0 
                ? round(($totalCount - max($noImageCount, $noDescriptionCount)) / $totalCount * 100) 
                : 0
        ];
    }

    public function findByLocationAndPreferences(string $location): array
    {
        $qb = $this->createQueryBuilder('b')
            ->where('LOWER(b.localisation) LIKE LOWER(:location)')
            ->setParameter('location', '%' . strtolower($location) . '%');

        // Optimiser la recherche par localisation
        $qb->orWhere('LOWER(b.nomplace) LIKE LOWER(:location_name)')
           ->setParameter('location_name', '%' . strtolower($location) . '%');

        // Ajouter des critères de tri pertinents
        $qb->orderBy('b.dateCreation', 'DESC')
           ->addOrderBy('b.note', 'DESC');

        // Limiter les résultats pour de meilleures performances
        $qb->setMaxResults(50);

        return $qb->getQuery()->getResult();
    }
}
