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

class RegistrationController extends AbstractController
{
    private $emailService;
    private $verificationService;

    public function __construct(
        EmailService $emailService,
        VerificationService $verificationService
    ) {
        $this->emailService = $emailService;
        $this->verificationService = $verificationService;
    }

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request, 
        SluggerInterface $slugger,
        SessionInterface $session
    ): Response
    {
        if ($request->isMethod('POST')) {
            try {
                // Validate form data
                $errors = $this->validateFormData($request);
                
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        $this->addFlash('error', $error);
                    }
                    return $this->redirectToRoute('app_signup');
                }
                
                // Process and store form data in session
                $userData = $this->processFormData($request, $slugger);
                $session->set('temp_user_data', $userData);
                
                // Generate verification code
                $code = $this->verificationService->generateCode($userData['email']);
                
                // Send verification code
                $emailSent = $this->verificationService->sendVerificationCode($userData['email'], $code);
                
                if (!$emailSent) {
                    $this->addFlash('error', 'Nous n\'avons pas pu envoyer le code de vérification. Veuillez réessayer.');
                    return $this->redirectToRoute('app_signup');
                }
                
                // Redirect to verification page
                return $this->redirectToRoute('app_verify');
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'inscription: ' . $e->getMessage());
                return $this->redirectToRoute('app_signup');
            }
        }
        
        // If not a POST request, redirect to signup page
        return $this->redirectToRoute('app_signup');
    }

    private function validateFormData(Request $request): array
    {
        $errors = [];
        
        // Name validation
        $name = $request->request->get('name');
        if (empty($name) || strlen($name) < 2) {
            $errors[] = 'Le nom doit contenir au moins 2 caractères.';
        }
        
        // Email validation
        $email = $request->request->get('email');
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Veuillez fournir une adresse email valide.';
        }
        
        // Password validation
        $password = $request->request->get('password');
        $confirmPassword = $request->request->get('password_confirm');
        
        if (empty($password) || strlen($password) < 6) {
            $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
        } elseif ($password !== $confirmPassword) {
            $errors[] = 'Les mots de passe ne correspondent pas.';
        }
        
        // Phone validation
        $phone = $request->request->get('phoneNumber');
        if (empty($phone) || !preg_match('/^[0-9]{8}$/', $phone)) {
            $errors[] = 'Le numéro de téléphone doit contenir exactement 8 chiffres.';
        }
        
        // Photo validation
        $photoFile = $request->files->get('photo');
        if (!$photoFile) {
            $errors[] = 'Veuillez télécharger une photo.';
        }
        
        // Date of birth validation for Voyageurs
        if ($request->request->get('roleUser') === 'Voyageurs') {
            $dateNaiss = $request->request->get('dateNaiss');
            if (empty($dateNaiss)) {
                $errors[] = 'Veuillez entrer votre date de naissance.';
            } else {
                $birthDate = new \DateTime($dateNaiss);
                $today = new \DateTime();
                $age = $today->diff($birthDate)->y;
                
                if ($age < 15) {
                    $errors[] = 'Vous devez avoir au moins 15 ans pour vous inscrire.';
                }
            }
            
            // Prenom validation for Voyageurs
            $prenom = $request->request->get('prenom');
            if (empty($prenom) || strlen($prenom) < 2) {
                $errors[] = 'Le prénom doit contenir au moins 2 caractères.';
            }
        }
        
        return $errors;
    }
    
    private function processFormData(Request $request, SluggerInterface $slugger): array
    {
        $userData = [
            'name' => $request->request->get('name'),
            'email' => $request->request->get('email'),
            'password' => password_hash($request->request->get('password'), PASSWORD_BCRYPT),
            'roleUser' => $request->request->get('roleUser'),
            'phoneNumber' => $request->request->get('phoneNumber'),
            'statut' => 'active',
            'diamond' => 0,
            'deleteFlag' => 0
        ];
        
        // Add prenom for Voyageurs
        if ($request->request->get('roleUser') === 'Voyageurs') {
            $userData['prenom'] = $request->request->get('prenom');
            $userData['dateNaiss'] = $request->request->get('dateNaiss');
        }
        
        // Process photo upload
        $photoFile = $request->files->get('photo');
        if ($photoFile) {
            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoFile->guessExtension();
            
            try {
                $photoFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );
                $userData['imagesU'] = $newFilename;
            } catch (FileException $e) {
                // If file upload fails, set default image
                $userData['imagesU'] = 'default-avatar.jpg';
            }
        } else {
            $userData['imagesU'] = 'default-avatar.jpg';
        }
        
        return $userData;
    }
} 