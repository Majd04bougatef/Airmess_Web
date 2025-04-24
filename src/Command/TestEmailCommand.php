<?php

namespace App\Command;

use App\Entity\User;
use App\Service\EmailService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test-email',
    description: 'Test sending emails through the system',
)]
class TestEmailCommand extends Command
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email address to send the test to')
            ->addArgument('type', InputArgument::OPTIONAL, 'Type of email to send (welcome, verification, reset)', 'verification');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $emailAddress = $input->getArgument('email');
        $type = $input->getArgument('type');

        $io->note(sprintf('Preparing to send %s email to: %s', $type, $emailAddress));

        $success = false;
        switch ($type) {
            case 'welcome':
                // Create a temporary user object
                $user = new User();
                $user->setEmail($emailAddress);
                $user->setName('Test User');
                $user->setPrenom('Test');
                
                $success = $this->emailService->sendWelcomeEmail($user);
                break;
                
            case 'verification':
                $code = sprintf('%06d', mt_rand(0, 999999)); // Generate a 6-digit code
                $success = $this->emailService->sendVerificationCode($emailAddress, $code);
                $io->note(sprintf('Generated verification code: %s', $code));
                break;
                
            case 'reset':
                $code = sprintf('%06d', mt_rand(0, 999999)); // Generate a 6-digit code
                $success = $this->emailService->sendResetPasswordCode($emailAddress, $code);
                $io->note(sprintf('Generated reset code: %s', $code));
                break;
                
            default:
                $io->error(sprintf('Unknown email type: %s', $type));
                return Command::FAILURE;
        }

        if ($success) {
            $io->success(sprintf('Email sent successfully to %s', $emailAddress));
            return Command::SUCCESS;
        } else {
            $io->error(sprintf('Failed to send email to %s', $emailAddress));
            return Command::FAILURE;
        }
    }
} 