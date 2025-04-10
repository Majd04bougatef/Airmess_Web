<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionService
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * Get the session if available
     */
    private function getSession(): ?SessionInterface
    {
        $session = $this->requestStack->getSession();
        if ($session && $session->isStarted()) {
            return $session;
        }
        return null;
    }

    /**
     * Set a value in the session
     */
    public function set(string $key, $value): void
    {
        $session = $this->getSession();
        if ($session) {
            $session->set($key, $value);
        }
    }

    /**
     * Get a value from the session
     */
    public function get(string $key, $default = null)
    {
        $session = $this->getSession();
        if ($session && $session->has($key)) {
            return $session->get($key);
        }
        return $default;
    }

    /**
     * Remove a value from the session
     */
    public function remove(string $key): void
    {
        $session = $this->getSession();
        if ($session) {
            $session->remove($key);
        }
    }

    /**
     * Check if a key exists in the session
     */
    public function has(string $key): bool
    {
        $session = $this->getSession();
        return $session ? $session->has($key) : false;
    }

    /**
     * Clear the entire session
     */
    public function clear(): void
    {
        $session = $this->getSession();
        if ($session) {
            $session->clear();
        }
    }

    /**
     * Start session if not already started
     */
    public function startSession(): bool
    {
        try {
            $session = $this->requestStack->getSession();
            if (!$session->isStarted()) {
                $session->start();
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Track user activity (last seen time)
     */
    public function trackUserActivity(): void
    {
        $this->set('last_activity', new \DateTime());
    }

    /**
     * Get last activity time
     */
    public function getLastActivity(): ?\DateTime
    {
        return $this->get('last_activity');
    }

    /**
     * Set user's preferred language
     */
    public function setLanguage(string $language): void
    {
        $this->set('preferred_language', $language);
    }

    /**
     * Get user's preferred language
     */
    public function getLanguage(): string
    {
        return $this->get('preferred_language', 'en');
    }

    /**
     * Track visited pages
     */
    public function trackVisitedPage(string $pageName): void
    {
        $visitedPages = $this->get('visited_pages', []);
        
        // Add current page to the history (maximum 10 entries)
        array_unshift($visitedPages, [
            'page' => $pageName,
            'timestamp' => new \DateTime()
        ]);
        
        // Keep only the latest 10 pages
        if (count($visitedPages) > 10) {
            array_pop($visitedPages);
        }
        
        $this->set('visited_pages', $visitedPages);
    }

    /**
     * Get visited pages history
     */
    public function getVisitedPages(): array
    {
        return $this->get('visited_pages', []);
    }
} 