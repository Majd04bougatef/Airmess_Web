<?php

namespace App\Service;

use App\Entity\PageView;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\Security\Core\Security;
use Psr\Log\LoggerInterface;

class PageViewService
{
    private $entityManager;
    private $requestStack;
    private $security;
    private $logger;

    public function __construct(
        EntityManagerInterface $entityManager,
        RequestStack $requestStack,
        Security $security,
        LoggerInterface $logger
    ) {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
        $this->security = $security;
        $this->logger = $logger;
    }

    /**
     * Track a page view
     */
    public function trackPageView(TerminateEvent $event = null): void
    {
        try {
            $request = $this->requestStack->getCurrentRequest();
            
            // Debugging info
            $this->logger->info('Processing page view tracking: ' . ($request ? $request->getPathInfo() : 'No request'));
            
            // Don't track admin routes, AJAX or asset requests
            if (!$request 
                || str_starts_with($request->getPathInfo(), '/admin')
                || str_starts_with($request->getPathInfo(), '/_')
                || $request->isXmlHttpRequest()
                || str_contains($request->getPathInfo(), '.')
            ) {
                $this->logger->info('Skipping page view tracking for: ' . ($request ? $request->getPathInfo() : 'No request'));
                return;
            }
            
            // Create new page view
            $pageView = new PageView();
            $pageView->setPath($request->getPathInfo());
            $pageView->setIpAddress($request->getClientIp());
            $pageView->setUserAgent($request->headers->get('User-Agent'));
            
            // Try to extract page title
            $pageTitle = $this->extractPageTitle($event?->getResponse());
            if ($pageTitle) {
                $pageView->setPageTitle($pageTitle);
            }
            
            // Add user if logged in
            $user = $this->security->getUser();
            if ($user instanceof User) {
                $pageView->setUser($user);
                $this->logger->info('User associated with page view: ' . $user->getIdU());
            }
            
            // Save to database
            $this->entityManager->persist($pageView);
            $this->entityManager->flush();
            
            $this->logger->info('Page view successfully tracked for: ' . $request->getPathInfo());
        } catch (\Exception $e) {
            $this->logger->error('Error tracking page view: ' . $e->getMessage());
            // Continue execution even if tracking fails
        }
    }
    
    /**
     * Extract page title from response content
     */
    private function extractPageTitle(?Response $response): ?string
    {
        if (!$response) {
            return null;
        }
        
        $content = $response->getContent();
        if (!$content) {
            return null;
        }
        
        // Extract title from HTML content
        if (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
            return trim($matches[1]);
        }
        
        // Try to extract from route name
        $request = $this->requestStack->getCurrentRequest();
        if ($request && $request->attributes->has('_route')) {
            return str_replace('_', ' ', ucwords($request->attributes->get('_route')));
        }
        
        return null;
    }
} 