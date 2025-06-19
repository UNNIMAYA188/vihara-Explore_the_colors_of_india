
<?php
session_start();
include 'connection.php'; // Connect to your database




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id']; // Get logged-in user ID
    $package_id = $_POST['package_id'];
    $destination = $_POST['destination'];
    $num_people = $_POST['num_people'];
    $total_price = $_POST['total_price'];
    
    // Insert booking into database
    $stmt = $conn->prepare("INSERT INTO bookings (id, package_id, destination, num_people, total_price, payment_status) VALUES (?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("iisid", $id, $package_id, $destination, $num_people, $total_price);

    if ($stmt->execute()) {
        $booking_id = $stmt->insert_id;
        header("Location: google_pay.php?booking_id=" . $booking_id);
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
