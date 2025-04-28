<?php

namespace App\EventListener;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserInactivityListener implements EventSubscriberInterface
{
    private const INACTIVITY_TIMEOUT = 900; // 15 minutes in seconds
    private const CHECK_PROBABILITY = 0.1; // 10% chance to run on each request
    
    private $userRepository;
    private $entityManager;
    
    public function __construct(
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 10]
            ]
        ];
    }
    
    /**
     * Check for inactive users and update their status
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        // Only process main requests (not sub-requests)
        if (!$event->isMainRequest()) {
            return;
        }

        // Randomly determine if we should check inactive users
        // This prevents checking on every request which would be inefficient
        if (mt_rand(1, 100) / 100 > self::CHECK_PROBABILITY) {
            return;
        }

        // Get all users that are currently marked as online
        $onlineUsers = $this->userRepository->findBy(['isOnline' => true]);
        
        // Current time minus the inactivity threshold
        $inactivityThreshold = new \DateTime();
        $inactivityThreshold->modify('-' . self::INACTIVITY_TIMEOUT . ' seconds');
        
        $updated = false;

        // Check each online user for inactivity
        foreach ($onlineUsers as $user) {
            $lastActivity = $user->getLastActivity();
            
            // If the user has no last activity record or their last activity is older than the threshold
            if (!$lastActivity || $lastActivity < $inactivityThreshold) {
                $user->setIsOnline(false);
                $updated = true;
            }
        }

        // Only flush if we've made changes
        if ($updated) {
            $this->entityManager->flush();
        }
    }
} 