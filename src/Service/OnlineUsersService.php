<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;

class OnlineUsersService
{
    private const LAST_ACTIVITY_KEY = 'last_activity_timestamp';
    private const ONLINE_TIMEOUT = 300; // 5 minutes in seconds

    private $requestStack;
    private $userRepository;
    private $entityManager;

    public function __construct(
        RequestStack $requestStack,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->requestStack = $requestStack;
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * Update the current user's last activity timestamp
     */
    public function updateLastActivity(int $userId = null): void
    {
        $session = $this->requestStack->getSession();
        $session->set(self::LAST_ACTIVITY_KEY, time());
        
        if ($userId) {
            $session->set('online_user_id', $userId);
            
            // Also update the database record
            $user = $this->userRepository->find($userId);
            if ($user) {
                $user->setIsOnline(true);
                $user->setLastActivity(new \DateTime());
                $this->entityManager->flush();
            }
        }
    }

    /**
     * Get all online users (active in the last 5 minutes)
     * 
     * @return array List of online users with usernames and timestamps
     */
    public function getOnlineUsers(): array
    {
        $onlineUsers = [];
        $currentTime = time();
        
        // Get all active sessions
        $sessionDir = sys_get_temp_dir();
        $pattern = $sessionDir . '/sess_*';
        
        foreach (glob($pattern) as $sessionFile) {
            $content = file_get_contents($sessionFile);
            
            // Extract userId and last activity from session data
            $userId = $this->extractSessionValue($content, 'online_user_id');
            $lastActivity = $this->extractSessionValue($content, self::LAST_ACTIVITY_KEY);
            
            if ($userId && $lastActivity && ($currentTime - $lastActivity) < self::ONLINE_TIMEOUT) {
                $user = $this->userRepository->find($userId);
                if ($user) {
                    $onlineUsers[] = [
                        'id' => $user->getIdU(),
                        'name' => $user->getName(),
                        'role' => $user->getRoleUser(),
                        'image' => $user->getImagesU(),
                        'last_active' => $lastActivity
                    ];
                }
            }
        }
        
        return $onlineUsers;
    }
    
    /**
     * Extract a value from a PHP session content string
     */
    private function extractSessionValue(string $sessionContent, string $key): mixed
    {
        // Simple parsing for session data (basic implementation)
        $pattern = '/' . preg_quote($key) . '\|[^;]+;([^:]+):(\d+)/';
        if (preg_match($pattern, $sessionContent, $matches)) {
            return $matches[2] ?? null;
        }
        
        return null;
    }
} 