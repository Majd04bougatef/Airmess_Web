<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiagnosticController extends AbstractController
{
    #[Route('/diagnostic/users', name: 'app_diagnostic_users')]
    public function listUsers(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        
        return $this->render('diagnostic/users.html.twig', [
            'users' => $users,
        ]);
    }
} 