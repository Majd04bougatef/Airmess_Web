<?php
// Debug script to test password verification

// Load Symfony components
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

// Create a mock user that implements PasswordAuthenticatedUserInterface
class MockUser implements PasswordAuthenticatedUserInterface {
    private $password;
    
    public function __construct(string $password) {
        $this->password = $password;
    }
    
    public function getPassword(): ?string {
        return $this->password;
    }
}

// Database credentials
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

// Create password hasher with Symfony settings
$factory = new PasswordHasherFactory([
    'bcrypt' => [
        'algorithm' => 'bcrypt',
        'cost' => 13,
    ]
]);
$hasher = $factory->getPasswordHasher('bcrypt');

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to database successfully.\n\n";
    
    // Get all users
    $stmt = $pdo->query("SELECT id_U, email, password, roleUser FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Found " . count($users) . " users\n\n";
    
    // Test passwords
    $plainPassword = 'password123';
    echo "Plain password for testing: $plainPassword\n\n";
    
    // Generate a new hash
    $newHash = $hasher->hash($plainPassword);
    echo "New hash: $newHash\n\n";
    
    // Try to verify the password against some user passwords
    $count = 0;
    foreach ($users as $user) {
        if ($count >= 5) break; // Only check first 5 users
        
        $count++;
        $userPassword = $user['password'];
        $mockUser = new MockUser($userPassword);
        
        echo "User ID: " . $user['id_U'] . "\n";
        echo "Email: " . $user['email'] . "\n";
        echo "Role: " . $user['roleUser'] . "\n";
        echo "Stored Password: " . substr($userPassword, 0, 10) . "...\n";
        
        // Check if it starts with $2y$ (correct bcrypt format)
        if (substr($userPassword, 0, 4) === '$2y$') {
            echo "Password format: Valid bcrypt with \$2y\$ format\n";
        } else if (substr($userPassword, 0, 4) === '$2a$') {
            echo "Password format: Old bcrypt with \$2a\$ format (might cause issues)\n";
        } else {
            echo "Password format: Not recognized as bcrypt\n";
        }
        
        // Try to verify with a fixed password
        try {
            // Use the Symfony PasswordHasher to verify the password
            if (method_exists($hasher, 'verify')) {
                $isPasswordValid = $hasher->verify($userPassword, $plainPassword);
            } else {
                $isPasswordValid = $hasher->isPasswordValid($userPassword, $plainPassword);
            }
            echo "Password verification result: " . ($isPasswordValid ? "VALID" : "INVALID") . "\n";
        } catch (\Exception $e) {
            echo "Error verifying password: " . $e->getMessage() . "\n";
        }
        
        echo "---------------------\n";
    }
    
    // Test verification with a known hash
    echo "\nTesting verification with a new hash:\n";
    // Use the Symfony PasswordHasher to verify against the new hash
    if (method_exists($hasher, 'verify')) {
        $isValidNew = $hasher->verify($newHash, $plainPassword);
    } else {
        $isValidNew = $hasher->isPasswordValid($newHash, $plainPassword);
    }
    echo "Verification result: " . ($isValidNew ? "VALID" : "INVALID") . "\n";
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 