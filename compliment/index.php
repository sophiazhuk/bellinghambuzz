<?php
// Array of compliment beginnings
$complimentStart = [ 

    "Wow, %s! You are destined to be together.", 

    "%s are never going to be together.", 

    "%s have a small chance of working out.", 

    "Love alert! %s are a perfect match.", 

    "%s will have some fun, but it won't last forever.", 

    "%s, they will write stories of your love.", 

    "Roses are red, violets are blue, %s are doomed.", 

    "%s, love is in the air", 

    "%s, your love will go up in flames." 


]; 
// Array of compliment endings
$complimentEnd = [ 

    "Buy them flowers.", 

    "Give up.", 

    "So happy for you." ,

    "You better snatch them up before they move on to someone else.", 

    "They're out of your league.", 

    "I'd try your chances with someone else.", 

    "Good thing you're funny.", 

    "Don't even try.", 

    "Take a shower.", 

    "Propose already!" 

 

]; 

// Check if the form is submitted
$name1 = isset($_POST['name1']) ? htmlspecialchars($_POST['name1']) : null;
$name2 = isset($_POST['name2']) ? htmlspecialchars($_POST['name2']) : null;
$name = sprintf($name1 . " and " . $name2);

// Initialize a variable to store the generated compliment
$generatedCompliment = null;

if ($name) {
    // Generate one random compliment by combining parts from both arrays
    $start = $complimentStart[array_rand($complimentStart)]; // Randomly select a beginning
    $end = $complimentEnd[array_rand($complimentEnd)];       // Randomly select an ending
    $generatedCompliment = sprintf($start . " " . $end, $name); // Combine and format with the user's name
}
?>

<!DOCTYPE html>
<html>
<style> 

body{ 

    font-family: Monospace; 
    display: flex;
    flex-direction: column;
    align-items: center;
} 

h1{ 

    font-size: 60px; 

    text-align: center; 

} 
body {
    background-color: pink;
}
#title{ 

    font-size: 20px; 

} 

#complimentDisplay{ 

    font-size: 30px; 

    text-align: center; 

} 

#center{ 

    margin: 0 auto ; 

    align-content: center; 

    justify-content: center; 

    align-self: center; 

} 



</style> 
<head>
    <title>Absurd Compatibility</title>
</head>
<body>
    <h1>Absurd Compatibility</h1>

    <!-- Form for the user to enter their names -->
    <form method="post" action="">
        <label for="name1">Enter first name:</label>
        <input type="text" id="name1" name="name1" required> <br><br>
        <label for="name2">Enter second name:</label>
        <input type="text" id="name2" name="name2" required>
        <br><br>
        <button type="submit">Are they compatible?</button>
    </form>

    <?php if ($generatedCompliment): ?>
        <!-- Display area for the generated compliment -->
        <h2 id="complimentDisplay"><?php echo $generatedCompliment; ?></h2>
    <?php endif; ?>
    <div class="images">
    <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExYjZoNHhxbDFieWVhYXR5dWU5NjdlbHBsMnUydHQ4Z3E2cXh0a3V0bCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26BRv0ThflsHCqDrG/giphy.gif"></img> 

    <img src="https://www.cameronsworld.net/img/content/8/35.gif"></img> 

    </div>

</body>
</html>
