<?php
// update.php

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
        $currentPassword = $_POST['ps'];
        $newPassword = $_POST['nps'];

        // Check if username exists
        $stmt = $conn->prepare("SELECT password FROM login WHERE username = :username");
        $stmt->bindParam(':username', $user);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the current password from the database
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPassword = $row['password'];

            // Verify the current password
            if ($currentPassword == $hashedPassword) {
                // Update the password with the new one
                $updateStmt = $conn->prepare("UPDATE login SET password = :newPassword WHERE username = :username");
                $updateStmt->bindParam(':newPassword', $newPassword);
                $updateStmt->bindParam(':username', $user);
                $updateStmt->execute();

                echo "Password updated successfully.";
            } else {
                echo "Current password is incorrect.";
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
