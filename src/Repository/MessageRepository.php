<?php

namespace App\Repository;

use App\Entity\Message;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Message>
 *
 * @method Message|null find($id, $lockMode = null, $lockVersion = null)
 * @method Message|null findOneBy(array $criteria, array $orderBy = null)
 * @method Message[]    findAll()
 * @method Message[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function save(Message $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Message $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Trouve tous les messages entre deux utilisateurs
     */
    public function findConversation(User $user1, User $user2, int $limit = 50): array
    {
        return $this->createQueryBuilder('m')
            ->where('(m.sender = :user1 AND m.receiver = :user2) OR (m.sender = :user2 AND m.receiver = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->orderBy('m.dateM', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les derniers messages pour un utilisateur
     */
    public function findLatestMessagesForUser(User $user, int $limit = 20): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.sender = :user OR m.receiver = :user')
            ->setParameter('user', $user)
            ->orderBy('m.dateM', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouve les messages non lus pour un utilisateur
     */
    public function findUnreadMessages(User $user): array
    {
        // Cette méthode suppose qu'un champ 'read' existe pour les messages
        // Si ce n'est pas le cas, vous devrez ajouter ce champ ou adapter cette méthode
        // selon votre logique de lecture des messages
        
        // Exemple fictif:
        /*
        return $this->createQueryBuilder('m')
            ->where('m.receiver = :user')
            ->andWhere('m.read = false')
            ->setParameter('user', $user)
            ->orderBy('m.dateM', 'ASC')
            ->getQuery()
            ->getResult();
        */
        
        // Version actuelle sans champ 'read':
        return $this->createQueryBuilder('m')
            ->where('m.receiver = :user')
            ->setParameter('user', $user)
            ->orderBy('m.dateM', 'DESC')
            ->getQuery()
            ->getResult();
    }

     /**
     * Récupère les messages entre deux utilisateurs
     */
    public function findMessagesForChat(int $userId1, int $userId2)
    {
        return $this->createQueryBuilder('m')
            ->where('(m.sender = :user1 AND m.receiver = :user2) OR (m.sender = :user2 AND m.receiver = :user1)')
            ->setParameter('user1', $userId1)
            ->setParameter('user2', $userId2)
            ->orderBy('m.dateM', 'ASC')
            ->getQuery()
            ->getResult();
    }
}