<?php
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["assignment"])) {
    $file = $_FILES["assignment"];
    $fileName = basename($file["name"]);
    $targetFile = $uploadDir . time() . "_" . $fileName;

    // Get allowed file types from teacher's settings
    $allowedTypes = file_exists('allowed_types.txt') ? explode(',', file_get_contents('allowed_types.txt')) : ['pdf'];
    $allowedTypes = array_map('trim', $allowedTypes); // Clean up whitespace
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Map extensions to MIME types (add more as needed)
    $mimeTypes = [
        'pdf' => 'application/pdf',
        'html' => 'text/html',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'txt' => 'text/plain'
    ];

    $allowedMimeTypes = [];
    foreach ($allowedTypes as $ext) {
        if (isset($mimeTypes[$ext])) {
            $allowedMimeTypes[] = $mimeTypes[$ext];
        }
    }

    $maxSize = 10 * 1024 * 1024; // 10MB
    if (in_array($file["type"], $allowedMimeTypes) && in_array($fileExt, $allowedTypes) && $file["size"] <= $maxSize) {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            echo "<script>alert('Assignment uploaded successfully!'); window.location='index.html';</script>";
        } else {
            echo "<script>alert('Error uploading assignment.'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid file type or size. Allowed types: " . implode(', ', $allowedTypes) . " (max 10MB).'); window.location='index.html';</script>";
    }
}
?>
