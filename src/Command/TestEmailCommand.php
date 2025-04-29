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
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;

#[AsCommand(
    name: 'app:test-email',
    description: 'Test sending an email to a specific address',
)]
class TestEmailCommand extends Command
{
    private $emailService;
    private $mailer;

    public function __construct(EmailService $emailService, MailerInterface $mailer)
    {
        parent::__construct();
        $this->emailService = $emailService;
        $this->mailer = $mailer;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email address to send the test to')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');

        $io->note(sprintf('Testing email to: %s', $email));

        // Create a test user
        $user = new User();
        $user->setEmail($email);
        $user->setName('Test');
        $user->setPrenom('User');

        $io->info('Sending reactivation email...');
        
        try {
            // Try with the standard EmailService first
            $result = $this->emailService->sendReactivationEmail($user);
            
            if ($result) {
                $io->success('Email sent successfully!');
                return Command::SUCCESS;
            } else {
                $io->warning('Failed to send email with standard EmailService. Trying direct method...');
                
                // Try to use a simpler approach to test email functionality
                $io->info('Checking your email configuration...');
                
                // Get the MAILER_DSN from .env file
                $mailerDsn = $_ENV['MAILER_DSN'] ?? null;
                if (!$mailerDsn) {
                    $io->error('MAILER_DSN is not configured in your .env file');
                    return Command::FAILURE;
                }
                
                $io->info('Your MAILER_DSN is: ' . $mailerDsn);
                
                // Check if we can create a simple test email using the built-in Symfony mailer
                $testEmail = (new Email())
                    ->from('test@airmess.com')
                    ->to($email)
                    ->subject('Test Email from Airmess Command')
                    ->text('This is a test email from the Airmess test command.')
                    ->html('<p>This is a test email from the Airmess test command.</p>');
                
                // Send the email and show detailed error if it fails
                try {
                    $this->mailer->send($testEmail);
                    $io->success('Direct test email sent successfully!');
                    return Command::SUCCESS;
                } catch (\Exception $innerException) {
                    $io->error('Error sending direct test email: ' . $innerException->getMessage());
                    
                    // Give advice on fixing the email configuration
                    $io->section('Email Configuration Help');
                    $io->text([
                        'It looks like there might be an issue with your email configuration.',
                        '',
                        'Common solutions:',
                        '1. Check your MAILER_DSN in the .env file',
                        '2. If using Gmail, make sure to use an App Password instead of your regular password',
                        '3. Some email providers require SSL certificate verification',
                        '4. Make sure your outgoing mail port is not blocked by a firewall',
                        '',
                        'For testing purposes, you can try:',
                        '- Using Mailtrap.io for testing (free)',
                        '- Using Symfony\'s built-in null mailer: MAILER_DSN=null://null',
                    ]);
                    return Command::FAILURE;
                }
            }
        } catch (\Exception $e) {
            $io->error('Error: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
} 