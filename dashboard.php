<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: loginpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h1>
    <p>Here you can manage your website content.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
