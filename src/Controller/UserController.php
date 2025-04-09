<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/user')]
final class UserController extends AbstractController
{
    private $userService;
    private $entityManager;

    public function __construct(UserService $userService, EntityManagerInterface $entityManager)
    {
        $this->userService = $userService;
        $this->entityManager = $entityManager;
    }

    #[Route('/register', name: 'user_register')]
    public function register(Request $request, SluggerInterface $slugger): Response
    {
        // Get all form data
        $email = $request->request->get('email');
        $plainPassword = $request->request->get('password');
        $name = $request->request->get('name');
        $prenom = $request->request->get('prenom');
        $phoneNumber = $request->request->get('phoneNumber');
        $dateNaiss = $request->request->get('dateNaiss');
        $roleUser = $request->request->get('roleUser');
        $statut = $request->request->get('statut');
        $diamond = (int)$request->request->get('diamond');
        $deleteFlag = (int)$request->request->get('deleteFlag');
        
        // Create a new user
        $user = new User();
        $user->setEmail($email);
        $user->setName($name);
        $user->setPrenom($prenom);
        $user->setPhoneNumber($phoneNumber);
        $user->setDateNaiss(new \DateTime($dateNaiss));
        $user->setRoleUser($roleUser);
        $user->setStatut($statut);
        $user->setDiamond($diamond);
        $user->setDeleteFlag($deleteFlag);
        
        // Handle photo upload
        $photoFile = $request->files->get('photo');
        
        if ($photoFile) {
            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
            // Clean the filename to safely include it in URLs
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();

            // Move the file to the directory where user photos are stored
            try {
                $photoFile->move(
                    $this->getParameter('user_photos_directory'),
                    $newFilename
                );
            } catch (\Exception $e) {
                // Handle the exception if something happens during the upload
                $this->addFlash('error', 'Error uploading photo: ' . $e->getMessage());
                $newFilename = 'default.jpg';
            }
            
            // Update the user entity with the photo filename
            $user->setImagesU($newFilename);
        } else {
            // Set a default profile image if no photo was uploaded
            $user->setImagesU('default.jpg');
        }

        // Hash the password
        $hashedPassword = $this->userService->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        // Save the user to the database
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Add a success message
        $this->addFlash('success', 'Registration successful! You can now login.');

        // Redirect to login page 
        return $this->redirectToRoute('app_login');
    }

    #[Route(name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the password before persisting the user
            $hashedPassword = $this->userService->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id_U}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id_U}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the password before updating the user
            $hashedPassword = $this->userService->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id_U}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getIdU(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/profile', name: 'user_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            $this->addFlash('error', 'You must be logged in to view your profile.');
            return $this->redirectToRoute('login');
        }
        
        return $this->render('user/profile.html.twig', [
            'user' => $user,
        ]);
    }
}