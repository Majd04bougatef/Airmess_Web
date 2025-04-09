<?php
// Script to create a test user with a known password

// Database credentials
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

// Test user credentials
$testEmail = 'testuser@example.com';
$testPassword = 'password123';
$testName = 'Test';
$testPrenom = 'User';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to database successfully.\n";
    
    // Hash the password using PASSWORD_BCRYPT algorithm directly
    // This creates a bcrypt hash that Symfony will recognize
    $hashedPassword = password_hash($testPassword, PASSWORD_BCRYPT);
    echo "Generated hash: $hashedPassword\n";
    
    // Check if the test user already exists
    $stmt = $pdo->prepare("SELECT id_U FROM users WHERE email = ?");
    $stmt->execute([$testEmail]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        // Update the existing user
        $updateStmt = $pdo->prepare("UPDATE users SET password = ?, roleUser = 'ROLE_USER' WHERE email = ?");
        $updateStmt->execute([$hashedPassword, $testEmail]);
        echo "Updated existing user with ID: {$existingUser['id_U']}\n";
    } else {
        // Create a new user
        $insertStmt = $pdo->prepare("INSERT INTO users 
            (name, prenom, email, password, roleUser, dateNaiss, phoneNumber, statut, diamond, deleteFlag, imagesU) 
            VALUES (?, ?, ?, ?, 'ROLE_USER', NOW(), '1234567890', 'active', 0, 0, 'default.jpg')");
        $insertStmt->execute([$testName, $testPrenom, $testEmail, $hashedPassword]);
        $newUserId = $pdo->lastInsertId();
        echo "Created new user with ID: $newUserId\n";
    }
    
    echo "\nTest user created or updated:\n";
    echo "Email: $testEmail\n";
    echo "Password: $testPassword\n";
    echo "Please try to login with these credentials.\n";
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
} 