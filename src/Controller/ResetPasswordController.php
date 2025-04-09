<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordFormType;
use App\Form\ResetPasswordRequestFormType;
use App\Repository\UserRepository;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\HttpFoundation\RequestStack;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    private $entityManager;
    private $userRepository;
    private $userService;
    private $requestStack;
    
    public function __construct(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        UserService $userService,
        RequestStack $requestStack
    ) {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->requestStack = $requestStack;
    }

    #[Route('', name: 'app_forgot_password')]
    public function request(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->processSendingPasswordResetEmail(
                $form->get('email')->getData(),
                $mailer
            );
        }

        return $this->render('reset_password/request.html.twig', [
            'requestForm' => $form->createView(),
        ]);
    }

    #[Route('/check-email', name: 'app_check_email')]
    public function checkEmail(): Response
    {
        return $this->render('reset_password/check_email.html.twig');
    }

    #[Route('/reset/{token}', name: 'app_reset_password')]
    public function reset(Request $request, string $token = null): Response
    {
        if ($token) {
            // Store the token in session and redirect to the password reset form
            $this->storeTokenInSession($token);

            return $this->redirectToRoute('app_reset_password');
        }

        $token = $this->getTokenFromSession();
        if (null === $token) {
            throw $this->createNotFoundException('No reset password token found in the URL or in the session.');
        }

        try {
            $user = $this->getUserByResetToken($token);
        } catch (UserNotFoundException $e) {
            $this->addFlash('reset_password_error', 'The link appears to be invalid or expired.');

            return $this->redirectToRoute('app_forgot_password');
        }

        // The token is valid; allow the user to change their password.
        $form = $this->createForm(ChangePasswordFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // A password reset token should be used only once, remove it.
            $this->removeResetToken($user);

            // Encode the plain password
            $hashedPassword = $this->userService->hashPassword(
                $user,
                $form->get('plainPassword')->getData()
            );
            $user->setPassword($hashedPassword);
            $this->entityManager->flush();

            // The session is cleaned up after the password has been changed.
            $this->cleanSessionAfterReset();

            $this->addFlash('success', 'Your password has been reset successfully. You can now log in.');

            return $this->redirectToRoute('login');
        }

        return $this->render('reset_password/reset.html.twig', [
            'resetForm' => $form->createView(),
        ]);
    }

    private function processSendingPasswordResetEmail(string $emailFormData, MailerInterface $mailer): Response
    {
        $user = $this->userRepository->findOneByEmail($emailFormData);

        if (!$user) {
            $this->addFlash('reset_password_error', 'We could not find an account with that email.');
            return $this->redirectToRoute('app_forgot_password');
        }

        // Generate a unique reset token for this user
        $resetToken = bin2hex(random_bytes(16));
        $user->setResetToken($resetToken);
        $user->setResetTokenExpires(new \DateTime('+1 hour'));
        $this->entityManager->flush();

        $email = (new TemplatedEmail())
            ->from(new Address('noreply@airmess.com', 'Airmess'))
            ->to($user->getEmail())
            ->subject('Your password reset request')
            ->htmlTemplate('reset_password/email.html.twig')
            ->context([
                'resetToken' => $resetToken,
                'user' => $user,
            ]);

        $mailer->send($email);

        return $this->redirectToRoute('app_check_email');
    }

    /**
     * Get a user from their reset token
     */
    private function getUserByResetToken(string $token): User
    {
        $user = $this->userRepository->findOneBy([
            'resetToken' => $token,
            'resetTokenExpires' => ['>=', new \DateTime()],
        ]);

        if (!$user) {
            throw new UserNotFoundException('No user found for the given reset token or token has expired.');
        }

        return $user;
    }

    /**
     * Remove reset token from user
     */
    private function removeResetToken(User $user): void
    {
        $user->setResetToken(null);
        $user->setResetTokenExpires(null);
        $this->entityManager->flush();
    }

    /**
     * Store token in session
     */
    private function storeTokenInSession(string $token): void
    {
        $this->requestStack->getSession()->set('reset_token', $token);
    }

    /**
     * Get token from session
     */
    private function getTokenFromSession(): ?string
    {
        return $this->requestStack->getSession()->get('reset_token');
    }

    /**
     * Clean session after reset
     */
    private function cleanSessionAfterReset(): void
    {
        $this->requestStack->getSession()->remove('reset_token');
    }
} 