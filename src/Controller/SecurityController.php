<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Security;

class SecurityController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // Last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('Login/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        // This method can be empty - it will be intercepted by the logout key on your firewall
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        $user = $this->security->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('login');
        }
        
        $roles = $user->getRoles();
        
        if (in_array('ROLE_ADMIN', $roles)) {
            return $this->redirectToRoute('app_dash');
        } else if (in_array('Entreprise', $roles)) {
            return $this->redirectToRoute('app_dashEntreprise');
        } else if (in_array('Voyageurs', $roles)) {
            return $this->redirectToRoute('app_dashVoyageurs');
        } else {
            // Default to voyageur dashboard for any other role
            return $this->redirectToRoute('app_dashVoyageurs');
        }
    }
} 