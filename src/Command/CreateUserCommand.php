<?php

namespace App\Command;

use App\Entity\User;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user',
)]
class CreateUserCommand extends Command
{
    private $entityManager;
    private $userService;

    public function __construct(EntityManagerInterface $entityManager, UserService $userService)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->userService = $userService;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'The email of the user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the user')
            ->addArgument('prenom', InputArgument::OPTIONAL, 'The first name of the user')
            ->addArgument('role', InputArgument::OPTIONAL, 'The role of the user (Voyageurs, Entreprise, ROLE_ADMIN)')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');
        $name = $input->getArgument('name');
        $prenom = $input->getArgument('prenom') ?? 'John';
        $role = $input->getArgument('role') ?? 'Voyageurs';

        $user = new User();
        $user->setEmail($email);
        $user->setName($name);
        $user->setPrenom($prenom);
        $user->setRoleUser($role);
        $user->setStatut('active');
        $user->setPhoneNumber('12345');
        $user->setDateNaiss(new \DateTime());
        $user->setDiamond(0);
        $user->setDeleteFlag(0);
        $user->setImagesU('default.jpg');

        // Hash the password
        $hashedPassword = $this->userService->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success(sprintf('User with email %s has been created successfully!', $email));

        return Command::SUCCESS;
    }
} 