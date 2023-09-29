<?php
session_start(); // Start a session

// Include the database connection configuration
include("_dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database
    $sql = "SELECT id,email, password FROM signups WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct, log the user in
            $_SESSION["user_id"] = $row["id"];
            header("Location: middle.php"); // Redirect to the home page
            exit();
        } else {
            echo "Invalid password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "User not found. <a href='signup.php'>Sign up</a>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
