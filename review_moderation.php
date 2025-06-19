<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "vihara");

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id=?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
}

header("Location: admin_dashboard.php");
?>
