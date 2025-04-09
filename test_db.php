<?php
// Enable error display
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialize log file
$logFile = __DIR__ . '/db_update.log';
file_put_contents($logFile, "Database Update Log - " . date('Y-m-d H:i:s') . "\n\n");

function log_message($message) {
    global $logFile;
    $message .= "\n";
    file_put_contents($logFile, $message, FILE_APPEND);
    echo $message; // Also output to console
}

// Database credentials directly from .env
$dbHost = '127.0.0.1';
$dbName = 'airmess';
$dbUser = 'root';
$dbPass = '';

log_message("Connecting to database: mysql:host=$dbHost;dbname=$dbName, user=$dbUser");

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    log_message("Successfully connected to the database.");
    
    // Check if the users table exists and show its structure
    log_message("Querying for table columns...");
    $stmt = $pdo->query("SHOW COLUMNS FROM users");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    log_message("Found " . count($columns) . " columns in users table:");
    foreach ($columns as $column) {
        log_message("- " . $column['Field'] . " (" . $column['Type'] . ")");
    }
    
    // Check for specific missing columns
    $foundBusinessType = false;
    $foundCompanyDescription = false;
    $foundResetToken = false;
    $foundResetTokenExpires = false;
    
    foreach ($columns as $column) {
        if ($column['Field'] === 'businessType') $foundBusinessType = true;
        if ($column['Field'] === 'companyDescription') $foundCompanyDescription = true;
        if ($column['Field'] === 'resetToken') $foundResetToken = true;
        if ($column['Field'] === 'resetTokenExpires') $foundResetTokenExpires = true;
    }
    
    // Add missing columns if needed
    if (!$foundBusinessType) {
        log_message("Adding missing column: businessType");
        $pdo->exec("ALTER TABLE users ADD businessType VARCHAR(50) DEFAULT NULL");
    } else {
        log_message("Column businessType already exists.");
    }
    
    if (!$foundCompanyDescription) {
        log_message("Adding missing column: companyDescription");
        $pdo->exec("ALTER TABLE users ADD companyDescription TEXT DEFAULT NULL");
    } else {
        log_message("Column companyDescription already exists.");
    }
    
    if (!$foundResetToken) {
        log_message("Adding missing column: resetToken");
        $pdo->exec("ALTER TABLE users ADD resetToken VARCHAR(255) DEFAULT NULL");
    } else {
        log_message("Column resetToken already exists.");
    }
    
    if (!$foundResetTokenExpires) {
        log_message("Adding missing column: resetTokenExpires");
        $pdo->exec("ALTER TABLE users ADD resetTokenExpires DATETIME DEFAULT NULL");
    } else {
        log_message("Column resetTokenExpires already exists.");
    }
    
    log_message("Database update complete.");
    
} catch (PDOException $e) {
    log_message("Database Error: " . $e->getMessage());
} 