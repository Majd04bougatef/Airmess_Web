<?php

namespace App\EventListener;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class UserActivityListener implements EventSubscriberInterface
{
    private const INACTIVE_TIMEOUT = 900; // 15 minutes in seconds
    
    private $userRepository;
    private $entityManager;
    private $requestStack;
    
    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        RequestStack $requestStack
    ) {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }
    
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 10],
                ['updateUserActivity', 20]
            ]
        ];
    }
    
    public function updateUserActivity(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }
        
        $session = $this->requestStack->getSession();
        
        // Check if user is logged in
        if ($session->has('user_id')) {
            $userId = $session->get('user_id');
            $user = $this->userRepository->find($userId);
            
            if ($user) {
                // Update last activity time and set user as online
                $user->setLastActivity(new \DateTime());
                $user->setIsOnline(true);
                
                $this->entityManager->flush();
            }
        }
    }
    
    public function onKernelRequest(RequestEvent $event): void
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