<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(Request $request, UserRepository $userRepository, SessionInterface $session): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            
            // Find user by email
            $user = $userRepository->findOneBy(['email' => $email]);
            
            if ($user && password_verify($password, $user->getPassword())) {
                // Successful login
                $session->set('user_id', $user->getIdU());
                $session->set('user_role', $user->getRoleUser());
                
                // Redirect based on user role
                if ($user->getRoleUser() === 'Admin') {
                    return $this->redirectToRoute('app_dash');
                } elseif ($user->getRoleUser() === 'Entreprise') {
                    return $this->redirectToRoute('app_dashEntreprise');
                } else {
                    // Default to voyageur dashboard
                    return $this->redirectToRoute('app_dashVoyageurs');
                }
            } else {
                // Failed login - but don't show error message as requested
                return $this->render('login/login.html.twig', [
                    'last_username' => $email
                ]);
            }
        }
        
        // Display login form for GET requests
        return $this->render('login/login.html.twig');
    }
    
    #[Route('/logout', name: 'app_logout')]
    public function logout(SessionInterface $session): Response
    {
        // Clear the session
        $session->clear();
        
        // Redirect to login page
        return $this->redirectToRoute('login');
    }
} 