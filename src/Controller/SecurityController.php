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
        // Check if user is already logged in and 'force_login' is not set
        if ($session->has('user_id') && !$request->query->has('force_login')) {
            $userRole = $session->get('user_role');
            
            // Redirect to appropriate dashboard
            if ($userRole === 'Admin' || $userRole === 'ROLE_ADMIN') {
                return $this->redirectToRoute('app_dash');
            } elseif ($userRole === 'Entreprise') {
                return $this->redirectToRoute('app_dashEntreprise');
            } else {
                return $this->redirectToRoute('app_dashVoyageurs');
            }
        }
        
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            
            // Find user by email
            $user = $userRepository->findOneBy(['email' => $email]);
            
            if ($user) {
                // Verify password
                if (password_verify($password, $user->getPassword())) {
                    // Successful login - Store user data in session
                    $session->set('user_id', $user->getIdU());
                    $session->set('user_role', $user->getRoleUser());
                    $session->set('user_name', $user->getName() . ($user->getPrenom() ? ' ' . $user->getPrenom() : ''));
                    $session->set('user_image', $user->getImagesU());
                    
                    $session->set('user_post_actions', []);
                    $session->set('user_comment_actions', []);
                    
                    // Force session write
                    $session->save();
                    
                    // Get role for redirect
                    $userRole = $user->getRoleUser();
                    
                    // Redirect based on user role
                    if ($userRole === 'Admin' || $userRole === 'ROLE_ADMIN') {
                        return $this->redirectToRoute('app_dash');
                    } elseif ($userRole === 'Entreprise') {
                        return $this->redirectToRoute('app_dashEntreprise');
                    } else {
                        // Default to voyageur dashboard
                        return $this->redirectToRoute('app_dashVoyageurs');
                    }
                } else {
                    // Wrong password
                    $this->addFlash('error', 'Le mot de passe est incorrect');
                    return $this->render('login/login.html.twig', [
                        'last_username' => $email,
                        'error' => 'Le mot de passe est incorrect'
                    ]);
                }
            } else {
                // User not found
                $this->addFlash('error', 'Aucun compte ne correspond à cet email');
                return $this->render('login/login.html.twig', [
                    'last_username' => $email,
                    'error' => 'Aucun compte ne correspond à cet email'
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
        $session->invalidate();
        
        // Redirect to login page
        return $this->redirectToRoute('login');
    }
} 