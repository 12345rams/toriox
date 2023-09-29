
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TorioxLead</title>
    <!-- Include your CSS file here -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../parcials/nav.css">
</head>
<?php
session_start();
 if (isset($_SESSION['user_id'])) {
    // User is already logged in, redirect to the home page or any other page
    $buttonText = "logout";
}
else {
    $buttonText = "login";
}
?>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <h1 class="logo">
                <a href="/about">TorioxLead</a>
            </h1>
            <input type="checkbox" name="" id="" />
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li>
                    <a href="./index.php">Home</a>
                </li>
                <li>
                    <a href="./parcials/about.php">About</a>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn">Services <span class="material-symbols-outlined">
arrow_drop_down
</span></button>
                        <div class="dropdown-content">
                            &nbsp; &nbsp;
                            <a href="./parcials/startwith.php">LinkedIn Prospector</a>
                            <a href="#">Email</a>
                            <a href="./parcials/chatbot.php">ChatBot</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="./parcials/contact.php">Contact</a>
                </li>
                <li>
                <a href="./parcials/<?php echo"$buttonText" ?>.php">  
                <button class="btn2"> <?php echo "$buttonText" ?></button></li></a>
              
            </ul>
        </div>
    </nav>
</body>
</html>
