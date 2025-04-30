<?php

namespace App\Controller;

use App\Service\TwilioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    private TwilioService $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    #[Route('/admin/sms/test', name: 'app_sms_test')]
    public function testSms(): Response
    {
        // Always show the form regardless of credentials
        return $this->render('sms/test.html.twig', [
            'message' => 'Configure your Twilio test below',
        ]);
    }

    #[Route('/admin/sms/send', name: 'app_sms_send', methods: ['POST'])]
    public function sendSms(Request $request): Response
    {
        $to = $request->request->get('to');
        $message = $request->request->get('message');

        if (!$to || !$message) {
            $this->addFlash('error', 'Phone number and message are required.');
            return $this->redirectToRoute('app_sms_test');
        }

        // Create a direct TwilioService with hardcoded credentials
        $directService = new TwilioService(
            'ACdad3c4bd21811b3fc1e1f6508c9b6025',
            '66b251e37ab9363ef1fac0b02c6422e7',
            '+19133983562'
        );

        // Send SMS
        $result = $directService->sendSms($to, $message);

        if ($result['success']) {
            $this->addFlash('success', 'SMS sent successfully! SID: ' . ($result['message_sid'] ?? 'N/A'));
        } else {
            $this->addFlash('error', 'Failed to send SMS: ' . ($result['error'] ?? 'Unknown error'));
        }

        return $this->redirectToRoute('app_sms_test');
    }

    #[Route('/admin/sms/verify', name: 'app_sms_verify')]
    public function verifyPage(): Response
    {
        return $this->render('sms/verify.html.twig', [
            'message' => 'Enter a phone number to send a verification code',
        ]);
    }

    #[Route('/admin/sms/send-verification', name: 'app_sms_send_verification', methods: ['POST'])]
    public function sendVerification(Request $request): Response
    {
        $to = $request->request->get('to');

        if (!$to) {
            $this->addFlash('error', 'Phone number is required.');
            return $this->redirectToRoute('app_sms_verify');
        }

        // Generate random 6-digit code
        $code = sprintf('%06d', random_int(0, 999999));

        // Create a direct TwilioService with hardcoded credentials
        $directService = new TwilioService(
            'ACdad3c4bd21811b3fc1e1f6508c9b6025',
            '66b251e37ab9363ef1fac0b02c6422e7',
            '+19133983562'
        );

        // Send verification code via SMS
        $result = $directService->sendVerificationCode($to, $code);

        if ($result['success']) {
            // In a real application, you would store this code in the session or database
            // For demonstration purposes, we'll just display it
            $this->addFlash('success', "Verification code sent successfully! Code: $code");
        } else {
            $this->addFlash('error', 'Failed to send verification code: ' . ($result['error'] ?? 'Unknown error'));
        }

        return $this->redirectToRoute('app_sms_verify');
    }

    #[Route('/admin/sms/test-deactivation', name: 'app_sms_test_deactivation')]
    public function testDeactivationSms(): Response
    {
        // Test sending SMS to the admin number
        $adminNumber = '+21620981776';
        $adminMessage = "AIRMESS ADMIN NOTIFICATION: Un compte utilisateur test a été désactivé - Test Utilisateur (ID: 123, Email: test@example.com)";
        
        $adminResult = $this->twilioService->sendSms($adminNumber, $adminMessage);
        
        if ($adminResult['success']) {
            $this->addFlash('success', 'SMS de notification admin envoyé avec succès! SID: ' . ($adminResult['message_sid'] ?? 'N/A'));
        } else {
            $this->addFlash('error', 'Échec de l\'envoi du SMS admin: ' . ($adminResult['error'] ?? 'Erreur inconnue'));
        }
        
        return $this->render('sms/test.html.twig', [
            'message' => 'Test de notification de désactivation de compte',
            'adminResult' => $adminResult
        ]);
    }
} 