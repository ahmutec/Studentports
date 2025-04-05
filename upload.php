<?php
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES["assignment"];
    $fileName = basename($file["name"]);
    $targetFile = $uploadDir . time() . "_" . $fileName;

    $allowedTypes = ['application/pdf'];
    $maxSize = 10 * 1024 * 1024; // 10MB
    if (in_array($file["type"], $allowedTypes) && $file["size"] <= $maxSize) {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            echo "<script>alert('Assignment uploaded successfully!'); window.location='index.html';</script>";
        } else {
            echo "<script>alert('Error uploading assignment.'); window.location='index.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid file. Only PDFs up to 10MB allowed.'); window.location='index.html';</script>";
    }
}
?>