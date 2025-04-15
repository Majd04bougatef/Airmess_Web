<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Client\Provider\GoogleClient;
use League\OAuth2\Client\Provider\GoogleUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GoogleController extends AbstractController
{
    private $clientRegistry;
    private $entityManager;
    private $userRepository;

    public function __construct(
        ClientRegistry $clientRegistry,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ) {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * Link to this controller to start the "connect" process
     */
    #[Route('/connect/google', name: 'connect_google')]
    public function connectAction(): RedirectResponse
    {
        // Redirect to Google OAuth
        return $this->clientRegistry
            ->getClient('google')
            ->redirect([
                'profile', 
                'email'
            ], []);
    }

    /**
     * Google redirects to this route after OAuth authentication
     */
    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheckAction(Request $request): Response
    {
        // Get the Google OAuth client and fetch the user data
        /** @var GoogleClient $client */
        $client = $this->clientRegistry->getClient('google');
        
        try {
            /** @var GoogleUser $googleUser */
            $googleUser = $client->fetchUser();
            
            // Get data from Google
            $email = $googleUser->getEmail();
            $name = $googleUser->getName();
            
            // Check if user exists by email
            $existingUser = $this->userRepository->findOneBy(['email' => $email]);
            
            if ($existingUser) {
                // User exists - log them in
                $request->getSession()->set('user_id', $existingUser->getIdU());
                $request->getSession()->set('user_role', $existingUser->getRoleUser());
                
                $this->addFlash('success', 'Bienvenue ' . $existingUser->getName() . '! Vous êtes connecté avec Google.');
                
                // Redirect based on role
                if ($existingUser->getRoleUser() === 'Admin') {
                    return $this->redirectToRoute('app_dash');
                } elseif ($existingUser->getRoleUser() === 'Voyageurs') {
                    return $this->redirectToRoute('app_dashVoyageurs');
                } else {
                    return $this->redirectToRoute('app_dashEntreprise');
                }
            } else {
                // Create new user account
                $newUser = new User();
                $newUser->setEmail($email);
                
                // Parse name - try to extract first and last name if possible
                $nameParts = explode(' ', $name);
                if (count($nameParts) > 1) {
                    $lastName = array_pop($nameParts);
                    $firstName = implode(' ', $nameParts);
                    
                    $newUser->setName($lastName);
                    $newUser->setPrenom($firstName);
                } else {
                    $newUser->setName($name);
                }
                
                // Set default values for required fields
                $newUser->setRoleUser('Voyageurs'); // Default role
                $newUser->setPassword('google_oauth_no_password'); // Placeholder password
                $newUser->setPhoneNumber('00000000'); // Placeholder phone
                $newUser->setStatut('active');
                $newUser->setDiamond(0);
                $newUser->setDeleteFlag(0);
                $newUser->setDateNaiss(new \DateTime());
                $newUser->setImagesU('default-avatar.jpg');
                
                // Save the user
                $this->entityManager->persist($newUser);
                $this->entityManager->flush();
                
                // Log them in
                $request->getSession()->set('user_id', $newUser->getIdU());
                $request->getSession()->set('user_role', $newUser->getRoleUser());
                
                $this->addFlash('success', 'Bienvenue ' . $newUser->getName() . '! Votre compte a été créé avec Google.');
                
                // Redirect to voyageur home since that's the default role
                return $this->redirectToRoute('app_dashVoyageurs');
            }
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Une erreur est survenue lors de la connexion avec Google: ' . $e->getMessage());
            return $this->redirectToRoute('login');
        }
    }

    /**
     * Special route for testing Google login
     */
    #[Route('/connect/google/test', name: 'connect_google_test')]
    public function testGoogleLogin(Request $request): RedirectResponse
    {
        // Clear any existing session
        $request->getSession()->invalidate();
        
        // Redirect to Google OAuth
        return $this->redirectToRoute('connect_google');
    }
} 