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
    name: 'app:test-twilio-sms',
    description: 'Test sending SMS with Twilio',
)]
class TestTwilioSmsCommand extends Command
{
    private $twilioService;
    
    public function __construct(TwilioService $twilioService)
    {
        parent::__construct();
        $this->twilioService = $twilioService;
    }
    
    protected function configure(): void
    {
        $this
            ->addArgument('phone', InputArgument::REQUIRED, 'Phone number to send SMS to')
            ->addArgument('message', InputArgument::REQUIRED, 'Message to send');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $phoneNumber = $input->getArgument('phone');
        $message = $input->getArgument('message');

        $io->note("Testing SMS to: {$phoneNumber}");
        $io->note("Message: {$message}");
        
        try {
            // Send the SMS using the service
            $result = $this->twilioService->sendSms($phoneNumber, $message);
            
            if ($result['success']) {
                $io->success("SMS sent successfully! SID: " . ($result['message_sid'] ?? 'N/A'));
                return Command::SUCCESS;
            } else {
                $io->error("Failed to send SMS: " . ($result['error'] ?? 'Unknown error'));
                return Command::FAILURE;
            }
            
        } catch (\Exception $e) {
            $io->error("Exception occurred: " . $e->getMessage());
            return Command::FAILURE;
        }
    }
} 