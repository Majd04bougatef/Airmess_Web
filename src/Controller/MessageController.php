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
    
        // Simuler un utilisateur connecté
        $sender = $userRepository->find(40);
        $receiver = $userRepository->find(57);
    
        if ($sender && $receiver) {
            $message->setSender($sender);
            $message->setReceiver($receiver);
        }
    
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $message->setDateM(new \DateTime());
            $entityManager->persist($message);
            $entityManager->flush();
    
            // Si la requête est AJAX, on renvoie juste la vue des messages
            if ($request->isXmlHttpRequest()) {
                // Récupérer les messages entre ces deux utilisateurs
                $messages = $messageRepository->findMessagesForChat(40, 57);
    
                return $this->render('message/_message.html.twig', [
                    'messages' => $messages
                ]);
            }
    
            return $this->redirectToRoute('app_message_voyageurs');
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
    // Récupérer les utilisateurs pour le formulaire
    $sender = $userRepository->find(40);
    $receiver = $userRepository->find(57);
    
    // Créer le message et le formulaire
    $message = new Message();
    if ($sender && $receiver) {
        $message->setSender($sender);
        $message->setReceiver($receiver);
    }
    
    $form = $this->createForm(MessageType::class, $message);
    
    // Traitement des requêtes POST AJAX directes (pour compatibilité)
    if ($request->isMethod('POST') && $request->isXmlHttpRequest() && $request->getContentType() === 'json') {
        $data = json_decode($request->getContent(), true);
        $messageContent = $data['message'] ?? null;
        
        if ($messageContent && $sender && $receiver) {
            // Créer une nouvelle instance de Message
            $message = new Message();
            
            // Configurer le message
            $message->setSender($sender);
            $message->setReceiver($receiver);
            $message->setContent($messageContent);
            $message->setDateM(new \DateTime());
            
            // Persister le message
            $entityManager->persist($message);
            $entityManager->flush();
            
            // Retourner une réponse
            return new JsonResponse([
                'success' => true,
                'response' => 'Nous avons bien reçu votre message et nous vous répondrons bientôt.',
                'messageId' => $message->getId()
            ]);
        }
        
        return new JsonResponse(['success' => false, 'error' => 'Message vide']);
    }
    
    // Pour les requêtes GET, charger les messages de conversation
    if ($request->isMethod('GET')) {
        // Charger l'historique des messages entre ces deux utilisateurs
        $messages = $messageRepository->findMessagesForChat(40, 57);
        
        if ($request->isXmlHttpRequest()) {
            return $this->render('message/_message.html.twig', [
                'messages' => $messages
            ]);
        }
        
        return $this->render('message/chat.html.twig', [
            'messages' => $messages,
            'form' => $form,
        ]);
    }
    
    return new Response('Méthode non autorisée', Response::HTTP_METHOD_NOT_ALLOWED);
}
}