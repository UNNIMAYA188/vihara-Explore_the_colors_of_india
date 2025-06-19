<?php
include 'connection.php'; // Ensure this file connects to your MariaDB database

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, rating, review_text, created_at FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<h3>" . htmlspecialchars($row['username']) . " - " . $row['rating'] . "⭐</h3>";
        echo "<p>" . htmlspecialchars($row['review_text']) . "</p>";
        echo "<small>Posted on " . $row['created_at'] . "</small>";
        echo "</div><hr>";
    }
} else {
    echo "No reviews yet!";
}

$conn->close();
?>
