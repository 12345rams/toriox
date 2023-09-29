<?php
$servername = "localhost"; // Change this to your MySQL server name
$username = ""; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "id21325415_vijay9569592952"; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
