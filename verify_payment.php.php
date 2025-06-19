<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_data = json_decode($_POST['payment_data'], true);
    $booking_id = $_POST['booking_id'];

    if ($payment_data) {
        $payment_id = $payment_data['paymentMethodData']['tokenizationData']['token'];

        // Update booking status to Paid
        $stmt = $conn->prepare("UPDATE bookings SET status = 'Paid', payment_id = ? WHERE id = ?");
        $stmt->bind_param("si", $payment_id, $booking_id);

        if ($stmt->execute()) {
            echo "Payment successful! Your booking is confirmed.";
        } else {
            echo "Error updating payment status.";
        }
    } else {
        echo "Payment verification failed!";
    }
}
?>
