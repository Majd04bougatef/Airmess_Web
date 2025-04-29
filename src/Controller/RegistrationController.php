<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\EmailService;
use App\Service\VerificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Psr\Log\LoggerInterface;

class RegistrationController extends AbstractController
{
    private $emailService;
    private $verificationService;
    private $logger;

    public function __construct(
        EmailService $emailService,
        VerificationService $verificationService,
        LoggerInterface $logger = null
    ) {
        $this->emailService = $emailService;
        $this->verificationService = $verificationService;
        $this->logger = $logger;
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request, 
        SluggerInterface $slugger,
        SessionInterface $session,
        ValidatorInterface $validator
    ): Response
    {
        if ($request->isMethod('POST')) {
            try {
                $this->log('Registration process started');
                
                // Get the user role
                $userRole = $request->request->get('roleUser');
                $this->log('User role: ' . $userRole);
                
                // Create a new User object and set its properties
                $user = new User();
                $user->setName($request->request->get('name'));
                $user->setEmail($request->request->get('email'));
                $user->setPassword(password_hash($request->request->get('password'), PASSWORD_BCRYPT));
                $user->setRoleUser($userRole);
                $user->setPhoneNumber($request->request->get('phoneNumber'));
                $user->setStatut('actif');
                $user->setDiamond(0);
                $user->setDeleteFlag(0);
                
                // Set additional fields for Voyageurs
                if ($userRole === 'Voyageurs') {
                    $user->setPrenom($request->request->get('prenom'));
                    $dateNaiss = $request->request->get('dateNaiss');
                    if ($dateNaiss) {
                        $user->setDateNaiss(new \DateTime($dateNaiss));
                    }
                }

                // Process photo upload
                $photoFile = $request->files->get('photo');
                if ($photoFile) {
                    $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoFile->guessExtension();
                    
                    try {
                        $photoFile->move(
                            $this->getParameter('user_images_directory'),
                            $newFilename
                        );
                        $user->setImagesU($newFilename);
                    } catch (FileException $e) {
                        // If file upload fails, set default image
                        $user->setImagesU('default-avatar.jpg');
                    }
                } else {
                    $user->setImagesU('default-avatar.jpg');
                }

                // Validate the User object using the constraints
                $errors = $validator->validate($user);
                
                // Add password confirmation validation (not in entity)
                $password = $request->request->get('password');
                $confirmPassword = $request->request->get('password_confirm');
                if ($password !== $confirmPassword) {
                    $this->addFlash('error', 'Les mots de passe ne correspondent pas');
                    return $this->redirectToRoute('app_signup');
                }

                if (count($errors) > 0) {
                    // Afficher les erreurs de validation
                    foreach ($errors as $error) {
                        $this->addFlash('error', $error->getMessage());
                    }
                    return $this->redirectToRoute('app_signup');
                }

                // Store user data in session for verification
                $userData = [
                    'name' => $user->getName(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'password' => $user->getPassword(),
                    'roleUser' => $user->getRoleUser(),
                    'phoneNumber' => $user->getPhoneNumber(),
                    'statut' => $user->getStatut(),
                    'diamond' => $user->getDiamond(),
                    'deleteFlag' => $user->getDeleteFlag(),
                    'imagesU' => $user->getImagesU(),
                ];
                
                if ($user->getDateNaiss()) {
                    $userData['dateNaiss'] = $user->getDateNaiss()->format('Y-m-d');
                }
                
                $session->set('temp_user_data', $userData);
                $this->log('User data stored in session for email: ' . $user->getEmail());
                
                // Generate verification code
                $code = $this->verificationService->generateCode($user->getEmail());
                $this->log('Generated verification code for email: ' . $user->getEmail());
                
                // Send verification code
                $this->log('Attempting to send verification code to: ' . $user->getEmail());
                $emailSent = $this->verificationService->sendVerificationCode($user->getEmail(), $code);
                $this->log('Email sending result: ' . ($emailSent ? 'success' : 'failure'));
                
                if (!$emailSent && $_ENV['APP_ENV'] === 'dev') {
                    // In development, provide a direct link to see the verification code
                    $codeLink = $this->generateUrl('app_show_verification_code', [
                        'email' => $user->getEmail()
                    ]);
                    $this->addFlash('warning', 'Email could not be sent. For testing purposes, you can <a href="' . $codeLink . '">click here</a> to view your verification code.');
                } else if (!$emailSent) {
                    $this->addFlash('error', 'Nous n\'avons pas pu envoyer le code de vérification. Veuillez réessayer.');
                    return $this->redirectToRoute('app_signup');
                }
                
                // Redirect to verification page
                return $this->redirectToRoute('app_verify');
                
            } catch (\Exception $e) {
                $this->log('Exception during registration: ' . $e->getMessage());
                $this->addFlash('error', 'Une erreur est survenue lors de l\'inscription: ' . $e->getMessage());
                return $this->redirectToRoute('app_signup');
            }
        }
        
        // If not a POST request, redirect to signup page
        return $this->redirectToRoute('app_signup');
    }
    
    /**
     * Helper method to log messages
     */
    private function log(string $message): void
    {
        if ($this->logger) {
            $this->logger->info('[Registration] ' . $message);
        } else {
            error_log('[Registration] ' . $message);
        }
    }
}