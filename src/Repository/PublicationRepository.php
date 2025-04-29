<?php

namespace App\Repository;

use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publication::class);
    }

    public function findFuturePublications(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.publicationDate > :now')
            ->andWhere('p.status = :status')
            ->setParameter('now', new \DateTime())
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getResult();
    }

    public function countFuturePublications(): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->where('p.publicationDate > :now')
            ->andWhere('p.status = :status')
            ->setParameter('now', new \DateTime())
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countPublishedPublications(): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->where('p.status = :status')
            ->setParameter('status', 'published')
            ->getQuery()
            ->getSingleScalarResult();
    }
} 