<?php
session_start();
include("connection.php"); // Database connection

// Handle update request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $price = $_POST["price"];
    $image = htmlspecialchars($_POST["image"]);
    $itinerary = htmlspecialchars($_POST["itinerary"]);
    $speciality = htmlspecialchars($_POST["speciality"]);
    $best_time = htmlspecialchars($_POST["best_time"]);
    $tourist_spots = htmlspecialchars($_POST["tourist_spots"]);
    $hotel_details = htmlspecialchars($_POST["hotel_details"]);

    $stmt = $conn->prepare("UPDATE package_details SET name=?, description=?, price=?, image=?, itinerary=?, speciality=?, best_time=?, tourist_spots=?, hotel_details=? WHERE id=?");
    $stmt->bind_param("ssdssssssi", $name, $description, $price, $image, $itinerary, $speciality, $best_time, $tourist_spots, $hotel_details, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Package detail updated successfully!'); window.location.href='edit_package_details.php';</script>";
    } else {
        echo "<script>alert('Error updating package details');</script>";
    }
    $stmt->close();
}

// Get all package details
$details_result = $conn->query("SELECT * FROM package_details ORDER BY id DESC");

// Get package detail for editing
$edit_detail = null;
if (isset($_GET["edit"])) {
    $edit_id = $_GET["edit"];
    $stmt = $conn->prepare("SELECT * FROM package_details WHERE id=?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $edit_detail = $result->fetch_assoc();
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Package Details</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); width: 90%; margin: auto; }
        h2 { text-align: center; }
        form { display: flex; flex-direction: column; gap: 10px; margin-bottom: 30px; }
        label { font-weight: bold; }
        input, textarea { padding: 10px; width: 100%; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .edit-btn { background-color: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px; }
        .edit-btn:hover { background-color: #218838; }
        .package-img { width: 100px; height: 70px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Package Details</h2>

    <?php if ($edit_detail): ?>
        <form method="POST" action="edit_package_details.php">
            <input type="hidden" name="id" value="<?= $edit_detail['id'] ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($edit_detail['name']) ?>" required>

            <label>Description:</label>
            <textarea name="description" rows="3" required><?= htmlspecialchars($edit_detail['description']) ?></textarea>

            <label>Price:</label>
            <input type="number" name="price" step="0.01" value="<?= $edit_detail['price'] ?>" required>

            <label>Image URL:</label>
            <input type="text" name="image" value="<?= htmlspecialchars($edit_detail['image']) ?>" required>

            <label>Itinerary:</label>
            <textarea name="itinerary" rows="2"><?= htmlspecialchars($edit_detail['itinerary']) ?></textarea>

            <label>Speciality:</label>
            <textarea name="speciality" rows="2"><?= htmlspecialchars($edit_detail['speciality']) ?></textarea>

            <label>Best Time to Visit:</label>
            <textarea name="best_time" rows="2"><?= htmlspecialchars($edit_detail['best_time']) ?></textarea>

            <label>Tourist Spots:</label>
            <textarea name="tourist_spots" rows="2"><?= htmlspecialchars($edit_detail['tourist_spots']) ?></textarea>

            <label>Hotel Details:</label>
            <textarea name="hotel_details" rows="2"><?= htmlspecialchars($edit_detail['hotel_details']) ?></textarea>

            <button type="submit" name="update">Update Package Detail</button>
        </form>
    <?php endif; ?>

    <h2>All Package Details</h2>
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
        if ($details_result->num_rows > 0) {
            while ($row = $details_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td><img src='" . htmlspecialchars($row["image"]) . "' class='package-img'></td>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars(substr($row["description"], 0, 50)) . "...</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td><a href='edit_package_details.php?edit=" . $row["id"] . "' class='edit-btn'>Edit</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>No package details available</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
