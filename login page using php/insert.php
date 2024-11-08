<?php
// Database connection details
$servername = "localhost";
$username = "root";        // Database username
$password = "";            // Database password
$dbname = "db1"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch form data safely
if (isset($_POST['un']) && isset($_POST['ps'])) {
    $user = $_POST['un']; // Username from form
    $pass = $_POST['ps']; // Password from form

    // Prepare SQL statement
    $sql = "INSERT INTO login (username, password) VALUES (?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters (s = string, so two strings)
        $stmt->bind_param("ss", $user, $pass);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record inserted successfully!";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Please fill out both the username and password fields.";
}

// Close connection
$conn->close();
?>
