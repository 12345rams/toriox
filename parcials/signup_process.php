
<?php
// Include the database connection configuration
include("_dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the password and confirm_password match
    if ($password !== $confirm_password) {
        die("Password and confirm password do not match.");
    }

    // Check if the email already exists in the database
    $check_email_sql = "SELECT id FROM signups WHERE email=?";
    $check_email_stmt = $conn->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        echo "Email already exists. <a href='signup.php'>Try another email</a>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert signup data into the database
        $insert_sql = "INSERT INTO signups (email, password) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $email, $hashed_password);

        if ($insert_stmt->execute()) {
            // Registration successful, fetch the user's ID
            $user_id = $insert_stmt->insert_id;
            
            // Start a session
            session_start();
            
            // Set the user's ID as a session variable
            $_SESSION["user_id"] = $user_id;
            
            // Redirect to the home page
            header("Location: middle.php");
        } else {
            echo "Error: " . $insert_stmt->error;
        }
        $check_email_stmt->close();
        $insert_stmt->close();
        $conn->close();
    }

    // Close the database connections
}
?>


