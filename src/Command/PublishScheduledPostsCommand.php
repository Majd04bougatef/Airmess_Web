<?php

namespace App\Command;

use App\Service\ScheduledPostPublisher;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:publish-scheduled-posts',
    description: 'Publie les posts planifiés qui sont prêts à être publiés'
)]
class PublishScheduledPostsCommand extends Command
{
    public function __construct(
        private ScheduledPostPublisher $publisher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Début de la publication des posts planifiés...');
        
        try {
            $this->publisher->publishScheduledPosts();
            $output->writeln('Publication des posts planifiés terminée avec succès.');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('Erreur lors de la publication des posts planifiés: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
} 