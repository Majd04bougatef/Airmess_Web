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
use Doctrine\ORM\EntityManagerInterface;

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
                // Check if user account is active
                if ($user->getStatut() !== 'actif') {
                    $this->addFlash('error', 'Votre compte a été désactivé. Veuillez contacter un administrateur pour le réactiver.');
                    return $this->render('login/login.html.twig', [
                        'last_username' => $email,
                        'error' => 'Compte désactivé'
                    ]);
                }
                
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
    
    #[Route('/sign-up', name: 'app_signup')]
    public function signup(): Response
    {
        return $this->render('login/sign-up.html.twig');
    }
    
    #[Route('/dash', name: 'app_dash')]
    public function dash(SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Check if user has Admin role
        $userRole = $session->get('user_role');
        if ($userRole !== 'Admin' && $userRole !== 'ROLE_ADMIN') {
            return $this->redirectToRoute('login');
        }
        
        return $this->render('dashAdmin/dashboard.html.twig');
    }
    
    #[Route('/dashEntreprise', name: 'app_dashEntreprise')]
    public function dashEntreprise(SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Check if user has Entreprise role
        $userRole = $session->get('user_role');
        if ($userRole !== 'Entreprise') {
            return $this->redirectToRoute('login');
        }
        
        return $this->render('dashEntreprise/dashboardEntreprise.html.twig');
    }
    
    #[Route('/dashVoyageurs', name: 'app_dashVoyageurs')]
    public function dashVoyageurs(SessionInterface $session): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Check if user has Voyageurs role - but also allow Admin access
        $userRole = $session->get('user_role');
        if ($userRole !== 'Voyageurs' && $userRole !== 'Admin' && $userRole !== 'ROLE_ADMIN') {
            return $this->redirectToRoute('login');
        }
        
        return $this->render('dashVoyageurs/dashboardVoyageurs.html.twig');
    }
    
    #[Route('/logout', name: 'app_logout')]
    public function logout(SessionInterface $session): Response
    {
        // Clear the session
        $session->invalidate();
        
        // Redirect to login page
        return $this->redirectToRoute('login');
    }
    
    #[Route('/profile', name: 'app_profile')]
    public function profile(Request $request, UserRepository $userRepository, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        // Handle profile update
        $updated = false;
        if ($request->isMethod('POST') && $request->request->has('action')) {
            $action = $request->request->get('action');
            
            // Update profile action
            if ($action === 'update') {
                $name = $request->request->get('name');
                $prenom = $request->request->get('prenom');
                $email = $request->request->get('email');
                $phone = $request->request->get('phone');
                
                // Update user data
                if (!empty($name)) $user->setName($name);
                if (!empty($prenom)) $user->setPrenom($prenom);
                if (!empty($email)) $user->setEmail($email);
                if (!empty($phone)) $user->setPhoneNumber($phone);
                
                // Handle photo upload if present
                $photoFile = $request->files->get('photo');
                if ($photoFile) {
                    $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = preg_replace('/[^A-Za-z0-9_]/', '', $originalFilename);
                    $safeFilename = strtolower($safeFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                    
                    try {
                        // Use the correct absolute path for images_users directory
                        $uploadsDirectory = 'C:/xampp/htdocs/images_users';
                        
                        // Make sure the directory exists
                        if (!file_exists($uploadsDirectory) && !is_dir($uploadsDirectory)) {
                            mkdir($uploadsDirectory, 0755, true);
                        }
                        
                        // Delete old profile image if it exists and is not the default
                        $oldFilename = $user->getImagesU();
                        if ($oldFilename && $oldFilename !== 'default.jpg' && $oldFilename !== 'user-avatar.svg') {
                            $oldFilePath = $uploadsDirectory . '/' . $oldFilename;
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        
                        // Move the new file
                        $photoFile->move(
                            $uploadsDirectory,
                            $newFilename
                        );
                        
                        $user->setImagesU($newFilename);
                        
                        // Update session with new image
                        $session->set('user_image', $newFilename);
                        $newImagePath = '/images_users/' . $newFilename;
                    } catch (\Exception $e) {
                        $this->addFlash('error', 'Error uploading photo: ' . $e->getMessage());
                    }
                }
                
                // Update password if provided
                $password = $request->request->get('password');
                $confirmPassword = $request->request->get('confirm_password');
                
                if (!empty($password) && $password === $confirmPassword) {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $user->setPassword($hashedPassword);
                } elseif (!empty($password)) {
                    $this->addFlash('error', 'Passwords do not match');
                    return $this->redirectToRoute('app_profile');
                }
                
                // Save changes
                $entityManager->flush();
                
                // Update session with new name if changed
                $session->set('user_name', $user->getName() . ($user->getPrenom() ? ' ' . $user->getPrenom() : ''));
                
                $updated = true;
                $this->addFlash('success', 'Your profile has been updated successfully.');
            }
            
            // Delete account action (set statut to inactif)
            if ($action === 'delete') {
                $user->setStatut('inactif');
                $entityManager->flush();
                
                // Log the user out
                return $this->redirectToRoute('app_logout');
            }
        }
        
        // Determine which template to use based on user role
        $template = 'profile/profile.html.twig';
        if ($user->getRoleUser() === 'Admin') {
            $template = 'profile/admin_profile.html.twig';
        } elseif ($user->getRoleUser() === 'Entreprise') {
            $template = 'profile/entreprise_profile.html.twig';
        } elseif ($user->getRoleUser() === 'Voyageurs') {
            $template = 'profile/voyageur_profile.html.twig';
        }
        
        return $this->render($template, [
            'user' => $user,
            'updated' => $updated
        ]);
    }
    
    #[Route('/profile-update-ajax', name: 'app_profile_update_ajax')]
    public function profileUpdateAjax(Request $request, UserRepository $userRepository, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->json([
                'success' => false,
                'message' => 'You must be logged in to update your profile.'
            ], 401);
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'User not found. Please log in again.'
            ], 404);
        }
        
        try {
            // Get form data
            $name = $request->request->get('name');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $phone = $request->request->get('phone');
            
            // Basic validation
            if (empty($name) || empty($prenom) || empty($email)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Name, first name and email are required fields.'
                ], 400);
            }
            
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->json([
                    'success' => false,
                    'message' => 'Please enter a valid email address.'
                ], 400);
            }
            
            // Update user data
            $user->setName($name);
            $user->setPrenom($prenom);
            $user->setEmail($email);
            $user->setPhoneNumber($phone);
            
            // Handle photo upload if present
            $photoFile = $request->files->get('photo');
            $newImagePath = null;
            
            if ($photoFile) {
                // Validate file type
                $mimeType = $photoFile->getMimeType();
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                
                if (!in_array($mimeType, $allowedTypes)) {
                    return $this->json([
                        'success' => false,
                        'message' => 'Invalid file type. Allowed types: JPG, PNG, GIF, WEBP.'
                    ], 400);
                }
                
                // Validate file size (max 5MB)
                if ($photoFile->getSize() > 5 * 1024 * 1024) {
                    return $this->json([
                        'success' => false,
                        'message' => 'File is too large. Maximum size is 5MB.'
                    ], 400);
                }
                
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                // Use Symfony's SluggerInterface if available, otherwise fall back to this method
                $safeFilename = preg_replace('/[^A-Za-z0-9_]/', '', $originalFilename);
                $safeFilename = strtolower($safeFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                
                try {
                    // Use the correct absolute path for images_users directory
                    $uploadsDirectory = 'C:/xampp/htdocs/images_users';
                    
                    // Make sure the directory exists
                    if (!file_exists($uploadsDirectory) && !is_dir($uploadsDirectory)) {
                        mkdir($uploadsDirectory, 0755, true);
                    }
                    
                    // Delete old profile image if it exists and is not the default
                    $oldFilename = $user->getImagesU();
                    if ($oldFilename && $oldFilename !== 'default.jpg' && $oldFilename !== 'user-avatar.svg') {
                        $oldFilePath = $uploadsDirectory . '/' . $oldFilename;
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                        
                        // Also remove from public directory if exists
                        $publicOldPath = $this->getParameter('kernel.project_dir') . '/public/images_users/' . $oldFilename;
                        if (file_exists($publicOldPath)) {
                            unlink($publicOldPath);
                        }
                    }
                    
                    // Move the new file to main storage
                    $photoFile->move(
                        $uploadsDirectory,
                        $newFilename
                    );
                    
                    // Copy to public directory for web access
                    $publicDir = $this->getParameter('kernel.project_dir') . '/public/images_users';
                    if (!file_exists($publicDir) && !is_dir($publicDir)) {
                        mkdir($publicDir, 0755, true);
                    }
                    
                    // Copy the file to public directory
                    if (file_exists($uploadsDirectory . '/' . $newFilename)) {
                        copy($uploadsDirectory . '/' . $newFilename, $publicDir . '/' . $newFilename);
                    }
                    
                    $user->setImagesU($newFilename);
                    
                    // Update session with new image
                    $session->set('user_image', $newFilename);
                    $newImagePath = '/images_users/' . $newFilename;
                } catch (\Exception $e) {
                    // Log the error
                    error_log('Error uploading profile image: ' . $e->getMessage());
                    
                    return $this->json([
                        'success' => false,
                        'message' => 'Error uploading photo: ' . $e->getMessage()
                    ], 500);
                }
            }
            
            // Save changes
            $entityManager->flush();
            
            // Update session with new name if changed
            $session->set('user_name', $user->getName() . ($user->getPrenom() ? ' ' . $user->getPrenom() : ''));
            
            return $this->json([
                'success' => true,
                'message' => 'Profile updated successfully',
                'new_image' => $newImagePath,
                'user' => [
                    'name' => $user->getName(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'phone' => $user->getPhoneNumber()
                ]
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Error updating profile: ' . $e->getMessage()
            ], 500);
        }
    }
    
    #[Route('/goto-profile', name: 'goto_profile')]
    public function gotoProfile(): Response
    {
        return $this->render('profile/redirect_to_profile.html.twig');
    }
    
    #[Route('/update-password-ajax', name: 'app_update_password_ajax', methods: ['POST'])]
    public function updatePasswordAjax(Request $request, UserRepository $userRepository, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->json([
                'success' => false,
                'message' => 'You must be logged in to update your password.'
            ]);
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'User not found. Please log in again.'
            ]);
        }
        
        try {
            // Try to get data from JSON request or fallback to form data
            if ($request->getContentType() === 'json') {
                error_log('Using JSON content type');
                // For application/json requests
                $data = json_decode($request->getContent(), true);
            } else {
                error_log('Using form data: ' . $request->getContentType());
                // For form data requests
                $data = [
                    'current_password' => $request->request->get('currentPassword'),
                    'password' => $request->request->get('newPassword'),
                    'confirm_password' => $request->request->get('confirmPassword')
                ];
            }
            
            // Log decoded data for debugging
            error_log('Request data: ' . print_r($data, true));
            
            // Validate input data
            if (empty($data['current_password']) || empty($data['password']) || empty($data['confirm_password'])) {
                return $this->json([
                    'success' => false,
                    'message' => 'All fields are required. Please fill in all password fields.'
                ]);
            }
            
            // Verify current password
            $passwordMatch = password_verify($data['current_password'], $user->getPassword());
            error_log('Password match result: ' . ($passwordMatch ? 'true' : 'false'));
            
            if (!$passwordMatch) {
                return $this->json([
                    'success' => false,
                    'message' => 'Current password is incorrect.'
                ]);
            }
            
            // Check new password and confirmation match
            if ($data['password'] !== $data['confirm_password']) {
                return $this->json([
                    'success' => false,
                    'message' => 'New passwords do not match.'
                ]);
            }
            
            // Basic password validation
            if (strlen($data['password']) < 6) {
                return $this->json([
                    'success' => false,
                    'message' => 'New password must be at least 6 characters long.'
                ]);
            }
            
            // Check for complexity - requires at least one number and one letter
            if (!preg_match('/[A-Za-z]/', $data['password']) || !preg_match('/\d/', $data['password'])) {
                return $this->json([
                    'success' => false,
                    'message' => 'Password must contain at least one letter and one number.'
                ]);
            }
            
            // Update password
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);
            
            // Save changes
            $entityManager->flush();
            error_log('Password updated successfully for user: ' . $user->getEmail());
            
            return $this->json([
                'success' => true,
                'message' => 'Your password has been updated successfully.'
            ]);
        } catch (\Exception $e) {
            error_log('Error in updatePasswordAjax: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            
            return $this->json([
                'success' => false,
                'message' => 'Error updating password: ' . $e->getMessage()
            ]);
        }
    }
    
    #[Route('/deactivate-profile-ajax', name: 'deactivate_profile_ajax', methods: ['POST'])]
    public function deactivateProfileAjax(Request $request, UserRepository $userRepository, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        // Check if user is logged in
        if (!$session->has('user_id')) {
            return $this->json([
                'success' => false,
                'message' => 'You must be logged in to deactivate your profile.'
            ]);
        }
        
        // Get current user
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'User not found. Please log in again.'
            ]);
        }
        
        try {
            // Set user status to inactive
            $user->setStatut('inactif');
            
            // Save changes
            $entityManager->flush();
            
            return $this->json([
                'success' => true,
                'message' => 'Your profile has been deactivated successfully.'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Error deactivating profile: ' . $e->getMessage()
            ]);
        }
    }
} 