<?php
include 'connection.php'; // Include database connection

// Handle delete request
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Sanitize input

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Review deleted successfully!'); window.location.href='managereviews.php';</script>";
    } else {
        echo "<script>alert('Error deleting review');</script>";
    }
    $stmt->close();
}

// Fetch all reviews
$review_query = "SELECT id, user_name, package, rating, review, created_at FROM reviews ORDER BY created_at DESC";
$review_result = $conn->query($review_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reviews - VIHARA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        .delete-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Reviews</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Package</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>

        <?php
        if ($review_result->num_rows > 0) {
            while ($row = $review_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['user_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['package']) . "</td>";
                echo "<td>⭐" . $row['rating'] . "</td>";
                echo "<td>" . htmlspecialchars($row['review']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td><a href='managereviews.php?delete=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this review?\")'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align: center;'>No reviews available.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
