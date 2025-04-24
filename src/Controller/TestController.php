<?php

namespace App\Controller;

use App\Service\EmailService;
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
} 