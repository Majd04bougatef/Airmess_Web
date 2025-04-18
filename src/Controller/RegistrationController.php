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
        SessionInterface $session,
        ValidatorInterface $validator
    ): Response
    {
        if ($request->isMethod('POST')) {
            try {
                // Verify reCAPTCHA
                $recaptchaResponse = $request->request->get('g-recaptcha-response');
                
                if (!$recaptchaResponse) {
                    $this->addFlash('error', 'Please check the reCAPTCHA box');
                    return $this->redirectToRoute('app_signup');
                }
                
                // Verify with Google reCAPTCHA API
                $recaptchaSuccess = $this->verifyRecaptcha($recaptchaResponse);
                
                if (!$recaptchaSuccess) {
                    $this->addFlash('error', 'reCAPTCHA verification failed. Please try again.');
                    return $this->redirectToRoute('app_signup');
                }
                
                // Create a new User object and set its properties
                $user = new User();
                $user->setName($request->request->get('name'));
                $user->setEmail($request->request->get('email'));
                $user->setPassword(password_hash($request->request->get('password'), PASSWORD_BCRYPT));
                $user->setRoleUser($request->request->get('roleUser'));
                $user->setPhoneNumber($request->request->get('phoneNumber'));
                $user->setStatut('actif');
                $user->setDiamond(0);
                $user->setDeleteFlag(0);
                
                // Set additional fields for Voyageurs
                if ($request->request->get('roleUser') === 'Voyageurs') {
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
                
                // Generate verification code
                $code = $this->verificationService->generateCode($user->getEmail());
                
                // Send verification code
                $emailSent = $this->verificationService->sendVerificationCode($user->getEmail(), $code);
                
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
    
    /**
     * Helper method to verify reCAPTCHA
     */
    private function verifyRecaptcha(string $recaptchaResponse): bool
    {
        // Verify with Google reCAPTCHA API
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $this->getParameter('recaptcha_secret_key'),
            'response' => $recaptchaResponse
        ];
        
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        
        return $resultJson->success ?? false;
    }
} 