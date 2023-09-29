<?php
// Start the session (if it's not already started)
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // User is already logged in, redirect to the home page or any other page
    header("Location: middle.php"); // Change 'home.php' to the actual home page URL
    exit;
}

// ... Rest of your login page code ...
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./signup.css">
</head>
<body>
    <h1>Sign Up</h1>
    <form method="POST" action="signup_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <p>You have already account? <a href="login.php">login</a></p>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
