<?php
session_start();
include("connection.php"); // Database connection

// Fetch all available packages for selection
$packages_query = "SELECT id, name FROM packages ORDER BY id ASC";
$packages_result = $conn->query($packages_query);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST["package_id"];
    $name = htmlspecialchars($_POST["name"]);
    $description = htmlspecialchars($_POST["description"]);
    $price = $_POST["price"];
    $itinerary = htmlspecialchars($_POST["itinerary"]);
    $speciality = htmlspecialchars($_POST["speciality"]);
    $best_time = htmlspecialchars($_POST["best_time"]);
    $tourist_spots = htmlspecialchars($_POST["tourist_spots"]);
    $hotel_details = htmlspecialchars($_POST["hotel_details"]);
    
    // Image Upload Handling
    $target_dir = "uploads/";  // Make sure this folder exists
    $image = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    // Insert into package_details table using prepared statements
    $stmt = $conn->prepare("INSERT INTO package_details (package_id, name, description, price, image, itinerary, speciality, best_time, tourist_spots, hotel_details) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issdssssss", $package_id, $name, $description, $price, $image, $itinerary, $speciality, $best_time, $tourist_spots, $hotel_details);
    
    if ($stmt->execute()) {
        echo "<script>alert('Package details added successfully!'); window.location.href='add_package_details.php';</script>";
    } else {
        echo "<script>alert('Error adding package details');</script>";
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package Details - VIHARA</title>
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
        select, input, textarea {
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
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Package Details</h2>
    <form action="add_package_details.php" method="POST" enctype="multipart/form-data">
        <label>Select Package:</label>
        <select name="package_id" required>
            <option value="">-- Select Package --</option>
            <?php while ($package = $packages_result->fetch_assoc()) { ?>
                <option value="<?php echo $package['id']; ?>"><?php echo htmlspecialchars($package['name']); ?></option>
            <?php } ?>
        </select>

        <label>Package Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" rows="3" required></textarea>

        <label>Price (INR):</label>
        <input type="text" name="price" required>

        <label>Upload Image:</label>
        <input type="text" name="image" required>

        <label>Itinerary:</label>
        <textarea name="itinerary" rows="3" required></textarea>

        <label>Speciality:</label>
        <input type="text" name="speciality" required>

        <label>Best Time to Visit:</label>
        <input type="text" name="best_time" required>

        <label>Tourist Spots:</label>
        <textarea name="tourist_spots" rows="3" required></textarea>

        <label>Hotel Details:</label>
        <textarea name="hotel_details" rows="3" required></textarea>

        <button type="submit">Add Details</button>
    </form>

    <h2>Existing Package Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Package Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Itinerary</th>
            <th>Speciality</th>
            <th>Best Time</th>
            <th>Tourist Spots</th>
            <th>Hotel Details</th>
        </tr>
        <?php
        $details_query = "SELECT pd.id, p.name AS package_name, pd.name, pd.description, pd.price, pd.image, 
                          pd.itinerary, pd.speciality, pd.best_time, pd.tourist_spots, pd.hotel_details 
                          FROM package_details pd 
                          JOIN packages p ON pd.package_id = p.id 
                          ORDER BY pd.id DESC";
        $details_result = $conn->query($details_query);

        if ($details_result->num_rows > 0) {
            while ($row = $details_result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . htmlspecialchars($row["package_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
                echo "<td>₹" . number_format($row["price"], 2) . "</td>";
                echo "<td><img src='" . $row["image"] . "' alt='Package Image'></td>";
                echo "<td>" . htmlspecialchars($row["itinerary"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["speciality"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["best_time"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["tourist_spots"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["hotel_details"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10' style='text-align:center;'>No package details available</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
