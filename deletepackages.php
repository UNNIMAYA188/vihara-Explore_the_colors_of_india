<?php
session_start();
include("connection.php"); // Database connection

// Handle package deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // Delete package from database
    $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Package deleted successfully!'); window.location.href='deletepackages.php';</script>";
    } else {
        echo "<script>alert('Error deleting package. Please try again.');</script>";
    }
    $stmt->close();
}

// Fetch all packages
$packages_query = "SELECT * FROM packages ORDER BY id DESC";
$packages_result = $conn->query($packages_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Packages - VIHARA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
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
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
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
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        .delete-btn:hover {
            background: darkred;
        }
        .package-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this package?")) {
                window.location.href = 'deletepackages.php?delete_id=' + id;
            }
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Delete Travel Packages</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        if ($packages_result->num_rows > 0) {
            while ($row = $packages_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td><img src='" . htmlspecialchars($row["image"]) . "' class='package-img'></td>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["price"]) . "</td>";
                echo "<td><button class='delete-btn' onclick='confirmDelete(" . $row["id"] . ")'>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>No packages available</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
