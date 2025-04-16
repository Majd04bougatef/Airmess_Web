<?php

namespace App\Controller;

use App\Entity\Expense;
use App\Form\ExpenseType;
use App\Repository\ExpenseRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[Route('/expense')]
final class ExpenseController extends AbstractController
{
    #[Route(name: 'app_expense_index', methods: ['GET'])]
    public function index(ExpenseRepository $expenseRepository, SessionInterface $session, UserRepository $userRepository): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // If admin, show all expenses, otherwise only user's expenses
        $expenses = ($user && $user->getRoleUser() === 'Admin') 
            ? $expenseRepository->findAll() 
            : $expenseRepository->findBy(['user' => $user]);
            
        return $this->render('expense/index.html.twig', [
            'expenses' => $expenses,
        ]);
    }

    #[Route('/new', name: 'app_expense_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager, 
        SluggerInterface $slugger, 
        SessionInterface $session,
        UserRepository $userRepository
    ): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        if (!$user) {
            $this->addFlash('error', 'User not found. Please log in again.');
            return $this->redirectToRoute('login');
        }
        
        $expense = new Expense();
        $expense->setUser($user);
        
        // Check if user is admin
        $isAdmin = $user->getRoleUser() === 'Admin' || $user->getRoleUser() === 'ROLE_ADMIN';
        
        $form = $this->createForm(ExpenseType::class, $expense, [
            'is_admin' => $isAdmin
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                try {
                    // Move the file to the expenses images directory
                    $imageFile->move(
                        $this->getParameter('expense_images_directory'),
                        $newFilename
                    );
                    
                    // Set the image filename in the database
                    $expense->setImagedepense($newFilename);
                } catch (FileException $e) {
                    // Handle file upload error
                    $this->addFlash('error', 'Error uploading file: ' . $e->getMessage());
                    return $this->renderForm('expense/new.html.twig', [
                        'expense' => $expense,
                        'form' => $form,
                        'in_voyageurs_dashboard' => $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs',
                    ]);
                }
            } else {
                // Should not happen due to validation, but just in case
                $this->addFlash('error', 'A receipt image is required.');
                return $this->renderForm('expense/new.html.twig', [
                    'expense' => $expense,
                    'form' => $form,
                    'in_voyageurs_dashboard' => $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs',
                ]);
            }
            
            try {
                $entityManager->persist($expense);
                $entityManager->flush();
                
                $this->addFlash('success', 'Expense created successfully!');
                
                $inVoyageursDashboard = $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs';
                $redirectRoute = $inVoyageursDashboard ? 'userVoyageurs_page' : 'app_expense_index';
                
                return $this->redirectToRoute($redirectRoute, [], Response::HTTP_SEE_OTHER);
            } catch (\Exception $e) {
                $this->addFlash('error', 'An error occurred while saving the expense: ' . $e->getMessage());
            }
        } else if ($form->isSubmitted()) {
            // Add a general error message when the form is submitted but not valid
            $this->addFlash('error', 'There are errors in your form. Please check the fields and try again.');
        }

        $inVoyageursDashboard = $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs';
        
        return $this->render('expense/new.html.twig', [
            'expense' => $expense,
            'form' => $form,
            'in_voyageurs_dashboard' => $inVoyageursDashboard,
        ]);
    }

    #[Route('/{idE}', name: 'app_expense_show', methods: ['GET'])]
    public function show(Expense $expense, SessionInterface $session, UserRepository $userRepository, Request $request): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Check if user has permission to view this expense
        if (!$user || ($user->getRoleUser() !== 'Admin' && $expense->getUser() !== $user)) {
            $this->addFlash('error', 'You do not have permission to view this expense.');
            return $this->redirectToRoute('app_expense_index');
        }
        
        $inVoyageursDashboard = $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs';
        
        return $this->render('expense/show.html.twig', [
            'expense' => $expense,
            'in_voyageurs_dashboard' => $inVoyageursDashboard,
        ]);
    }

    #[Route('/{idE}/edit', name: 'app_expense_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request, 
        Expense $expense, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        SessionInterface $session,
        UserRepository $userRepository
    ): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Check if user has permission to edit this expense
        if (!$user || ($user->getRoleUser() !== 'Admin' && $expense->getUser() !== $user)) {
            $this->addFlash('error', 'You do not have permission to edit this expense.');
            return $this->redirectToRoute('app_expense_index');
        }
        
        // Check if user is admin
        $isAdmin = $user->getRoleUser() === 'Admin' || $user->getRoleUser() === 'ROLE_ADMIN';
        
        // Store original image filename
        $originalImage = $expense->getImagedepense();
        $hasExistingImage = $originalImage && $originalImage !== 'default-receipt.jpg';
        
        // Create the form with custom validation for edit
        $options = [
            'is_admin' => $isAdmin
        ];
        
        // If there's already an image, make the field optional in edit mode
        if ($hasExistingImage) {
            $options['image_required'] = false;
        }
        
        $form = $this->createForm(ExpenseType::class, $expense, $options);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle file upload
            $imageFile = $form->get('imageFile')->getData();
            
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
                
                try {
                    // Move the file to the expenses images directory
                    $imageFile->move(
                        $this->getParameter('expense_images_directory'),
                        $newFilename
                    );
                    
                    // Delete old image if it exists and is not the default
                    if ($hasExistingImage) {
                        $oldImagePath = $this->getParameter('expense_images_directory') . '/' . $originalImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }
                    
                    // Set the image filename in the database
                    $expense->setImagedepense($newFilename);
                } catch (FileException $e) {
                    // Handle file upload error
                    $this->addFlash('error', 'Error uploading file: ' . $e->getMessage());
                    return $this->renderForm('expense/edit.html.twig', [
                        'expense' => $expense,
                        'form' => $form,
                        'in_voyageurs_dashboard' => $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs',
                    ]);
                }
            } else if (!$hasExistingImage) {
                // No image uploaded and no existing image
                $this->addFlash('error', 'A receipt image is required.');
                return $this->renderForm('expense/edit.html.twig', [
                    'expense' => $expense,
                    'form' => $form,
                    'in_voyageurs_dashboard' => $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs',
                ]);
            }
            
            try {
                $entityManager->flush();
                
                $this->addFlash('success', 'Expense updated successfully!');
                
                $inVoyageursDashboard = $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs';
                $redirectRoute = $inVoyageursDashboard ? 'userVoyageurs_page' : 'app_expense_index';
                
                return $this->redirectToRoute($redirectRoute, [], Response::HTTP_SEE_OTHER);
            } catch (\Exception $e) {
                $this->addFlash('error', 'An error occurred while updating the expense: ' . $e->getMessage());
            }
        } else if ($form->isSubmitted()) {
            // Add a general error message when the form is submitted but not valid
            $this->addFlash('error', 'There are errors in your form. Please check the fields and try again.');
        }

        $inVoyageursDashboard = $request->query->has('dashboard') && $request->query->get('dashboard') === 'voyageurs';
        
        return $this->render('expense/edit.html.twig', [
            'expense' => $expense,
            'form' => $form,
            'in_voyageurs_dashboard' => $inVoyageursDashboard,
        ]);
    }

    #[Route('/{idE}', name: 'app_expense_delete', methods: ['POST'])]
    public function delete(
        Request $request, 
        Expense $expense, 
        EntityManagerInterface $entityManager,
        SessionInterface $session,
        UserRepository $userRepository
    ): Response
    {
        if (!$session->has('user_id')) {
            return $this->redirectToRoute('login');
        }
        
        $userId = $session->get('user_id');
        $user = $userRepository->find($userId);
        
        // Check if user has permission to delete this expense
        if (!$user || ($user->getRoleUser() !== 'Admin' && $expense->getUser() !== $user)) {
            $this->addFlash('error', 'You do not have permission to delete this expense.');
            return $this->redirectToRoute('app_expense_index');
        }
        
        if ($this->isCsrfTokenValid('delete'.$expense->getIdE(), $request->getPayload()->getString('_token'))) {
            // Delete the expense image file if it's not the default
            $imagePath = $expense->getImagedepense();
            if ($imagePath && $imagePath !== 'default-receipt.jpg') {
                $fullPath = $this->getParameter('expense_images_directory') . '/' . $imagePath;
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
            
            $entityManager->remove($expense);
            $entityManager->flush();
            
            $this->addFlash('success', 'Expense deleted successfully!');
        }

        return $this->redirectToRoute('app_expense_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/image/{filename}', name: 'app_expense_image')]
    public function serveImage(string $filename): Response
    {
        $imagesDir = $this->getParameter('expense_images_directory');
        $filePath = $imagesDir . '/' . $filename;
        
        // If file doesn't exist, try the public directory
        if (!file_exists($filePath)) {
            $publicImagesDir = $this->getParameter('kernel.project_dir') . '/public/uploads/expenses';
            $filePath = $publicImagesDir . '/' . $filename;
        }
        
        // If still not found, use default image
        if (!file_exists($filePath)) {
            $defaultImage = $this->getParameter('kernel.project_dir') . '/public/uploads/expenses/default-receipt.jpg';
            if (file_exists($defaultImage)) {
                return new BinaryFileResponse($defaultImage);
            }
            
            // If even default image doesn't exist, throw 404
            throw new NotFoundHttpException('Image not found');
        }
        
        return new BinaryFileResponse($filePath);
    }
}
