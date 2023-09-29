<?php
session_start();
if (!(isset($_SESSION['user_id']))) {
   header("Location: signup.php"); // Change 'home.php' to the actual home page URL
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 10px 10px ;
        }
 
        h1 ,.dashboard_nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            text-align: center;
            margin: 10px 5px;
        }
        .d_nav{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        input[type="text"] {
            padding: 8px 10px;
            width: 300px;

        }

        button {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
            transition: background-color 0.3s ease;
        }

        input[type="checkbox"] {
            margin: 0;
            padding: 0;
        }

        input[type="submit"] {
            margin-top: 10px;
            background-color: #333;
            color: #fff;
            padding: 4px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            text-decoration: underline;
        }
        .dashboard_Container{
    width: 100%;
    height: 100%;
      background-color: #f2f2f2;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
       padding: 10px 10px ;
      overflow-x: auto;
  }
        @media screen and (max-width: 768px) {
            input[type="text"] {
             
                max-width: none;
            }
            h1{
                font-size: medium;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard_nav">
    <h1>Contact Data Dashboard  </h1>
    <div class="d_nav">
    <a href="../index.php"><span class="material-symbols-outlined" >
home
</span></a>
<a href="../parcials/chatbot.php"><span class="material-symbols-outlined">
chat
</span></a>
<a href="../parcials/logout.php"><span class="material-symbols-outlined">
logout
</span></a>



    </div>
   
    </div>
    <?php include './addcontact.php'?>

    <!-- Search Form -->
    <form method="POST">
        <input type="text" name="search" placeholder="Search by name, email, phone, etc." />
        <button type="submit">Search</button>
    </form>

    <?php
    // Database connection setup (replace with your database credentials)
require './_dbconnection.php';

 

    // Function to save selected leads as CSV
    function saveSelectedLeadsAsCSV($conn, $selectedLeads) {
        $csvFileName = "selected_leads.csv";
        $csvFile = fopen($csvFileName, "w");

        // Write CSV header
        $csvHeader = ["Name", "Email", "Phone", "Website", "LinkedIn", "Position", "Company Name"];
        fputcsv($csvFile, $csvHeader);

        // Fetch and write selected leads to CSV
        foreach ($selectedLeads as $leadId) {
            $sql = "SELECT * FROM contact_data WHERE id = $leadId";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $leadData = $result->fetch_assoc();
                $csvRow = [
                    $leadData['name'],
                    $leadData['email'],
                    $leadData['phone'],
                    $leadData['website'],
                    $leadData['linkedin'],
                    $leadData['position'],
                    $leadData['companyname']
                ];
                fputcsv($csvFile, $csvRow);
            }
        }

        fclose($csvFile);

        // Provide a download link for the CSV file
        echo "<p>Selected leads  <a href='$csvFileName' download><button >download</button></a></p>";
    }

    // Process search query
    if (isset($_POST['search'])) {
        $searchTerm = $_POST['search'];

        // Perform SQL query to search for data
        $sql = "SELECT * FROM contact_data WHERE
            name LIKE '%$searchTerm%' OR
            email LIKE '%$searchTerm%' OR
            phone LIKE '%$searchTerm%' OR
            website LIKE '%$searchTerm%' OR
            linkedin LIKE '%$searchTerm%' OR
            position LIKE '%$searchTerm%' OR
            companyname LIKE '%$searchTerm%'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display search results in a table
            echo "<h2>Search Results</h2>";
            echo "<form method='POST' >";
            echo" <div class='dashboard_Container'>";
            echo "<table border='1' >
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>LinkedIn</th>
                    <th>Position</th>
                    <th>Company Name</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td><input type='checkbox' name='selected_leads[]' value='" . $row['id'] . "'></td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['website'] . "</td>
                    <td>" . $row['linkedin'] . "</td>
                    <td>" . $row['position'] . "</td>
                    <td>" . $row['companyname'] . "</td>
                </tr>";
            }

            echo "</table>";
            echo "</div>";
            echo "<input type='submit' name='save_csv' value='Save Selected as CSV'>";
            echo "</form>";

            // Handle saving selected leads as CSV
            if (isset($_POST['save_csv'])) {
                $selectedLeads = $_POST['selected_leads'];
                if (!empty($selectedLeads)) {
                    saveSelectedLeadsAsCSV($conn, $selectedLeads);
                } else {
                    echo "<p>No leads selected to save as CSV.</p>";
                }
            }
        } else {
            echo "<p>No results found.</p>";
        }
    } else {
        // Display all data before searching
        $sql = "SELECT * FROM contact_data";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>All Data</h2>";
            echo "<form method='POST' >";
            echo" <div class='dashboard_Container'>";
            echo "<table border='1'class='dashboard_Container'>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>LinkedIn</th>
                    <th>Position</th>
                    <th>Company Name</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td><input type='checkbox' name='selected_leads[]' value='" . $row['id'] . "'></td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['website'] . "</td>
                    <td>" . $row['linkedin'] . "</td>
                    <td>" . $row['position'] . "</td>
                    <td>" . $row['companyname'] . "</td>
                </tr>";
            }

            echo "</table>";
            echo "</div>";
            echo "<input type='submit' name='save_csv' value='Select to  download as CSV'>";
            echo "</form>";

            // Handle saving selected leads as CSV
            if (isset($_POST['save_csv'])) {
                $selectedLeads = $_POST['selected_leads'];
                if (!empty($selectedLeads)) {
                    saveSelectedLeadsAsCSV($conn, $selectedLeads);
                } else {
                    echo "<p>No leads selected to save as CSV.</p>";
                }
            }
        } else {
            echo "<p>No data available.</p>";
        }
    }

    // Close the database connection
    $conn->close();
    ?>
  
</body>
</html>
