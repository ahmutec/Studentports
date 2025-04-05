<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the assignment question and file types from the form
    $question = trim($_POST['question']);
    $fileTypes = trim($_POST['file_types']);

    // Validate inputs
    if (empty($question) || empty($fileTypes)) {
        echo "<script>alert('Both fields are required!'); window.location='teacher.php';</script>";
        exit;
    }

    // Save assignment question to assignment.txt
    if (file_put_contents('assignment.txt', $question) === false) {
        echo "<script>alert('Error saving assignment question!'); window.location='teacher.php';</script>";
        exit;
    }

    // Save allowed file types to allowed_types.txt
    if (file_put_contents('allowed_types.txt', $fileTypes) === false) {
        echo "<script>alert('Error saving file types!'); window.location='teacher.php';</script>";
        exit;
    }

    // Success message and redirect
    echo "<script>alert('Settings saved successfully!'); window.location='teacher.php';</script>";
} else {
    // If not a POST request, redirect back to teacher.php
    header('Location: teacher.php');
    exit;
}
?>
