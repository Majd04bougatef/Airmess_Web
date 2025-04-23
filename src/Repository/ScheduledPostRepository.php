<?php

namespace App\Repository;

use App\Entity\ScheduledPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ScheduledPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScheduledPost::class);
    }

    public function findPostsToPublish(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.scheduledDate <= :now')
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->getResult();
    }

    public function findUpcomingPosts(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.scheduledDate > :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('s.scheduledDate', 'ASC')
            ->getQuery()
            ->getResult();
    }
} 