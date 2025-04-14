<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class AuthService
{
    private $requestStack;
    private $userRepository;
    
    public function __construct(RequestStack $requestStack, UserRepository $userRepository)
    {
        $this->requestStack = $requestStack;
        $this->userRepository = $userRepository;
    }
    
    /**
     * Check if a user is currently authenticated
     */
    public function isAuthenticated(): bool
    {
        $session = $this->requestStack->getSession();
        return $session->has('user_id');
    }
    
    /**
     * Get the currently authenticated user
     */
    public function getUser(): ?User
    {
        $session = $this->requestStack->getSession();
        if (!$session->has('user_id')) {
            return null;
        }
        
        $userId = $session->get('user_id');
        return $this->userRepository->find($userId);
    }
    
    /**
     * Get the user's role
     */
    public function getUserRole(): ?string
    {
        $session = $this->requestStack->getSession();
        if (!$session->has('user_role')) {
            return null;
        }
        
        return $session->get('user_role');
    }
} 