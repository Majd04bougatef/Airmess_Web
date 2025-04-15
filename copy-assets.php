<?php
/**
 * Asset Copier Script
 * This script copies files from the assets directory to the public directory
 * so they are accessible to website visitors.
 */

// Configuration
$sourceDir = __DIR__ . '/assets';
$targetDir = __DIR__ . '/public';

// Directories to copy (relative to assets directory)
$directoriesToCopy = [
    'images' => 'images',
    'css' => 'css',
    'js' => 'js',
    'fonts' => 'fonts',
];

echo "Starting asset copy process...\n";

// Create directories if they don't exist
foreach ($directoriesToCopy as $sourceSubDir => $targetSubDir) {
    $fullTargetDir = $targetDir . '/' . $targetSubDir;
    if (!is_dir($fullTargetDir)) {
        echo "Creating directory: $fullTargetDir\n";
        mkdir($fullTargetDir, 0755, true);
    }
}

// Copy files
$totalFilesCopied = 0;

foreach ($directoriesToCopy as $sourceSubDir => $targetSubDir) {
    $fullSourceDir = $sourceDir . '/' . $sourceSubDir;
    $fullTargetDir = $targetDir . '/' . $targetSubDir;
    
    if (!is_dir($fullSourceDir)) {
        echo "Warning: Source directory does not exist: $fullSourceDir\n";
        continue;
    }
    
    echo "Copying files from $fullSourceDir to $fullTargetDir\n";
    
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($fullSourceDir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($iterator as $item) {
        if ($item->isDir()) {
            $relativePath = substr($item->getPathname(), strlen($fullSourceDir) + 1);
            $subDir = $fullTargetDir . '/' . $relativePath;
            if (!is_dir($subDir)) {
                echo "Creating subdirectory: $subDir\n";
                mkdir($subDir, 0755, true);
            }
        } else {
            $sourceFile = $item->getPathname();
            $relativePath = substr($sourceFile, strlen($fullSourceDir) + 1);
            $targetFile = $fullTargetDir . '/' . $relativePath;
            
            echo "Copying: " . $relativePath . "\n";
            copy($sourceFile, $targetFile);
            $totalFilesCopied++;
        }
    }
}

echo "Asset copy complete! Copied $totalFilesCopied files.\n";
echo "Assets are now available in the public directory and can be accessed via web.\n";
?> 