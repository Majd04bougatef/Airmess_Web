<?php

namespace App\EventListener;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class UserInactivityListener implements EventSubscriberInterface
{
    private const INACTIVE_TIMEOUT = 900; // 15 minutes in seconds
    
    private $userRepository;
    private $entityManager;
    
    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }
    
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['checkInactiveUsers', 10]
            ]
        ];
    }
    
    public function checkInactiveUsers(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }
        
        // Update inactive users every few requests (to avoid doing this on every request)
        if (mt_rand(1, 10) !== 1) {
            return;
        }
        
        // Find users who are marked as online but haven't been active recently
        $timeoutThreshold = new \DateTime();
        $timeoutThreshold->modify('-' . self::INACTIVE_TIMEOUT . ' seconds');
        
        $onlineInactiveUsers = $this->userRepository->createQueryBuilder('u')
            ->where('u.isOnline = :isOnline')
            ->andWhere('u.lastActivity < :threshold OR u.lastActivity IS NULL')
            ->setParameter('isOnline', true)
            ->setParameter('threshold', $timeoutThreshold)
            ->getQuery()
            ->getResult();
        
        // Mark these users as offline
        if (!empty($onlineInactiveUsers)) {
            foreach ($onlineInactiveUsers as $user) {
                $user->setIsOnline(false);
            }
            
            // Save changes
            $this->entityManager->flush();
        }
    }
} 