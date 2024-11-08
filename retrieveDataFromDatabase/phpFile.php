<?php
// Database connection
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "username";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the form input
$id = $_GET['txtId'];

// Query to fetch data from the database
$sql = "SELECT * FROM user1 WHERE id = '$id'"; // Adjust the table name and column as per your schema
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. "<br>";
        echo "First Name: " . $row["firstname"]. "<br>";
        echo "Last Name: " . $row["lastname"]. "<br>";
        echo "Age: " . $row["Age"]. "<br>";
        echo "Hometown: " . $row["HomeTown"]. "<br>";
        echo "Job: " . $row["Job"]. "<br>";
    }
} else {
    echo "0 results found for ID: $id";
}

// Close connection
$conn->close();
?>
