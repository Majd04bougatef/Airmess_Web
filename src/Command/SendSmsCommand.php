<?php

namespace App\Command;

use App\Service\TwilioService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:send-sms',
    description: 'Send an SMS message using Twilio',
)]
class SendSmsCommand extends Command
{
    private TwilioService $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        parent::__construct();
        $this->twilioService = $twilioService;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('to', InputArgument::REQUIRED, 'Recipient phone number (E.164 format)')
            ->addArgument('message', InputArgument::REQUIRED, 'SMS message content')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $to = $input->getArgument('to');
        $message = $input->getArgument('message');

        $io->note(sprintf('Sending SMS to: %s', $to));

        // Create a new TwilioService with hardcoded credentials
        $directService = new TwilioService(
            'ACdad3c4bd21811b3fc1e1f6508c9b6025',
            '66b251e37ab9363ef1fac0b02c6422e7',
            '+19133983562'
        );

        $result = $directService->sendSms($to, $message);

        if ($result['success']) {
            $io->success(sprintf('SMS sent successfully! SID: %s', $result['message_sid'] ?? 'N/A'));
            return Command::SUCCESS;
        } else {
            $io->error(sprintf('Failed to send SMS: %s', $result['error'] ?? 'Unknown error'));
            return Command::FAILURE;
        }
    }
} 