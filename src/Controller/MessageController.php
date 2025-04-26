<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Form\MessageType;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/message')]
final class MessageController extends AbstractController
{
    #[Route(name: 'app_message_index', methods: ['GET'])]
    public function index(MessageRepository $messageRepository): Response
    {
        return $this->render('message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
        ]);
    }

   #[Route('/new', name: 'app_message_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, MessageRepository $messageRepository, UserRepository $userRepository): Response
    {
        $message = new Message();
        
        // Get current user from session
        $session = $request->getSession();
        $userId = $session->get('user_id');
        
        if (!$userId) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => false, 'error' => 'User not authenticated']);
            }
            return $this->redirectToRoute('app_login');
        }
        
        $sender = $userRepository->find($userId);
        
        // Get receiver from form data
        $receiverId = $request->request->get('receiver_id');
        $receiver = $userRepository->find($receiverId);
        
        if (!$sender || !$receiver) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse(['success' => false, 'error' => 'Invalid sender or receiver']);
            }
            return $this->redirectToRoute('app_message_index');
        }
        
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Set sender and receiver properly
            $message->setSender($sender);
            $message->setReceiver($receiver);
            $message->setDateM(new \DateTime());
            
            $entityManager->persist($message);
            $entityManager->flush();
            
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => true,
                    'message' => $message->getContent(),
                    'messageId' => $message->getId(),
                    'time' => $message->getDateM()->format('H:i')
                ]);
            }
            
            // Determine where to redirect based on user role or URL referer
            $referer = $request->headers->get('referer');
            if (strpos($referer, 'chatEntreprise') !== false) {
                return $this->redirectToRoute('app_message_entreprise', ['user' => $receiverId]);
            } else {
                return $this->redirectToRoute('app_message_voyageurs');
            }
        }
        
        return $this->render('message/new.html.twig', [
            'form' => $form,
        ]);
    }
    
    


    #[Route('/{id}/show', name: 'app_message_show', methods: ['GET'])]
    public function show(Message $message): Response
    {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_message_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Message $message, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('message/edit.html.twig', [
            'message' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_message_delete', methods: ['POST'])]
    public function delete(Request $request, Message $message, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/chatVoyageurs', name: 'app_message_voyageurs', methods: ['GET', 'POST'])]
    public function chatVoyageurs(Request $request, MessageRepository $messageRepository, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        // Get the current user from session
        $session = $request->getSession();
        $userId = $session->get('user_id');
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        $currentUser = $userRepository->find($userId);
        
        if (!$currentUser) {
            return $this->redirectToRoute('app_login');
        }
        
        // Find all companies that the user has reservations with
        $companies = $messageRepository->findCompaniesForVoyageur($userId);
        $companyDetails = [];
        
        foreach ($companies as $company) {
            $companyEntity = $userRepository->find($company);
            if ($companyEntity) {
                $lastMessage = $messageRepository->findOneBy(
                    ['sender' => [$currentUser, $companyEntity], 'receiver' => [$currentUser, $companyEntity]],
                    ['dateM' => 'DESC']
                );
                
                $companyDetails[] = [
                    'id' => $companyEntity->getIdU(),
                    'name' => $companyEntity->getName(),
                    'image' => $companyEntity->getImagesU() ?: 'company-avatar.svg',
                    'status' => 'En ligne', // Can implement real status later
                    'lastMessage' => $lastMessage ? $lastMessage->getContent() : null,
                    'lastMessageTime' => $lastMessage ? $lastMessage->getDateM() : null
                ];
            }
        }
        
        // Create the message form
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        
        // Handle form submissions via AJAX
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $receiverId = $request->request->get('receiver_id');
            $receiver = $userRepository->find($receiverId);
            
            if ($receiver) {
                $message->setSender($currentUser);
                $message->setReceiver($receiver);
                $message->setDateM(new \DateTime());
                
                $entityManager->persist($message);
                $entityManager->flush();
                
                if ($request->isXmlHttpRequest()) {
                    return new JsonResponse([
                        'success' => true,
                        'message' => $message->getContent(),
                        'messageId' => $message->getId(),
                        'time' => $message->getDateM()->format('H:i')
                    ]);
                }
                
                return $this->redirectToRoute('app_message_voyageurs', ['company' => $receiverId]);
            }
        }
        
        // For GET requests, load conversation with the selected company
        $selectedCompanyId = $request->query->get('company', $companies[0] ?? null);
        $messages = [];
        
        if ($selectedCompanyId) {
            $messages = $messageRepository->findMessagesForChat($userId, $selectedCompanyId);
        }
        
        // Render the template (we'll create a new one based on chatEntreprise design)
        return $this->render('message/chatVoyageurs.html.twig', [
            'companies' => $companyDetails,
            'messages' => $messages,
            'form' => $form,
            'selectedCompanyId' => $selectedCompanyId
        ]);
    }

    #[Route('/chatEntreprise', name: 'app_message_entreprise', methods: ['GET', 'POST'])]
    public function chatEntreprise(Request $request, MessageRepository $messageRepository, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        // Get the current user from session
        $session = $request->getSession();
        $userId = $session->get('user_id');
        
        if (!$userId) {
            return $this->redirectToRoute('app_login');
        }
        
        $currentUser = $userRepository->find($userId);
        
        if (!$currentUser) {
            return $this->redirectToRoute('app_login');
        }
        
        // Get all users who have chatted with the current user
        $chatUsers = $messageRepository->findChatUsers($userId);
        $chatUserDetails = [];
        
        foreach ($chatUsers as $user) {
            $userEntity = $userRepository->find($user);
            if ($userEntity) {
                $lastMessage = $messageRepository->findOneBy(
                    ['sender' => [$currentUser, $userEntity], 'receiver' => [$currentUser, $userEntity]],
                    ['dateM' => 'DESC']
                );
                
                $chatUserDetails[] = [
                    'id' => $userEntity->getIdU(),
                    'name' => $userEntity->getName() . ' ' . $userEntity->getPrenom(),
                    'image' => $userEntity->getImagesU() ?: 'user-avatar.svg',
                    'status' => 'En ligne', // You can implement real online status logic here
                    'lastMessage' => $lastMessage ? $lastMessage->getContent() : null,
                    'lastMessageTime' => $lastMessage ? $lastMessage->getDateM() : null
                ];
            }
        }
        
        // Create the message form
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        
        // Handle POST requests
        if ($request->isMethod('POST')) {
            $data = json_decode($request->getContent(), true);
            $messageContent = $data['message'] ?? null;
            $receiverId = $data['receiver_id'] ?? null;
            
            if ($messageContent && $receiverId) {
                $receiver = $userRepository->find($receiverId);
                
                if ($receiver) {
                    // Create a new message
                    $message = new Message();
                    $message->setSender($currentUser);
                    $message->setReceiver($receiver);
                    $message->setContent($messageContent);
                    $message->setDateM(new \DateTime());
                    
                    // Persist the message
                    $entityManager->persist($message);
                    $entityManager->flush();
                    
                    return new JsonResponse([
                        'success' => true,
                        'message' => $messageContent,
                        'messageId' => $message->getId(),
                        'time' => $message->getDateM()->format('H:i')
                    ]);
                }
            }
            
            return new JsonResponse(['success' => false, 'error' => 'Message vide ou destinataire invalide']);
        }
        
        // For GET requests, load conversation messages with the first user by default
        $selectedUserId = $request->query->get('user', $chatUsers[0] ?? null);
        $messages = [];
        
        if ($selectedUserId) {
            $messages = $messageRepository->findMessagesForChat($userId, $selectedUserId);
        }
        
        return $this->render('dashEntreprise/chatEntreprise.html.twig', [
            'chatUsers' => $chatUserDetails,
            'messages' => $messages,
            'form' => $form,
            'selectedUserId' => $selectedUserId
        ]);
    }
}