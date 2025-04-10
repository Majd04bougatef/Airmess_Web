<?php

namespace App\EventListener;

use App\Service\SessionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserActivitySubscriber implements EventSubscriberInterface
{
    private $sessionService;
    private $security;

    public function __construct(SessionService $sessionService, Security $security)
    {
        $this->sessionService = $sessionService;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 10],
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        
        // Check if session is started and available before using it
        if (!$request->hasSession() || !$request->getSession()->isStarted()) {
            return; // Skip session operations if session is not available
        }
        
        // Track user activity time
        $this->sessionService->trackUserActivity();
        
        // Get current route name
        $route = $request->attributes->get('_route');
        if ($route) {
            $this->sessionService->trackVisitedPage($route);
        }
        
        // Store user info in session if logged in
        $user = $this->security->getUser();
        if ($user) {
            $this->sessionService->set('user_email', $user->getUserIdentifier());
            $this->sessionService->set('user_roles', $user->getRoles());
        }
    }
} 