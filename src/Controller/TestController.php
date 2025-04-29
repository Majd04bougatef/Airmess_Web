<?php

namespace App\Controller;

use App\Service\EmailService;
use App\Entity\PageView;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/test', name: 'test_')]
class TestController extends AbstractController
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    #[Route('/email/{email}', name: 'email')]
    public function testEmail(string $email): Response
    {
        $code = sprintf('%06d', mt_rand(0, 999999));
        $result = $this->emailService->sendVerificationCode($email, $code);
        
        if ($result) {
            return new Response("Email sent successfully to $email with code $code");
        } else {
            return new Response("Failed to send email to $email", 500);
        }
    }

    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    
    #[Route('/pageview', name: 'test_page_view')]
    public function testPageView(EntityManagerInterface $entityManager): Response
    {
        // Create a test page view
        $pageView = new PageView();
        $pageView->setPath('/test-path');
        $pageView->setPageTitle('Test Page Title');
        $pageView->setIpAddress('127.0.0.1');
        $pageView->setUserAgent('Test User Agent');
        
        // Save to database
        $entityManager->persist($pageView);
        $entityManager->flush();
        
        return new Response('Test page view created with ID: ' . $pageView->getId());
    }

    #[Route('/autotrack', name: 'test_autotrack')]
    public function testAutoTrack(): Response
    {
        return new Response(
            '<html><head><title>Test Auto Tracking Page</title></head><body>
                <h1>This page should be automatically tracked</h1>
                <p>Visit the admin dashboard to see if this page appears in the statistics.</p>
            </body></html>'
        );
    }
} 