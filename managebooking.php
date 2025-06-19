<?php
session_start();
include("connection.php"); // Database connection

// Check if admin is logged in (session validation)
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch all bookings from the bookings table
$sql = "SELECT * FROM bookings ORDER BY from_date DESC";  // Adjust the query to your table's structure
$all_bookings = $conn->query($sql);

// Handle booking deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the booking with the given id
    $delete_query = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Booking deleted successfully'); window.location.href='managebookings.php';</script>";
    } else {
        echo "<script>alert('Error deleting booking');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - VIHARA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
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

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        .manage-actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .btn {
            background: #007bff;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>

<h2>Manage Bookings</h2>

<div class="manage-actions">
    <a href="admin_dashboard.php" class="btn">Go to Admin Dashboard</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Package ID</th>
        <th>Destination</th>
        <th>Number of People</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Total Price</th>
        <th>Payment Status</th>
        <th>Payment ID</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>
    <?php
    // Check if there are any bookings in the database
    if ($all_bookings->num_rows > 0) {
        while ($row = $all_bookings->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['package_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['destination']) . "</td>";
            echo "<td>" . htmlspecialchars($row['num_people']) . "</td>";
            echo "<td>" . htmlspecialchars($row['from_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['to_date']) . "</td>";
            echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
            echo "<td>" . htmlspecialchars($row['payment_status']) . "</td>";
            echo "<td>" . htmlspecialchars($row['payment_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td><a href='?delete_id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this booking?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='11' style='text-align:center;'>No bookings found</td></tr>";
    }
    ?>
</table>

<footer>
    <p>&copy; 2025 VIHARA | All rights reserved</p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
