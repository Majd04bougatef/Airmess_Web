<?php

namespace App\Repository;

use App\Entity\SocialMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocialMedia>
 *
 * @method SocialMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialMedia[]    findAll()
 * @method SocialMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialMedia::class);
    }

    public function save(SocialMedia $socialMedia, bool $flush = false): void
    {
        $this->getEntityManager()->persist($socialMedia);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SocialMedia $socialMedia, bool $flush = false): void
    {
        $this->getEntityManager()->remove($socialMedia);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Trouver les publications les plus aimées.
     */
    public function findMostLiked(int $limit = 10): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.likee', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les publications par utilisateur.
     */
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.user = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }
}
