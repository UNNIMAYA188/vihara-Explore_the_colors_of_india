<?php
session_start();
include("connection.php"); // Include database connection

$sql = "SELECT * FROM packages";  // Fetch all packages
$all_packages = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore India - Travel Destinations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }
        header h1 {
            margin: 0;
        }
        .destination-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .destination {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s;
        }
        .destination:hover {
            transform: translateY(-5px);
        }
        .destination img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .destination h2 {
            font-size: 20px;
            color: #333;
            margin: 10px 0;
        }
        .destination p {
            font-size: 16px;
            color: #777;
        }
        .more-info {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            text-decoration: none;
            display: inline-block;
        }
        .more-info:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

 
    
    </style>
</head>
<body>

<header>
    <h1>VIHARA</h1>
    <p>Explore the colours of India!</p>
</header>

<div class="destination-container">
    <?php
    if ($all_packages->num_rows > 0) {
        while ($row = $all_packages->fetch_assoc()) {
    ?>
        <div class="destination">
            <h1><?php echo htmlspecialchars($row["id"]); ?></h1>
            <h2><?php echo htmlspecialchars($row["name"]); ?></h2>
            <img src="<?php echo htmlspecialchars($row["image"]); ?>" alt="Package Image">
            <p><?php echo htmlspecialchars($row["description"]); ?></p>
            <a href="package_details.php?id=<?php echo $row['id']; ?>">View Package</a>        </div>
    <?php
        }
    } else {
        echo "<p>No packages found.</p>";
    }
    ?>
</div>
<br>
<br>
<br>



 


<footer>
    <p>&copy; 2025 Explore India | All rights reserved</p>
</footer>

</body>
</html>
