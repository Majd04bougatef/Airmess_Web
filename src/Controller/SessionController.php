<?php

namespace App\Controller;

use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    private $sessionService;

    public function __construct(SessionService $sessionService)
    {
        $this->sessionService = $sessionService;
    }

    #[Route('/session-info', name: 'session_info')]
    public function sessionInfo(Request $request): Response
    {
        // Ensure session is started before accessing it
        if (!$request->hasSession()) {
            return $this->render('session/error.html.twig', [
                'error_message' => 'Session is not available.'
            ]);
        }
        
        // Start the session if it's not already started
        if (!$request->getSession()->isStarted()) {
            try {
                $request->getSession()->start();
            } catch (\Exception $e) {
                return $this->render('session/error.html.twig', [
                    'error_message' => 'Unable to start session: ' . $e->getMessage()
                ]);
            }
        }
        
        // Now that we've ensured the session is available, get the data
        $lastActivity = $this->sessionService->getLastActivity();
        $visitedPages = $this->sessionService->getVisitedPages();
        $userEmail = $this->sessionService->get('user_email');
        $userRoles = $this->sessionService->get('user_roles', []);
        $language = $this->sessionService->getLanguage();

        return $this->render('session/info.html.twig', [
            'last_activity' => $lastActivity,
            'visited_pages' => $visitedPages,
            'user_email' => $userEmail,
            'user_roles' => $userRoles,
            'language' => $language,
        ]);
    }

    #[Route('/session/set-language/{language}', name: 'session_set_language')]
    public function setLanguage(Request $request, string $language): Response
    {
        // Ensure session is started before accessing it
        if (!$request->hasSession()) {
            return $this->redirectToRoute('dashboard');
        }
        
        // Start the session if it's not already started
        if (!$request->getSession()->isStarted()) {
            try {
                $request->getSession()->start();
            } catch (\Exception $e) {
                return $this->redirectToRoute('dashboard');
            }
        }
        
        $this->sessionService->setLanguage($language);
        
        // Redirect back to the previous page or homepage
        $referer = $request->headers->get('referer');
        
        return $referer ? $this->redirect($referer) : $this->redirectToRoute('dashboard');
    }
} 