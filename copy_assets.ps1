# Define source and destination paths
$sourceRoot = "C:\Users\MSI\Desktop\UpConstruction"
$destRoot = "C:\Users\MSI\Desktop\Airmess_Web"

Write-Host "Starting to copy assets from UpConstruction template to Airmess_Web project..." -ForegroundColor Green

# Create destination directories if they don't exist
$directories = @(
    "assets",
    "assets/vendor",
    "assets/vendor/bootstrap",
    "assets/vendor/bootstrap/css",
    "assets/vendor/bootstrap/js",
    "assets/vendor/bootstrap-icons",
    "assets/vendor/bootstrap-icons/fonts",
    "assets/vendor/fontawesome-free",
    "assets/vendor/fontawesome-free/css",
    "assets/vendor/fontawesome-free/webfonts",
    "assets/vendor/aos",
    "assets/vendor/glightbox",
    "assets/vendor/glightbox/css",
    "assets/vendor/glightbox/js",
    "assets/vendor/isotope-layout",
    "assets/vendor/swiper",
    "assets/vendor/purecounter",
    "assets/vendor/php-email-form",
    "assets/css",
    "assets/js",
    "assets/img"
)

foreach ($dir in $directories) {
    $path = Join-Path -Path $destRoot -ChildPath $dir
    if (-not (Test-Path -Path $path)) {
        New-Item -ItemType Directory -Path $path -Force
        Write-Host "Created directory: $path" -ForegroundColor Yellow
    }
}

# Copy Bootstrap files
Write-Host "Copying Bootstrap files..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\bootstrap\css\bootstrap.min.css" -Destination "$destRoot\assets\vendor\bootstrap\css\"
Copy-Item "$sourceRoot\assets\vendor\bootstrap\js\bootstrap.bundle.min.js" -Destination "$destRoot\assets\vendor\bootstrap\js\"

# Copy Bootstrap Icons
Write-Host "Copying Bootstrap Icons..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\bootstrap-icons\bootstrap-icons.css" -Destination "$destRoot\assets\vendor\bootstrap-icons\"
Copy-Item "$sourceRoot\assets\vendor\bootstrap-icons\fonts\*" -Destination "$destRoot\assets\vendor\bootstrap-icons\fonts\" -Recurse

# Copy Font Awesome
Write-Host "Copying Font Awesome..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\fontawesome-free\css\all.min.css" -Destination "$destRoot\assets\vendor\fontawesome-free\css\"
Copy-Item "$sourceRoot\assets\vendor\fontawesome-free\webfonts\*" -Destination "$destRoot\assets\vendor\fontawesome-free\webfonts\" -Recurse

# Copy AOS (Animate On Scroll)
Write-Host "Copying AOS..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\aos\aos.css" -Destination "$destRoot\assets\vendor\aos\"
Copy-Item "$sourceRoot\assets\vendor\aos\aos.js" -Destination "$destRoot\assets\vendor\aos\"

# Copy GLightbox
Write-Host "Copying GLightbox..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\glightbox\css\glightbox.min.css" -Destination "$destRoot\assets\vendor\glightbox\css\"
Copy-Item "$sourceRoot\assets\vendor\glightbox\js\glightbox.min.js" -Destination "$destRoot\assets\vendor\glightbox\js\"

# Copy Isotope Layout
Write-Host "Copying Isotope Layout..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\isotope-layout\isotope.pkgd.min.js" -Destination "$destRoot\assets\vendor\isotope-layout\"

# Copy Swiper
Write-Host "Copying Swiper..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\swiper\swiper-bundle.min.css" -Destination "$destRoot\assets\vendor\swiper\"
Copy-Item "$sourceRoot\assets\vendor\swiper\swiper-bundle.min.js" -Destination "$destRoot\assets\vendor\swiper\"

# Copy PureCounter
Write-Host "Copying PureCounter..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\purecounter\purecounter_vanilla.js" -Destination "$destRoot\assets\vendor\purecounter\"

# Copy PHP Email Form
Write-Host "Copying PHP Email Form..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\vendor\php-email-form\validate.js" -Destination "$destRoot\assets\vendor\php-email-form\"

# Copy CSS and JS files
Write-Host "Copying CSS and JS files..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\css\main.css" -Destination "$destRoot\assets\css\"
Copy-Item "$sourceRoot\assets\js\main.js" -Destination "$destRoot\assets\js\"

# Copy images (you may want to select specific ones)
Write-Host "Copying images..." -ForegroundColor Cyan
Copy-Item "$sourceRoot\assets\img\*" -Destination "$destRoot\assets\img\" -Recurse

# Preserve existing Airmess logo
Write-Host "Ensuring Airmess logo is preserved..." -ForegroundColor Cyan
if (Test-Path "$destRoot\assets\images\logo-airmess.png") {
    if (-not (Test-Path "$destRoot\assets\img")) {
        New-Item -ItemType Directory -Path "$destRoot\assets\img" -Force
    }
    Copy-Item "$destRoot\assets\images\logo-airmess.png" -Destination "$destRoot\assets\img\" -Force
}

Write-Host "All assets have been copied successfully!" -ForegroundColor Green
Write-Host "The base.html.twig file has been updated to reference the correct asset paths." -ForegroundColor Green 