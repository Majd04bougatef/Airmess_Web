<?php

namespace App\Controller;

use App\Service\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class AuthenticatedController extends AbstractController
{
    protected $authService;
    
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    
    /**
     * Check if user is authenticated, redirect to login if not
     */
    protected function checkAuthentication(): ?Response
    {
        if (!$this->authService->isAuthenticated()) {
            return $this->redirectToRoute('login');
        }
        
        return null;
    }
    
    /**
     * Get the current user
     */
    protected function getCurrentUser()
    {
        return $this->authService->getUser();
    }
    
    /**
     * Check if user has a specific role
     */
    protected function hasRole(string $role): bool
    {
        $userRole = $this->authService->getUserRole();
        return $userRole === $role;
    }
} 