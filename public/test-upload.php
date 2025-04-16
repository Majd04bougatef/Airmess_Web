<?php
// Test script for file uploads

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$uploadDir = __DIR__ . '/uploads/expenses/';

// Create upload directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$uploadStatus = '';
$uploadedFile = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['testFile'])) {
    if ($_FILES['testFile']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['testFile']['tmp_name'];
        $fileName = basename($_FILES['testFile']['name']);
        $newFileName = 'test-' . uniqid() . '-' . $fileName;
        
        if (move_uploaded_file($tmpName, $uploadDir . $newFileName)) {
            $uploadStatus = 'success';
            $uploadedFile = $uploadDir . $newFileName;
        } else {
            $uploadStatus = 'error';
            $uploadError = 'Failed to move uploaded file';
        }
    } else {
        $uploadStatus = 'error';
        switch ($_FILES['testFile']['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $uploadError = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $uploadError = 'The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form';
                break;
            case UPLOAD_ERR_PARTIAL:
                $uploadError = 'The uploaded file was only partially uploaded';
                break;
            case UPLOAD_ERR_NO_FILE:
                $uploadError = 'No file was uploaded';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $uploadError = 'Missing a temporary folder';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $uploadError = 'Failed to write file to disk';
                break;
            case UPLOAD_ERR_EXTENSION:
                $uploadError = 'A PHP extension stopped the file upload';
                break;
            default:
                $uploadError = 'Unknown upload error';
                break;
        }
    }
}

// Check server and directory configurations
$serverConfig = [
    'PHP Version' => phpversion(),
    'post_max_size' => ini_get('post_max_size'),
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'max_file_uploads' => ini_get('max_file_uploads'),
    'file_uploads' => ini_get('file_uploads') ? 'Enabled' : 'Disabled',
    'upload_tmp_dir' => ini_get('upload_tmp_dir') ?: 'Default',
    'max_input_time' => ini_get('max_input_time'),
    'max_execution_time' => ini_get('max_execution_time'),
];

$dirInfo = [
    'Upload Directory' => $uploadDir,
    'Directory Exists' => is_dir($uploadDir) ? 'Yes' : 'No',
    'Directory Writable' => is_writable($uploadDir) ? 'Yes' : 'No',
];

?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP File Upload Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1>PHP File Upload Test</h1>
        
        <?php if ($uploadStatus === 'success'): ?>
            <div class="alert alert-success">
                File uploaded successfully to: <?= htmlspecialchars($uploadedFile) ?>
            </div>
        <?php elseif ($uploadStatus === 'error'): ?>
            <div class="alert alert-danger">
                Upload failed: <?= htmlspecialchars($uploadError) ?>
            </div>
        <?php endif; ?>
        
        <div class="card mb-4">
            <div class="card-header">
                <h5>Upload Test Form</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="testFile" class="form-label">Select a file to upload</label>
                        <input type="file" name="testFile" id="testFile" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <h5>Server Configuration</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <?php foreach ($serverConfig as $key => $value): ?>
                    <tr>
                        <th><?= htmlspecialchars($key) ?></th>
                        <td><?= htmlspecialchars($value) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-header">
                <h5>Directory Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <?php foreach ($dirInfo as $key => $value): ?>
                    <tr>
                        <th><?= htmlspecialchars($key) ?></th>
                        <td><?= htmlspecialchars($value) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html> 