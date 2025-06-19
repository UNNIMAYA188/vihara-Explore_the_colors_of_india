<?php
// Database connection
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "reviews_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productId = 1; // Example product ID, can be dynamic

// SQL query to fetch reviews
$sql = "SELECT * FROM reviews WHERE product_id = ? ORDER BY review_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

// Display reviews
if ($result->num_rows > 0) {
    echo "<h3>Product Reviews</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<h4>" . htmlspecialchars($row['review_title']) . "</h4>";
        echo "<p><strong>Rating:</strong> " . $row['rating'] . " stars</p>";
        echo "<p>" . nl2br(htmlspecialchars($row['review_text'])) . "</p>";
        echo "<small>Reviewed on: " . $row['review_date'] . "</small>";
        echo "</div><hr>";
    }
} else {
    echo "<p>No reviews yet for this product.</p>";
}

$stmt->close();
$conn->close();
?>
