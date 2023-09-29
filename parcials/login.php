<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login_process.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        <input type="submit" value="Login">
    </form>
</body>
</html>
