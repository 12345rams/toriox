<?php
// Start the session (if it's not already started)
session_start();

// Destroy the session data
session_destroy();

// Redirect to the login page or any other desired page
header("Location: login.php");
exit;
?>
