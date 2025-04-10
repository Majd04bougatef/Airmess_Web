<?php
// Script to create an admin user

// Database credentials
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

// Admin user credentials
$adminEmail = 'admin@example.com';
$adminPassword = 'admin123';
$adminName = 'Admin';
$adminPrenom = 'User';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to database successfully.\n";
    
    // Hash the password using PASSWORD_BCRYPT algorithm
    $hashedPassword = password_hash($adminPassword, PASSWORD_BCRYPT);
    echo "Generated hash: $hashedPassword\n";
    
    // Check if the admin user already exists
    $stmt = $pdo->prepare("SELECT id_U FROM users WHERE email = ?");
    $stmt->execute([$adminEmail]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($existingUser) {
        // Update the existing user
        $updateStmt = $pdo->prepare("UPDATE users SET password = ?, roleUser = 'ROLE_ADMIN' WHERE email = ?");
        $updateStmt->execute([$hashedPassword, $adminEmail]);
        echo "Updated existing admin user with ID: {$existingUser['id_U']}\n";
    } else {
        // Create a new admin user
        $insertStmt = $pdo->prepare("INSERT INTO users 
            (name, prenom, email, password, roleUser, dateNaiss, phoneNumber, statut, diamond, deleteFlag, imagesU) 
            VALUES (?, ?, ?, ?, 'ROLE_ADMIN', NOW(), '1234567890', 'active', 0, 0, 'default.jpg')");
        $insertStmt->execute([$adminName, $adminPrenom, $adminEmail, $hashedPassword]);
        $newUserId = $pdo->lastInsertId();
        echo "Created new admin user with ID: $newUserId\n";
    }
    
    echo "\nAdmin user created or updated:\n";
    echo "Email: $adminEmail\n";
    echo "Password: $adminPassword\n";
    echo "Role: ROLE_ADMIN\n";
    echo "\nYou can now log in with these credentials and access the admin area.\n";
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
} 