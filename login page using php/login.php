<?php
// Database connection details
$servername = "localhost";
$username = "root";        // Database username
$password = "";            // Database password
$dbname = "db1"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$user = $_POST['un']; // Username input
$pass = $_POST['ps']; // Password input

// Query to check login credentials
$sql = "SELECT * FROM login WHERE username = '$user' AND password = '$pass'"; // Adjust table and column names as per your schema
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Successful login
    echo "Login successful! Welcome, " . $user . ".";
} else {
    // Failed login
    echo "Invalid username or password. Please try again.";
}

// Close connection
$conn->close();
?>
