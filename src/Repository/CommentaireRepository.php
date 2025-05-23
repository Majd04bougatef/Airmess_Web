<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commentaire>
 *
 * @method Commentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commentaire[]    findAll()
 * @method Commentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    public function save(Commentaire $commentaire, bool $flush = false): void
    {
        $this->getEntityManager()->persist($commentaire);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Commentaire $commentaire, bool $flush = false): void
    {
        $this->getEntityManager()->remove($commentaire);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Récupérer les commentaires d'une publication.
     */
    public function findBySocialMedia(int $socialMediaId): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.socialMedia = :socialMediaId')
            ->setParameter('socialMediaId', $socialMediaId)
            ->orderBy('c.idC', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les commentaires approuvés.
     */
    public function findApprovedComments(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.isApproved = true')
            ->orderBy('c.idC', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
