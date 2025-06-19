<?php
session_start();
include 'db_connection.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM packages WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Package deleted successfully'); window.location.href='manage_packages.php';</script>";
    } else {
        echo "<script>alert('Error deleting package');</script>";
    }
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request'); window.location.href='manage_packages.php';</script>";
}
?>