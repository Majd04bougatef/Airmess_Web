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

    
    public function findMostLiked(int $limit = 10): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.likee', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findRandom(int $limit = 4): array
    {
        // First try to get more than needed to allow for randomness
        $qb = $this->createQueryBuilder('s')
            ->orderBy('s.publicationDate', 'DESC')
            ->setMaxResults($limit * 2);
            
        $result = $qb->getQuery()->getResult();
        
        // If we have more than we need, shuffle and take only what we need
        if (count($result) > $limit) {
            shuffle($result);
            return array_slice($result, 0, $limit);
        }
        
        // Otherwise just return what we have
        return $result;
    }

   
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.user = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    
    public function findByLieu(string $lieu): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.lieu LIKE :lieu')
            ->setParameter('lieu', '%'.$lieu.'%')
            ->orderBy('s.publicationDate', 'DESC')
            ->getQuery()
            ->getResult();
    }

    
    public function createFilteredQueryBuilder(?string $lieu = null)
    {
        $qb = $this->createQueryBuilder('s')
            ->orderBy('s.publicationDate', 'DESC');

        if ($lieu) {
            $qb->andWhere('s.lieu LIKE :lieu')
               ->setParameter('lieu', '%'.$lieu.'%');
        }

        return $qb;
    }

    public function findFuturePublications(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.publicationDate > :now')
            ->andWhere('s.status = :status')
            ->setParameter('now', new \DateTime())
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getResult();
    }

    public function countFuturePublications(): int
    {
        return $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.publicationDate > :now')
            ->andWhere('s.status = :status')
            ->setParameter('now', new \DateTime())
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countPublishedPublications(): int
    {
        return $this->createQueryBuilder('s')
            ->select('COUNT(s.id)')
            ->where('s.status = :status')
            ->setParameter('status', 'published')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
