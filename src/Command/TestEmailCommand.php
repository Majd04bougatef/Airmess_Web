<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(
    name: 'app:test-email',
    description: 'Tests email sending functionality',
)]
class TestEmailCommand extends Command
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Email Testing Command');

        // Output the current mailer DSN from .env
        $io->section('Current Mailer Configuration');
        $io->text('MAILER_DSN: ' . $_ENV['MAILER_DSN'] ?? 'Not found in environment');

        try {
            $email = (new Email())
                ->from('oussemabelhajbb22@gmail.com')
                ->to('oussemabelhajbb22@gmail.com') // Sending to self for testing
                ->subject('Test Email from Airmess')
                ->text('This is a test email to verify the email sending functionality.')
                ->html('<p>This is a test email to verify the <strong>email sending functionality</strong>.</p>');

            $io->note('Attempting to send test email...');
            $this->mailer->send($email);
            $io->success('Test email sent successfully!');
            
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $io->error('Failed to send email: ' . $e->getMessage());
            $io->text('Stack trace: ' . $e->getTraceAsString());
            
            return Command::FAILURE;
        }
    }
} 