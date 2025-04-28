<?php

namespace App\Controller;

use App\Entity\PageView;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

trait TrackPageViewTrait
{
    /**
     * Add this to the end of your controller actions to track page views
     */
    protected function trackPageView(Response $response, string $customTitle = null): Response
    {
        if (!$this->container->has('doctrine.orm.entity_manager') || 
            !$this->container->has('security.helper')) {
            return $response;
        }
        
        $request = $this->container->get('request_stack')->getCurrentRequest();
        if (!$request) {
            return $response;
        }
        
        // Skip admin routes, asset files, and AJAX requests
        if (str_starts_with($request->getPathInfo(), '/admin') || 
            str_starts_with($request->getPathInfo(), '/_') || 
            $request->isXmlHttpRequest() ||
            str_contains($request->getPathInfo(), '.')) {
            return $response;
        }
        
        try {
            $entityManager = $this->container->get('doctrine.orm.entity_manager');
            
            // Create page view
            $pageView = new PageView();
            $pageView->setPath($request->getPathInfo());
            $pageView->setIpAddress($request->getClientIp());
            $pageView->setUserAgent($request->headers->get('User-Agent'));
            
            // Set page title
            if ($customTitle) {
                $pageView->setPageTitle($customTitle);
            } else {
                // Try to extract title from response
                $content = $response->getContent();
                if ($content && preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
                    $pageView->setPageTitle(trim($matches[1]));
                } else if ($request->attributes->has('_route')) {
                    $pageView->setPageTitle(str_replace('_', ' ', ucwords($request->attributes->get('_route'))));
                }
            }
            
            // Add user if logged in
            $security = $this->container->get('security.helper');
            $user = $security->getUser();
            if ($user instanceof User) {
                $pageView->setUser($user);
            }
            
            // Save to database
            $entityManager->persist($pageView);
            $entityManager->flush();
        } catch (\Exception $e) {
            // Silently fail - don't break the response for tracking
        }
        
        return $response;
    }
} 