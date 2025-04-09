<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FixUserCommand extends Command
{
    protected static $defaultName = 'app:fix-users';
    protected static $defaultDescription = 'Fix users with missing required fields';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Fixing users with missing fields');

        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->findAll();
        
        $fixedCount = 0;
        foreach ($users as $user) {
            $changed = false;
            
            // Check and fix all required fields
            if (empty($user->getName())) {
                $user->setName('Default Name');
                $changed = true;
            }
            
            if (empty($user->getPrenom())) {
                $user->setPrenom('Default Prenom');
                $changed = true;
            }
            
            if (empty($user->getEmail())) {
                $user->setEmail('default' . uniqid() . '@example.com');
                $changed = true;
            }
            
            if (empty($user->getPassword())) {
                $user->setPassword('$2y$13$hMzxXt0QsA5DN6RPvzQeJuTEJxsYkuuxID5SNHUJHLZpv/0HtJ7QS'); // Default hashed password
                $changed = true;
            }
            
            if (empty($user->getRoleUser())) {
                $user->setRoleUser('ROLE_USER');
                $changed = true;
            }
            
            try {
                $user->getDateNaiss(); // This will throw an exception if not initialized
            } catch (\Throwable $e) {
                $user->setDateNaiss(new \DateTime());
                $changed = true;
            }
            
            if (empty($user->getPhoneNumber())) {
                $user->setPhoneNumber('0000000000');
                $changed = true;
            }
            
            try {
                $user->getStatut(); // This will throw an exception if not initialized
            } catch (\Throwable $e) {
                $user->setStatut('active');
                $changed = true;
            }
            
            try {
                $user->getDiamond(); // This will throw an exception if not initialized
            } catch (\Throwable $e) {
                $user->setDiamond(0);
                $changed = true;
            }
            
            try {
                $user->getDeleteFlag(); // This will throw an exception if not initialized
            } catch (\Throwable $e) {
                $user->setDeleteFlag(0);
                $changed = true;
            }
            
            if (empty($user->getImagesU())) {
                $user->setImagesU('default.jpg');
                $changed = true;
            }
            
            if ($changed) {
                $fixedCount++;
            }
        }
        
        $this->entityManager->flush();
        
        $io->success(sprintf('Fixed %d user(s).', $fixedCount));
        
        return Command::SUCCESS;
    }
} 