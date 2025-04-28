<?php

namespace App\EventListener;

use App\Service\PageViewService;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelEvents;

#[AsEventListener(event: KernelEvents::TERMINATE, method: 'onKernelTerminate')]
class PageViewListener
{
    private $pageViewService;

    public function __construct(PageViewService $pageViewService)
    {
        $this->pageViewService = $pageViewService;
    }

    public function onKernelTerminate(TerminateEvent $event): void
    {
        // Only track successful responses
        if ($event->getResponse()->isSuccessful()) {
            $this->pageViewService->trackPageView($event);
        }
    }
} 