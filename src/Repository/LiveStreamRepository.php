<?php

namespace App\Repository;

use App\Entity\LiveStream;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LiveStream>
 */
class LiveStreamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LiveStream::class);
    }

    /**
     * Trouve tous les streams actifs
     */
    public function findActiveStreams()
    {
        return $this->createQueryBuilder('l')
            ->where('l.isActive = :active')
            ->setParameter('active', true)
            ->orderBy('l.startedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les streams actifs d'un utilisateur
     */
    public function findActiveStreamsByUser($userId)
    {
        return $this->createQueryBuilder('l')
            ->where('l.isActive = :active')
            ->andWhere('l.user = :userId')
            ->setParameter('active', true)
            ->setParameter('userId', $userId)
            ->orderBy('l.startedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve un stream actif par son ID
     */
    public function findActiveStreamById($streamId)
    {
        return $this->createQueryBuilder('l')
            ->where('l.id = :streamId')
            ->andWhere('l.isActive = :active')
            ->setParameter('streamId', $streamId)
            ->setParameter('active', true)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Met à jour le nombre de spectateurs d'un stream
     */
    public function updateViewerCount($streamId, $count)
    {
        return $this->createQueryBuilder('l')
            ->update()
            ->set('l.viewerCount', ':count')
            ->where('l.id = :streamId')
            ->setParameter('count', $count)
            ->setParameter('streamId', $streamId)
            ->getQuery()
            ->execute();
    }
} 