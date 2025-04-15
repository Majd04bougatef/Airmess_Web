<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\EmailService;
use App\Service\VerificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class VerificationController extends AbstractController
{
    private $verificationService;
    private $entityManager;
    private $emailService;

    public function __construct(
        VerificationService $verificationService,
        EntityManagerInterface $entityManager,
        EmailService $emailService
    ) {
        $this->verificationService = $verificationService;
        $this->entityManager = $entityManager;
        $this->emailService = $emailService;
    }

    #[Route('/verify', name: 'app_verify')]
    public function verify(Request $request, SessionInterface $session): Response
    {
        // Retrieve temp user data from session
        $userData = $session->get('temp_user_data');
        
        if (!$userData) {
            // Silently redirect to signup without error message
            return $this->redirectToRoute('app_signup');
        }

        $error = null;
        $remainingTime = $this->verificationService->getRemainingTime();
        
        if ($request->isMethod('POST')) {
            $code = $request->request->get('verification_code');
            $email = $userData['email'];
            
            if (empty($code)) {
                $error = 'Veuillez entrer le code de vérification.';
            } else {
                $isValid = $this->verificationService->verifyCode($email, $code);
                
                if ($isValid) {
                    // Create user
                    $user = $this->createUserFromSession($userData);
                    
                    // Send welcome email
                    $this->emailService->sendWelcomeEmail($user);
                    
                    // Remove temp data
                    $session->remove('temp_user_data');
                    
                    // Add success message for login page
                    $this->addFlash('success', 'Bienvenue sur Airmess! Votre compte a été créé avec succès.');
                    
                    // Redirect directly to login
                    return $this->redirectToRoute('login');
                } else {
                    $error = 'Code de vérification invalide ou expiré. Veuillez réessayer.';
                }
            }
        }
        
        return $this->render('verification/verify.html.twig', [
            'error' => $error,
            'email' => $userData['email'] ?? null,
            'remaining_seconds' => $remainingTime
        ]);
    }

    #[Route('/resend-code', name: 'app_resend_code')]
    public function resendCode(SessionInterface $session): Response
    {
        // Retrieve temp user data from session
        $userData = $session->get('temp_user_data');
        
        if (!$userData) {
            // Silently redirect to signup without error message
            return $this->redirectToRoute('app_signup');
        }
        
        $email = $userData['email'];
        
        // Generate new code
        $code = $this->verificationService->generateCode($email);
        
        // Send verification code
        $emailSent = $this->verificationService->sendVerificationCode($email, $code);
        
        if ($emailSent) {
            $this->addFlash('success', 'Un nouveau code de vérification a été envoyé à votre adresse email.');
        } else {
            $this->addFlash('error', 'Nous n\'avons pas pu envoyer le code de vérification. Veuillez réessayer.');
        }
        
        return $this->redirectToRoute('app_verify');
    }

    private function createUserFromSession(array $userData): User
    {
        $user = new User();
        $user->setName($userData['name']);
        
        if (isset($userData['prenom'])) {
            $user->setPrenom($userData['prenom']);
        }
        
        $user->setEmail($userData['email']);
        $user->setPassword($userData['password']);
        $user->setRoleUser($userData['roleUser']);
        $user->setPhoneNumber($userData['phoneNumber']);
        $user->setStatut($userData['statut'] ?? 'active');
        $user->setDiamond($userData['diamond'] ?? 0);
        $user->setDeleteFlag($userData['deleteFlag'] ?? 0);
        
        if (isset($userData['dateNaiss'])) {
            $user->setDateNaiss(new \DateTime($userData['dateNaiss']));
        } else {
            $user->setDateNaiss(new \DateTime());
        }
        
        // Handle photo if one was uploaded
        if (isset($userData['imagesU'])) {
            $user->setImagesU($userData['imagesU']);
        } else {
            $user->setImagesU('default-avatar.jpg');
        }
        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        
        return $user;
    }
} 