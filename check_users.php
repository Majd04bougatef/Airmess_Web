<?php
// Database credentials directly from .env
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Successfully connected to the database.\n";
    
    // Check all users in the database
    $stmt = $pdo->query("SELECT id_U, email, password, roleUser FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Found " . count($users) . " users:\n";
    foreach ($users as $user) {
        echo "- User ID: " . $user['id_U'] . "\n";
        echo "  Email: " . $user['email'] . "\n";
        echo "  Role: " . $user['roleUser'] . "\n";
        echo "  Password: " . (strlen($user['password']) > 10 ? 
            substr($user['password'], 0, 10) . "..." : $user['password']) . " (" . strlen($user['password']) . " chars)\n";
        
        // Check if password is properly hashed (bcrypt)
        if (substr($user['password'], 0, 4) === '$2y$') {
            echo "  Password format: Valid bcrypt hash\n";
        } else {
            echo "  Password format: NOT a bcrypt hash - THIS IS A PROBLEM\n";
        }
        echo "\n";
    }
    
    echo "NOTE: If passwords are not bcrypt hashes, they need to be properly hashed.\n";
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
} 