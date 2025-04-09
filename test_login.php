<?php
// Simple script to test database connection and check users table

require dirname(__FILE__).'/vendor/autoload.php';
require dirname(__FILE__).'/config/bootstrap.php';

use Doctrine\DBAL\DriverManager;

try {
    // Get database credentials from .env file
    $dbUrl = $_ENV['DATABASE_URL'];
    $params = parse_url($dbUrl);
    
    $connectionParams = [
        'dbname' => ltrim($params['path'], '/'),
        'user' => $params['user'],
        'password' => $params['pass'],
        'host' => $params['host'],
        'driver' => 'pdo_mysql',
    ];
    
    $conn = DriverManager::getConnection($connectionParams);
    
    echo "Successfully connected to the database.\n";
    
    // Check if the users table exists and show its structure
    $stmt = $conn->prepare("SHOW COLUMNS FROM users");
    $resultSet = $stmt->executeQuery();
    $columns = $resultSet->fetchAll(\PDO::FETCH_ASSOC);
    
    echo "Columns in users table:\n";
    foreach ($columns as $column) {
        echo "- " . $column['Field'] . " (" . $column['Type'] . ")\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 