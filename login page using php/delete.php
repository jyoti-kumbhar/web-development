<?php
// delete.php

// Database connection details
$host = 'localhost'; // Your host
$dbname = 'db1'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form input values
        $user = $_POST['un'];
        $userPassword = $_POST['ps'];

        // Check if the username exists
        $stmt = $conn->prepare("SELECT password FROM login WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the user's password from the database
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['password'];

            // Verify the password
            if ($userPassword == $hashedPassword) {
                // Delete the user if the password is correct
                $deleteStmt = $conn->prepare("DELETE FROM login WHERE username = :username");
                $deleteStmt->bindParam(':username', $user);
                $deleteStmt->execute();

                echo "User deleted successfully.";
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "Username not found.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>