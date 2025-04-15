<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\EmailService;
use App\Service\VerificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PasswordResetController extends AbstractController
{
    private $verificationService;
    private $entityManager;
    private $emailService;
    private $userRepository;

    public function __construct(
        VerificationService $verificationService,
        EntityManagerInterface $entityManager,
        EmailService $emailService,
        UserRepository $userRepository
    ) {
        $this->verificationService = $verificationService;
        $this->entityManager = $entityManager;
        $this->emailService = $emailService;
        $this->userRepository = $userRepository;
    }

    #[Route('/password-reset', name: 'app_password_reset_request')]
    public function requestReset(Request $request, SessionInterface $session): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addFlash('error', 'Veuillez fournir une adresse email valide.');
                return $this->redirectToRoute('app_password_reset_request');
            }
            
            // Check if email exists in database
            $user = $this->userRepository->findOneBy(['email' => $email]);
            
            if (!$user) {
                // Don't reveal that the email isn't found (security best practice)
                $this->addFlash('success', 'Si votre adresse email est valide, vous recevrez un code de réinitialisation.');
                return $this->redirectToRoute('login');
            }
            
            // Store the email in session
            $session->set('reset_email', $email);
            
            // Generate verification code
            $code = $this->verificationService->generateCode($email);
            
            // Send verification code
            $emailSent = $this->emailService->sendResetPasswordCode($email, $code);
            
            if (!$emailSent) {
                $this->addFlash('error', 'Nous n\'avons pas pu envoyer le code de réinitialisation. Veuillez réessayer.');
                return $this->redirectToRoute('app_password_reset_request');
            }
            
            // Redirect to code verification page
            return $this->redirectToRoute('app_password_reset_verify');
        }
        
        return $this->render('password_reset/request.html.twig');
    }

    #[Route('/password-reset/verify', name: 'app_password_reset_verify')]
    public function verifyCode(Request $request, SessionInterface $session): Response
    {
        // Retrieve reset email from session
        $email = $session->get('reset_email');
        
        if (!$email) {
            return $this->redirectToRoute('app_password_reset_request');
        }
        
        $error = null;
        $remainingTime = $this->verificationService->getRemainingTime();
        
        if ($request->isMethod('POST')) {
            $code = $request->request->get('verification_code');
            
            if (empty($code)) {
                $error = 'Veuillez entrer le code de vérification.';
            } else {
                $isValid = $this->verificationService->verifyCode($email, $code);
                
                if ($isValid) {
                    // Code is valid, redirect to password reset form
                    $session->set('reset_verified', true);
                    return $this->redirectToRoute('app_password_reset_new');
                } else {
                    $error = 'Code de vérification invalide ou expiré. Veuillez réessayer.';
                }
            }
        }
        
        return $this->render('password_reset/verify.html.twig', [
            'error' => $error,
            'email' => $email,
            'remaining_seconds' => $remainingTime
        ]);
    }

    #[Route('/password-reset/new', name: 'app_password_reset_new')]
    public function newPassword(Request $request, SessionInterface $session): Response
    {
        // Check if the reset is verified
        if (!$session->get('reset_verified')) {
            return $this->redirectToRoute('app_password_reset_request');
        }
        
        // Get the email from session
        $email = $session->get('reset_email');
        if (!$email) {
            return $this->redirectToRoute('app_password_reset_request');
        }
        
        $error = null;
        
        if ($request->isMethod('POST')) {
            $password = $request->request->get('password');
            $confirmPassword = $request->request->get('password_confirm');
            
            // Validate password
            if (empty($password) || strlen($password) < 6) {
                $error = 'Le mot de passe doit contenir au moins 6 caractères.';
            } elseif ($password !== $confirmPassword) {
                $error = 'Les mots de passe ne correspondent pas.';
            } else {
                // Find user by email
                $user = $this->userRepository->findOneBy(['email' => $email]);
                
                if ($user) {
                    // Update password
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $user->setPassword($hashedPassword);
                    
                    $this->entityManager->flush();
                    
                    // Clear session
                    $session->remove('reset_email');
                    $session->remove('reset_verified');
                    
                    // Add success message
                    $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.');
                    
                    // Redirect to login page
                    return $this->redirectToRoute('login');
                } else {
                    $error = 'Une erreur est survenue. Veuillez réessayer.';
                }
            }
        }
        
        return $this->render('password_reset/new_password.html.twig', [
            'error' => $error
        ]);
    }

    #[Route('/password-reset/resend', name: 'app_password_reset_resend')]
    public function resendCode(SessionInterface $session): Response
    {
        // Retrieve reset email from session
        $email = $session->get('reset_email');
        
        if (!$email) {
            return $this->redirectToRoute('app_password_reset_request');
        }
        
        // Generate new code
        $code = $this->verificationService->generateCode($email);
        
        // Send verification code
        $emailSent = $this->emailService->sendResetPasswordCode($email, $code);
        
        if ($emailSent) {
            $this->addFlash('success', 'Un nouveau code de vérification a été envoyé à votre adresse email.');
        } else {
            $this->addFlash('error', 'Nous n\'avons pas pu envoyer le code de vérification. Veuillez réessayer.');
        }
        
        return $this->redirectToRoute('app_password_reset_verify');
    }
} 