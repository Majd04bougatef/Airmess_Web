<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request, 
        EntityManagerInterface $entityManager, 
        SluggerInterface $slugger,
        UserPasswordHasherInterface $passwordHasher
    ): Response
    {
        if ($request->isMethod('POST')) {
            try {
                // Create a new user
                $user = new User();
                
                // Set basic user data
                $user->setName($request->request->get('name'));
                
                // Prenom is only for voyageurs
                if ($request->request->get('roleUser') === 'Voyageurs') {
                    $user->setPrenom($request->request->get('prenom'));
                } else {
                    $user->setPrenom(''); // For entreprise, set empty string
                }
                
                $user->setEmail($request->request->get('email'));
                
                // Hash the password using bcrypt
                $plainPassword = $request->request->get('password');
                // Using password_hash directly because UserPasswordHasherInterface requires the User to implement UserInterface
                $hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
                $user->setPassword($hashedPassword);
                
                $user->setRoleUser($request->request->get('roleUser'));
                $user->setPhoneNumber($request->request->get('phoneNumber'));
                $user->setStatut($request->request->get('statut', 'active'));
                $user->setDiamond((int)$request->request->get('diamond', 0));
                $user->setDeleteFlag((int)$request->request->get('deleteFlag', 0));
                
                // Handle date of birth
                if ($request->request->get('roleUser') === 'Voyageurs' && $request->request->get('dateNaiss')) {
                    $user->setDateNaiss(new \DateTime($request->request->get('dateNaiss')));
                } else {
                    $user->setDateNaiss(new \DateTime()); // Default to current date for entreprise
                }
                
                // Handle file upload
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
                    } catch (FileException $e) {
                        // Handle exception
                        $this->addFlash('error', 'Erreur lors du téléchargement de la photo.');
                        return $this->redirectToRoute('app_signup');
                    }
                    
                    $user->setImagesU($newFilename);
                } else {
                    $user->setImagesU('default-avatar.jpg'); // Default image
                }
                
                // Save the user to the database
                $entityManager->persist($user);
                $entityManager->flush();
                
                $this->addFlash('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
                
                return $this->redirectToRoute('login');
                
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l\'inscription: ' . $e->getMessage());
                return $this->redirectToRoute('app_signup');
            }
        }
        
        // If not a POST request, redirect to signup page
        return $this->redirectToRoute('app_signup');
    }
} 