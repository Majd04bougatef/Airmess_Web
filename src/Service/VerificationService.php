<?php

namespace App\Service;

use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;

class VerificationService
{
    private $emailService;
    private $requestStack;

    public function __construct(
        EmailService $emailService,
        RequestStack $requestStack
    ) {
        $this->emailService = $emailService;
        $this->requestStack = $requestStack;
    }

    /**
     * Generate a verification code for a user
     */
    public function generateCode(string $email): string
    {
        // Generate a new 6-digit code
        $code = sprintf('%06d', mt_rand(0, 999999));
        
        // Store verification data in session
        $verificationData = [
            'code' => $code,
            'email' => $email,
            'created_at' => time(),
            'expires_at' => time() + 120 // 2 minutes
        ];
        
        $session = $this->requestStack->getSession();
        $session->set('verification_data', $verificationData);
        
        return $code;
    }

    /**
     * Send verification code via email
     */
    public function sendVerificationCode(string $emailAddress, string $code): bool
    {
        return $this->emailService->sendVerificationCode($emailAddress, $code);
    }

    /**
     * Verify a code for an email
     */
    public function verifyCode(string $email, string $code): bool
    {
        $session = $this->requestStack->getSession();
        $verificationData = $session->get('verification_data');
        
        if (!$verificationData) {
            return false;
        }
        
        // Check if code matches and is for the correct email
        if ($verificationData['code'] !== $code || $verificationData['email'] !== $email) {
            return false;
        }
        
        // Check if code is expired
        if ($verificationData['expires_at'] < time()) {
            return false;
        }
        
        // Mark as verified by removing the verification data
        $session->remove('verification_data');
        
        return true;
    }
    
    /**
     * Get remaining time for verification code in seconds
     */
    public function getRemainingTime(): int
    {
        $session = $this->requestStack->getSession();
        $verificationData = $session->get('verification_data');
        
        if (!$verificationData || !isset($verificationData['expires_at'])) {
            return 0;
        }
        
        $remainingTime = $verificationData['expires_at'] - time();
        return $remainingTime > 0 ? $remainingTime : 0;
    }
} 