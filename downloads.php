<?php
$uploadDir = "uploads/";
$files = scandir($uploadDir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download Assignments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Download Assignments</h1>
        <ul>
            <?php foreach ($files as $file) {
                if ($file !== "." && $file !== "..") {
                    echo "<li><a href='$uploadDir$file' download>$file</a></li>";
                }
            } ?>
        </ul>
    </div>
</body>
</html>