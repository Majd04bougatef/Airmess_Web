<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CaptchaController extends AbstractController
{
    #[Route('/verify-captcha', name: 'verify_captcha')]
    public function verifyCaptcha(Request $request, SessionInterface $session): Response
    {
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        
        // Verify with Google reCAPTCHA API
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $this->getParameter('recaptcha_secret_key'),
            'response' => $recaptchaResponse
        ];
        
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        
        if ($resultJson->success) {
            return new Response(json_encode(['success' => true]));
        }
        
        return new Response(json_encode(['success' => false, 'message' => 'Captcha verification failed']), 400);
    }
} 