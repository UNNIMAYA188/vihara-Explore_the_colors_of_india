<?php
session_start();
include("connection.php"); // Database connection

// Check if admin is logged in (session validation)
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch all users' details from the login table
$sql = "SELECT id, username, email, created_at FROM login ORDER BY created_at DESC";
$all_users = $conn->query($sql);

// Handle user deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Delete the user with the given id
    $delete_query = "DELETE FROM login WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully'); window.location.href='manageusers.php';</script>";
    } else {
        echo "<script>alert('Error deleting user');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - VIHARA</title>
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

<h2>Manage Users</h2>

<div class="manage-actions">
    <a href="admin_dashboard.php" class="btn">Go to Admin Dashboard</a>
</div>

<table>
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Account Created</th>
        <th>Actions</th>
    </tr>
    <?php
    // Check if there are users in the database
    if ($all_users->num_rows > 0) {
        while ($row = $all_users->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td><a href='?delete_id=" . $row['id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5' style='text-align:center;'>No users found</td></tr>";
    }
    ?>
</table>

<footer>
    <p>&copy; 2025 VIHARA | All rights reserved</p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
