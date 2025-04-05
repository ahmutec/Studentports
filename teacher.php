<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Setup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Teacher Setup</h1>
        <form action="save_setup.php" method="post">
            <h2>Assignment Question</h2>
            <textarea name="question" rows="5" cols="50" placeholder="Enter assignment question here" required></textarea>
            <h2>Allowed File Types</h2>
            <p>Enter extensions separated by commas (e.g., pdf, html, docx)</p>
            <input type="text" name="file_types" placeholder="pdf, html" required>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>