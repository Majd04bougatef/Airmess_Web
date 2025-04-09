<?php
// Script to fix password hashing for all users

// Load Symfony components
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

// Create a test password
$testPassword = 'password123';

// Database credentials
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

// Create a password hasher factory with Symfony's default settings
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
    
    echo "Successfully connected to the database.\n";
    echo "Creating a new bcrypt hash for password '$testPassword': " . $hasher->hash($testPassword) . "\n\n";
    
    // Let's create a test user with proper password
    echo "Creating a test user with proper password hash...\n";
    $testEmail = 'test@example.com';
    $hashedPassword = $hasher->hash($testPassword);
    
    // Check if the test user already exists
    $stmt = $pdo->prepare("SELECT id_U FROM users WHERE email = ?");
    $stmt->execute([$testEmail]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        // Update existing test user
        $updateStmt = $pdo->prepare("UPDATE users SET password = ?, roleUser = 'ROLE_USER' WHERE email = ?");
        $updateStmt->execute([$hashedPassword, $testEmail]);
        echo "Updated existing test user (ID: {$existingUser['id_U']}) with new password.\n";
    } else {
        // Create a new test user
        $insertStmt = $pdo->prepare("INSERT INTO users (name, prenom, email, password, roleUser, dateNaiss, phoneNumber, statut, diamond, deleteFlag, imagesU) 
            VALUES ('Test', 'User', ?, ?, 'ROLE_USER', NOW(), '1234567890', 'active', 0, 0, 'default.jpg')");
        $insertStmt->execute([$testEmail, $hashedPassword]);
        echo "Created new test user with email: $testEmail and password: $testPassword\n";
    }
    
    echo "\nYou can now try to login with:\n";
    echo "Email: $testEmail\n";
    echo "Password: $testPassword\n";
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 