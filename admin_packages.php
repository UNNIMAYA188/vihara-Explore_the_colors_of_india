<?php
$conn = new mysqli("localhost", "root", "", "vihara");

// Add a package
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO packages (name, description, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $description, $price);
    $stmt->execute();
}

// Delete a package
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM packages WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Update a package
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE packages SET name=?, description=?, price=? WHERE id=?");
    $stmt->bind_param("ssdi", $name, $description, $price, $id);
    $stmt->execute();
}

// Fetch all packages
$result = $conn->query("SELECT * FROM packages");
?>
