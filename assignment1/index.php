<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Exquisite Corpse</title>
</head>
<body>
    <h1>Welcome to the Exquisite Corpse Story</h1>
    <h2>a surrealist game</h2>
    <p>The story unfolds below:</p>
    <hr>
    <?php
        // Loop through all contribution files and include them
        $files = glob("contributions/*.php");
        foreach ($files as $file) {
            include $file;
            echo "<hr>"; // Separate each contribution visually
        }
    ?>
</body>
</html>