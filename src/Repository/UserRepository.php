<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Trouver un utilisateur par son email
     */
    public function findOneByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    /**
     * Récupérer tous les utilisateurs actifs (statut différent de supprimé)
     */
    public function findActiveUsers(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les utilisateurs actuellement en ligne
     */
    public function findCurrentlyOnlineUsers(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->andWhere('u.isOnline = :isOnline')
            ->setParameter('isOnline', true)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les utilisateurs actifs dans le dernier mois
     */
    public function findUsersActiveInLastMonth(): array
    {
        $oneMonthAgo = new \DateTime();
        $oneMonthAgo->modify('-1 month');

        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->andWhere('u.lastActivity >= :timeLimit')
            ->setParameter('timeLimit', $oneMonthAgo)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les utilisateurs actifs aujourd'hui
     */
    public function findUsersActiveToday(): array
    {
        $today = new \DateTime('today');
        
        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->andWhere('u.lastActivity >= :today')
            ->setParameter('today', $today)
            ->getQuery()
            ->getResult();
    }
    
    /**
     * Trouver les utilisateurs actifs ce mois-ci
     */
    public function findUsersActiveThisMonth(): array
    {
        $firstDayOfMonth = new \DateTime('first day of this month midnight');
        
        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->andWhere('u.lastActivity >= :firstDay')
            ->setParameter('firstDay', $firstDayOfMonth)
            ->getQuery()
            ->getResult();
    }
    
    /**
     * Trouver les utilisateurs actifs cette année
     */
    public function findUsersActiveThisYear(): array
    {
        $firstDayOfYear = new \DateTime('first day of January this year midnight');
        
        return $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0')
            ->andWhere('u.lastActivity >= :firstDay')
            ->setParameter('firstDay', $firstDayOfYear)
            ->getQuery()
            ->getResult();
    }

    /**
     * Pagination des utilisateurs avec filtres optionnels
     */
    public function findPaginatedUsers(int $page = 1, int $limit = 10, array $filters = []): array
    {
        $query = $this->createQueryBuilder('u')
            ->where('u.deleteFlag = 0');
        
        // Ajouter les filtres si présents
        if (!empty($filters['role'])) {
            $query->andWhere('u.roleUser = :role')
                ->setParameter('role', $filters['role']);
        }
        
        if (!empty($filters['status'])) {
            $query->andWhere('u.statut = :status')
                ->setParameter('status', $filters['status']);
        }
        
        if (!empty($filters['search'])) {
            $query->andWhere('u.name LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
                ->setParameter('search', '%' . $filters['search'] . '%');
        }
        
        // Calculer l'offset pour la pagination
        $offset = ($page - 1) * $limit;
        
        // Ajouter ordre, limite et offset
        $query->orderBy('u.id_U', 'DESC')
            ->setFirstResult($offset)
            ->setMaxResults($limit);
        
        // Récupérer les résultats
        $results = $query->getQuery()->getResult();
        
        // Compter le nombre total d'enregistrements pour la pagination
        $countQuery = $this->createQueryBuilder('u')
            ->select('COUNT(u.id_U)')
            ->where('u.deleteFlag = 0');
        
        // Appliquer les mêmes filtres au comptage
        if (!empty($filters['role'])) {
            $countQuery->andWhere('u.roleUser = :role')
                ->setParameter('role', $filters['role']);
        }
        
        if (!empty($filters['status'])) {
            $countQuery->andWhere('u.statut = :status')
                ->setParameter('status', $filters['status']);
        }
        
        if (!empty($filters['search'])) {
            $countQuery->andWhere('u.name LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
                ->setParameter('search', '%' . $filters['search'] . '%');
        }
        
        $totalItems = $countQuery->getQuery()->getSingleScalarResult();
        
        return [
            'items' => $results,
            'totalItems' => $totalItems,
            'itemsPerPage' => $limit,
            'totalPages' => ceil($totalItems / $limit),
            'currentPage' => $page
        ];
    }
}
