<?php
// Include your database connection configuration file
include("_dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You can add more validation and sanitation here as needed.

    // Insert the form data into the database
    $insert_sql = "INSERT INTO contact_form (name, email, message) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("sss", $name, $email, $message);

    if ($insert_stmt->execute()) {
        echo "message  stored successfully our team will contact you!<a href='./middle.php'>Go To Portal</a>";
       
    } else {
        echo "Error storing form data.";
    }

    // Close the database connection
    $insert_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="contact">
        <h1>Contact Us</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
