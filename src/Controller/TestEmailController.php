<?php

namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class TestEmailController extends AbstractController
{
    private EmailService $emailService;
    private MailerInterface $mailer;

    public function __construct(EmailService $emailService, MailerInterface $mailer)
    {
        $this->emailService = $emailService;
        $this->mailer = $mailer;
    }

    #[Route('/admin/test-email', name: 'app_test_email')]
    public function testEmail(): Response
    {
        $testEmail = 'test@example.com'; // Replace with your test email
        $result = [];
        
        // Test direct mailer
        try {
            $email = (new Email())
                ->from('oussemabelhajbb22@gmail.com')
                ->to($testEmail)
                ->subject('Test Email from Airmess')
                ->text('This is a direct test email using MailerInterface.')
                ->html('<p>This is a direct test email using MailerInterface.</p>');
            
            $this->mailer->send($email);
            $result['direct_mailer'] = 'Success: Email sent directly via MailerInterface';
        } catch (\Exception $e) {
            $result['direct_mailer'] = 'Error: ' . $e->getMessage();
            $result['direct_mailer_trace'] = $e->getTraceAsString();
        }
        
        // Test verification code sending
        try {
            $code = '123456';
            $success = $this->emailService->sendVerificationCode($testEmail, $code);
            if ($success) {
                $result['verification_code'] = 'Success: Verification code sent';
            } else {
                $result['verification_code'] = 'Error: EmailService returned false';
            }
        } catch (\Exception $e) {
            $result['verification_code'] = 'Error: ' . $e->getMessage();
            $result['verification_code_trace'] = $e->getTraceAsString();
        }
        
        return $this->render('test/email.html.twig', [
            'result' => $result,
        ]);
    }
}
