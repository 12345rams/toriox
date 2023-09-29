<?php
include("_dbconnection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    $linkedin = $_POST['linkedin'];
    $position = $_POST['position'];
    $companyname = $_POST['companyname'];

    // Insert the contact into the database
    $sql = "INSERT INTO contact_data (name, email, phone, website, linkedin, position, companyname) 
            VALUES ('$name', '$email', '$phone', '$website', '$linkedin', '$position', '$companyname')";

    if ($conn->query($sql) === TRUE) {
        echo "Contact added successfully! <a href='./middle.php'>Go To Portal</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>