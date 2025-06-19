<?php
session_start();
include("connection.php"); // Database connection

// Check if an update request is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $price = $_POST["price"];
    $image_url = htmlspecialchars($_POST["image_url"]); // Store image as URL

    // Update package using prepared statement
    $stmt = $conn->prepare("UPDATE packages SET name=?, image=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("sssdi", $name, $image_url, $description, $price, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Package updated successfully!'); window.location.href='updatepackages.php';</script>";
    } else {
        echo "<script>alert('Error updating package');</script>";
    }
    $stmt->close();
}

// Fetch all packages
$packages_query = "SELECT * FROM packages ORDER BY id DESC";
$packages_result = $conn->query($packages_query);

// Get package details for editing (if edit button is clicked)
$edit_package = null;
if (isset($_GET["edit"])) {
    $edit_id = $_GET["edit"];
    $edit_query = $conn->prepare("SELECT * FROM packages WHERE id=?");
    $edit_query->bind_param("i", $edit_id);
    $edit_query->execute();
    $edit_result = $edit_query->get_result();
    if ($edit_result->num_rows > 0) {
        $edit_package = $edit_result->fetch_assoc();
    }
    $edit_query->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Packages - VIHARA</title>
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

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input, textarea {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
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

        .package-img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
        }

        .edit-btn {
            background-color: #28a745;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .edit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Travel Package</h2>

    <?php if ($edit_package): ?>
        <!-- Update Form -->
        <form action="updatepackages.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $edit_package['id']; ?>">

            <label>Package Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($edit_package['name']); ?>" required>

            <label>Package Description:</label>
            <textarea name="description" rows="4" required><?php echo htmlspecialchars($edit_package['description']); ?></textarea>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo $edit_package['price']; ?>" required>

            <label>Image URL:</label>
            <input type="text" name="image_url" value="<?php echo htmlspecialchars($edit_package['image']); ?>" required>

            <button type="submit" name="update">Update Package</button>
        </form>
    <?php endif; ?>

    <h2>Existing Packages</h2>
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
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td><a href='updatepackages.php?edit=" . $row["id"] . "' class='edit-btn'>Edit</a></td>";
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
