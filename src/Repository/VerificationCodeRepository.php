<?php

namespace App\Repository;

use App\Entity\VerificationCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VerificationCode>
 */
class VerificationCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VerificationCode::class);
    }

    public function findActiveByEmail(string $email): ?VerificationCode
    {
        $now = new \DateTimeImmutable();

        return $this->createQueryBuilder('v')
            ->andWhere('v.email = :email')
            ->andWhere('v.expiresAt > :now')
            ->andWhere('v.isVerified = :isVerified')
            ->setParameter('email', $email)
            ->setParameter('now', $now)
            ->setParameter('isVerified', false)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByEmailAndCode(string $email, string $code): ?VerificationCode
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.email = :email')
            ->andWhere('v.code = :code')
            ->setParameter('email', $email)
            ->setParameter('code', $code)
            ->getQuery()
            ->getOneOrNullResult();
    }
} 