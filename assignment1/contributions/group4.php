

<?php
        // Array of image paths
        $images = [
            "https://upload.wikimedia.org/wikipedia/commons/a/ac/Thunnus_obesus_%28bigeye_tuna%29.jpg",
            "https://upload.wikimedia.org/wikipedia/commons/a/a6/BachFugueBar.png",
            "https://upload.wikimedia.org/wikipedia/commons/c/c4/1870s-deep-sea-diver.jpg"
        ];

        // Randomly select an image
        $randomImage = $images[array_rand($images)];

        // Display the image
        echo "<img src='$randomImage' alt='Random Image' style='max-width:50%; max-width:300px;'>";
    ?>