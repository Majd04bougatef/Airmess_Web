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
}
