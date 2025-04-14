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
     * Check if a user is authenticated
     */
    public function isAuthenticated(): bool
    {
        $session = $this->requestStack->getSession();
        return $session->has('user_id') && $session->get('user_id') !== null;
    }
    
    /**
     * Get the authenticated user
     */
    public function getUser()
    {
        $session = $this->requestStack->getSession();
        
        if (!$this->isAuthenticated()) {
            return null;
        }
        
        $userId = $session->get('user_id');
        return $this->userRepository->find($userId);
    }
    
    /**
     * Get user role from session
     */
    public function getUserRole(): ?string
    {
        $session = $this->requestStack->getSession();
        
        if (!$this->isAuthenticated()) {
            return null;
        }
        
        return $session->get('user_role');
    }
} 