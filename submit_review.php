<?php
include 'connection.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $package = trim($_POST['package']);
    $rating = intval($_POST['rating']); // Ensure rating is an integer
    $reviewText = trim($_POST['review']);
    $created_at = date('Y-m-d H:i:s'); // Get current timestamp

    // Validate input fields
    if (empty($name) || empty($package) || empty($rating) || empty($reviewText)) {
        echo "<p style='color: red;'>All fields are required!</p>";
        exit;
    }

    // Use prepared statement to prevent SQL Injection
    $stmt = $conn->prepare("INSERT INTO reviews (user_name, package, rating, review, created_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $package, $rating, $reviewText, $created_at);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Review submitted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
