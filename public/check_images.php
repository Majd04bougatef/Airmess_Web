<?php
// List of images that need to be copied
$requiredImages = [
    'images/475494119_1136555244298328_1961476089771408060_n$$.png',
    'images/3d-casual-life-young-man-holding-paper-map.png',
    'images/logo-airmess.png',
    'images/AirMess-text.png'
];

echo "<h1>Image Status Check</h1>";
echo "<p>Please copy the following images from your JavaFX project at:<br>";
echo "<code>C:\\Users\\MSI\\Desktop\\Airmess\\src\\main\\resources\\image</code><br>";
echo "to your web project at:<br>";
echo "<code>C:\\Users\\MSI\\Desktop\\Airmess_Web\\public\\images</code></p>";

echo "<h2>Required Images:</h2>";
echo "<ul>";
foreach ($requiredImages as $image) {
    $filePath = __DIR__ . '/' . $image;
    $exists = file_exists($filePath);
    $status = $exists ? "✅ Found" : "❌ Missing";
    $statusColor = $exists ? "green" : "red";
    
    echo "<li>";
    echo "<span style='color: $statusColor; font-weight: bold;'>$status</span>: ";
    echo $image;
    echo "</li>";
}
echo "</ul>";

echo "<h2>Instructions:</h2>";
echo "<ol>";
echo "<li>For <code>475494119_1136555244298328_1961476089771408060_n$$.png</code> - Copy from JavaFX project</li>";
echo "<li>For <code>3d-casual-life-young-man-holding-paper-map.png</code> - Copy from JavaFX project</li>";
echo "<li>For <code>logo-airmess.png</code> - Copy your logo or add a placeholder</li>";
echo "<li>For <code>AirMess-text.png</code> - Copy your text logo or add a placeholder</li>";
echo "</ol>";

echo "<p>After copying the files, refresh your login page to see the images.</p>";
?> 