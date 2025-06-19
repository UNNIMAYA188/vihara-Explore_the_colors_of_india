<?php
session_start();
include 'db_connection.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: manage_packages.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$package = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $destination = $_POST['destination'];
    $price = $_POST['price'];
    
    $stmt = $conn->prepare("UPDATE packages SET name = ?, destination = ?, price = ? WHERE id = ?");
    $stmt->bind_param("ssdi", $name, $destination, $price, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Package updated successfully'); window.location.href='manage_packages.php';</script>";
    } else {
        echo "<script>alert('Error updating package');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Package</h2>
    <form action="" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $package['name']; ?>" required>
        <label>Destination:</label>
        <input type="text" name="destination" value="<?php echo $package['destination']; ?>" required>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo $package['price']; ?>" required>
        <button type="submit">Update Package</button>
    </form>
</body>
</html>



