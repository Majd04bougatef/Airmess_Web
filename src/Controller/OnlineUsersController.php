<?php

namespace App\Controller;

use App\Service\OnlineUsersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class OnlineUsersController extends AbstractController
{
    private $onlineUsersService;

    public function __construct(OnlineUsersService $onlineUsersService)
    {
        $this->onlineUsersService = $onlineUsersService;
    }

    #[Route('/online-users', name: 'app_online_users')]
    public function index(SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }

        // Update the current user's last activity
        $this->onlineUsersService->updateLastActivity($session->get('user_id'));
        
        // Get all online users
        $onlineUsers = $this->onlineUsersService->getOnlineUsers();
        
        return $this->render('online_users/index.html.twig', [
            'online_users' => $onlineUsers,
        ]);
    }
    
    #[Route('/api/online-users', name: 'api_online_users')]
    public function apiOnlineUsers(SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        // Update the current user's last activity
        $this->onlineUsersService->updateLastActivity($session->get('user_id'));
        
        // Get all online users
        $onlineUsers = $this->onlineUsersService->getOnlineUsers();
        
        return $this->json([
            'count' => count($onlineUsers),
            'users' => $onlineUsers
        ]);
    }
} 