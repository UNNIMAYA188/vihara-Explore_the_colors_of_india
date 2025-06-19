<?php
session_start();
include("connection.php"); // Database connection

// Handle Package Addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $price = $_POST["price"];
    $image_url = htmlspecialchars($_POST["image_url"]); // Store image as a URL

    // Insert into database using prepared statements
    $stmt = $conn->prepare("INSERT INTO packages (name, image, description, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $name, $image_url, $description, $price);
    
    if ($stmt->execute()) {
        echo "<script>alert('Package added successfully!'); window.location.href='addpackages.php';</script>";
    } else {
        echo "<script>alert('Error adding package');</script>";
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
    <title>Manage Packages - VIHARA</title>
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
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Travel Package</h2>
    <form action="addpackages.php" method="POST">
        <label>Package Name:</label>
        <input type="text" name="name" required>

        <label>Package Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required>

        <label>Image URL:</label>
        <input type="text" name="image_url" required>

        <button type="submit">Add Package</button>
    </form>

    <h2>Existing Packages</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
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
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>No packages available</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
