<?php

namespace App\Repository;

use App\Entity\ReviewBonPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReviewBonPlan>
 *
 * @method ReviewBonPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReviewBonPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReviewBonPlan[]    findAll()
 * @method ReviewBonPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewBonPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReviewBonPlan::class);
    }

    public function save(ReviewBonPlan $review, bool $flush = false): void
    {
        $this->getEntityManager()->persist($review);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReviewBonPlan $review, bool $flush = false): void
    {
        $this->getEntityManager()->remove($review);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return ReviewBonPlan[] Returns an array of ReviewBonPlan objects for a given BonPlan
     */
    public function findByBonPlan(int $bonPlanId): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.bonPlan = :bonPlanId')
            ->setParameter('bonPlanId', $bonPlanId)
            ->orderBy('r.idR', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
