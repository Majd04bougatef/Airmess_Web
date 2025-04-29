<?php

namespace App\Command;

use App\Repository\SocialMediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ProcessFutureSocialMediaCommand extends Command
{
    protected static $defaultName = 'app:process-future-social-media';
    private $socialMediaRepository;
    private $em;

    public function __construct(SocialMediaRepository $socialMediaRepository, EntityManagerInterface $em)
    {
        parent::__construct();
        $this->socialMediaRepository = $socialMediaRepository;
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
            $futurePublications = $this->socialMediaRepository->findFuturePublications();
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