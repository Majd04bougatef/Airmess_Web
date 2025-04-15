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
            $io->error('Failed to send test email: ' . $e->getMessage());
            $io->section('Exception Type');
            $io->text(get_class($e));
            
            $io->section('Stack Trace (First Few Lines)');
            $stackTrace = explode("\n", $e->getTraceAsString());
            foreach (array_slice($stackTrace, 0, 10) as $line) {
                $io->text($line);
            }
            
            // Suggestion for possible fixes
            $io->section('Possible Solutions');
            $io->listing([
                'Check if the Gmail account has allowed "Less secure app access" or is using App Password',
                'Verify that the SMTP credentials are correct',
                'Make sure the Gmail account is not blocked for suspicious activity',
                'Try changing port from 587 to 465 with ssl:// instead of smtp://',
                'Check your firewall settings to ensure SMTP traffic is allowed'
            ]);
            
            return Command::FAILURE;
        }
    }
} 