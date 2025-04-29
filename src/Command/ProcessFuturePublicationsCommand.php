<?php

namespace App\Command;

use App\Repository\PublicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ProcessFuturePublicationsCommand extends Command
{
    protected static $defaultName = 'app:process-future-publications';
    private $publicationRepository;
    private $em;

    public function __construct(PublicationRepository $publicationRepository, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->publicationRepository = $publicationRepository;
        $this->em = $em;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Traite les publications futures qui doivent être publiées')
            ->setHelp('Cette commande vérifie les publications futures et les publie si leur date est arrivée');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $now = new \DateTime();

        try {
            $futurePublications = $this->publicationRepository->findFuturePublications();
            $processed = 0;

            foreach ($futurePublications as $publication) {
                if ($publication->getPublicationDate() <= $now) {
                    $publication->setStatus('published');
                    $processed++;
                }
            }

            $this->em->flush();

            $io->success(sprintf('%d publications ont été traitées avec succès', $processed));
            return Command::SUCCESS;

        } catch (\Exception $e) {
            $io->error('Une erreur est survenue : ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
} 