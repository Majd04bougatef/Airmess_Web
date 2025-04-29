<?php

namespace App\EventSubscriber;

use App\Entity\PageView;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class PageViewSubscriber implements EventSubscriberInterface
{
    private $entityManager;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $response = $event->getResponse();

        // Skip admin routes, asset files, and AJAX requests
        if (str_starts_with($request->getPathInfo(), '/admin') || 
            str_starts_with($request->getPathInfo(), '/_') || 
            $request->isXmlHttpRequest() ||
            str_contains($request->getPathInfo(), '.') ||
            !$response->isSuccessful()) {
            return;
        }

        // Create and save page view
        $pageView = new PageView();
        $pageView->setPath($request->getPathInfo());
        $pageView->setIpAddress($request->getClientIp());
        $pageView->setUserAgent($request->headers->get('User-Agent'));

        // Try to extract page title
        $content = $response->getContent();
        if ($content && preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
            $pageView->setPageTitle(trim($matches[1]));
        } else if ($request->attributes->has('_route')) {
            $pageView->setPageTitle(str_replace('_', ' ', ucwords($request->attributes->get('_route'))));
        }

        // Add user if logged in
        $user = $this->security->getUser();
        if ($user instanceof User) {
            $pageView->setUser($user);
        }

        // Save page view
        $this->entityManager->persist($pageView);
        $this->entityManager->flush();
    }
} 