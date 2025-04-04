<?php



namespace App\Service;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    private $passwordHasher;
    private $entityManager;

    public function __construct(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    public function createUser(string $email, string $plainPassword): User
    {
        $user = new User();
        $user->setEmail($email);

        // Hash the password
        $hashedPassword = $this->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);

        // Save the user to the database
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function hashPassword(User $user, string $plainPassword): string
    {
        return $this->passwordHasher->hashPassword($user, $plainPassword);
    }
}

?>