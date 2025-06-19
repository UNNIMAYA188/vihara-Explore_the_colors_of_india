<?php
include 'connection.php'; // Database connection
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location:adminpanel.php");
    exit();
}

// Fetch all packages from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages - Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Manage Travel Packages</h2>
    <a href="add_package.php">Add New Package</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Package Name</th>
            <th>Destination</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['package_name']; ?></td>
            <td><?php echo $row['destination']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="uploads/<?php echo $row['image']; ?>" width="100"></td>
            <td>
                <a href="edit_package.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_package.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
