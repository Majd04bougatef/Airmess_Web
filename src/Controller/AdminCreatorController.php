<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCreatorController extends AbstractController
{
    #[Route('/admin/create-admins', name: 'app_create_admins')]
    public function createAdmins(EntityManagerInterface $entityManager): Response
    {
        $adminsCreated = [];
        $adminsExisting = [];
        
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
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $adminData['email']]);
            
            if ($existingUser) {
                $adminsExisting[] = $adminData['name'] . ' ' . $adminData['prenom'];
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
            
            $entityManager->persist($user);
            $adminsCreated[] = $adminData['name'] . ' ' . $adminData['prenom'];
        }
        
        $entityManager->flush();
        
        return $this->render('admin/admins_created.html.twig', [
            'admins_created' => $adminsCreated,
            'admins_existing' => $adminsExisting
        ]);
    }
} 