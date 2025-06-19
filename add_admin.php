<?php
include 'connection.php'; // Ensure database connection is established

$username = "admin";  // Change this to your desired username
$password = "admin123"; // Change this to your desired password

// Check if the username already exists
$stmt = $conn->prepare("SELECT id FROM admins WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Error: Admin username already exists!";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert new admin
    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Admin account created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
