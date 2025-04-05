<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $fileTypes = $_POST['file_types'];

    // Save assignment question
    file_put_contents('assignment.txt', $question);

    // Save allowed file types
    file_put_contents('allowed_types.txt', $fileTypes);

    echo "<script>alert('Settings saved successfully!'); window.location='teacher.php';</script>";
}
?>