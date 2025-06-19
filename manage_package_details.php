<?php
include("connection.php");

if (!isset($_GET['package_id'])) {
    die("Invalid package ID.");
}

$package_id = $_GET['package_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $itinerary = $_POST['itinerary'];
    $speciality = $_POST['speciality'];
    $best_time = $_POST['best_time'];
    $tourist_spots = $_POST['tourist_spots'];
    $hotel_details = $_POST['hotel_details'];

    // Insert or update details
    $sql = "INSERT INTO package_details (package_id, name, description, price, itinerary, speciality, best_time, tourist_spots, hotel_details) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE 
            name=VALUES(name), description=VALUES(description), price=VALUES(price), itinerary=VALUES(itinerary), 
            speciality=VALUES(speciality), best_time=VALUES(best_time), tourist_spots=VALUES(tourist_spots), hotel_details=VALUES(hotel_details)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdsssss", $package_id, $name, $description, $price, $itinerary, $speciality, $best_time, $tourist_spots, $hotel_details);
    $stmt->execute();

    echo "Package details updated!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Package Details</title>
</head>
<body>
    <form method="POST">
        <label>Name: <input type="text" name="name" required></label>
        <label>Description: <textarea name="description" required></textarea></label>
        <label>Price: <input type="number" name="price" required></label>
        <label>Itinerary: <textarea name="itinerary"></textarea></label>
        <label>Speciality: <textarea name="speciality"></textarea></label>
        <label>Best Time: <input type="text" name="best_time"></label>
        <label>Tourist Spots: <textarea name="tourist_spots"></textarea></label>
        <label>Hotel Details: <textarea name="hotel_details"></textarea></label>
        <button type="submit">Save</button>
    </form>
</body>
</html>
