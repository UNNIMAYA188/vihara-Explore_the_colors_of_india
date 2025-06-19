<?php
$servername = "localhost";  // Change if using a remote server
$username = "root";         // Default MariaDB username
$password = "";             // Default password (empty for XAMPP)
$dbname = "vihara";         // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
