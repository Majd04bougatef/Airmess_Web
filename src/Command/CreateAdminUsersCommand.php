<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-admin-users',
    description: 'Creates 5 admin users with predefined names',
)]
class CreateAdminUsersCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        $adminUsers = [
            [
                'name' => 'Oussema',
                'prenom' => 'Ben Elhaj',
                'email' => 'oussema.benelhaj@admin.com',
                'password' => 'admin123',
                'phone' => '12345678'
            ],
            [
                'name' => 'Majd',
                'prenom' => 'Boughatef',
                'email' => 'majd.boughatef@admin.com',
                'password' => 'admin123',
                'phone' => '12345678'
            ],
            [
                'name' => 'Arij',
                'prenom' => 'Talhaoui',
                'email' => 'arij.talhaoui@admin.com',
                'password' => 'admin123',
                'phone' => '12345678'
            ],
            [
                'name' => 'Meriam',
                'prenom' => 'Belghith',
                'email' => 'meriam.belghith@admin.com',
                'password' => 'admin123',
                'phone' => '12345678'
            ],
            [
                'name' => 'Elaa',
                'prenom' => 'Mahmoudi',
                'email' => 'elaa.mahmoudi@admin.com',
                'password' => 'admin123',
                'phone' => '12345678'
            ],
        ];
        
        foreach ($adminUsers as $adminData) {
            // Check if user already exists
            $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $adminData['email']]);
            
            if ($existingUser) {
                $io->note(sprintf('Admin user %s %s already exists', $adminData['name'], $adminData['prenom']));
                continue;
            }
            
            $user = new User();
            $user->setName($adminData['name']);
            $user->setPrenom($adminData['prenom']);
            $user->setEmail($adminData['email']);
            $user->setPhoneNumber($adminData['phone']);
            
            // Hash password
            $hashedPassword = password_hash($adminData['password'], PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);
            
            // Set admin-specific fields
            $user->setRoleUser('Admin');
            $user->setStatut('active');
            $user->setDiamond(0);
            $user->setDeleteFlag(0);
            $user->setDateNaiss(new \DateTime());
            $user->setImagesU('admin-default.jpg'); // Default image for admins
            
            $this->entityManager->persist($user);
            
            $io->success(sprintf('Admin user %s %s created!', $adminData['name'], $adminData['prenom']));
        }
        
        $this->entityManager->flush();
        
        $io->success('All admin users have been created or already exist.');

        return Command::SUCCESS;
    }
} 