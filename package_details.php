<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];
    
    // Fetch package details
    $sql = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $package_id);
    $stmt->execute();
    $package_result = $stmt->get_result();
    
    if ($package_result->num_rows > 0) {
        $package = $package_result->fetch_assoc();
    } else {
        echo "<p>Package not found.</p>";
        exit;
    }
    
    // Fetch detailed package information
    $sql_details = "SELECT * FROM package_details WHERE package_id = ?";
    $stmt_details = $conn->prepare($sql_details);
    $stmt_details->bind_param("i", $package_id);
    $stmt_details->execute();
    $details_result = $stmt_details->get_result();
    
    if ($details_result->num_rows > 0) {
        $details = $details_result->fetch_assoc();
    } else {
        echo "<p>Package details not found.</p>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $package['name']; ?> - Package Details</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; }
        header { background: linear-gradient(to right,#79b6f7, #ffffff); text-align: center; padding: 20px; }
        section { padding: 20px; background: linear-gradient(to right,#79b6f7, #ffffff); margin: 20px; border-radius: 10px; }
        img { width: 100%; height: auto; border-radius: 10px; }
        .content-box { padding: 15px; background: white; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); }
        .book-now { display: flex; justify-content: center; margin-top: 20px; }
        .book-now a { text-decoration: none; background: #ff6600; color: white; padding: 12px 20px; border-radius: 8px; font-size: 18px; font-weight: bold; transition: 0.3s; }
        .book-now a:hover { background: #e65c00; }
        footer { background: #333; color: white; text-align: center; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $package['name']; ?></h1>
        <p><?php echo $package['description']; ?></p>
    </header>

    <section>
        <h2>Overview</h2>
        <div class="content-box">
            <p><?php echo $details['description']; ?></p>
            <img src="<?php echo $package['image']; ?>" alt="Package Image">
        </div>
    </section>

    <section>
        <h2>Itinerary</h2>
        <div class="content-box">
            <p><?php echo nl2br($details['itinerary']); ?></p>
        </div>
    </section>

    <section>
        <h2>🏝 Speciality</h2>
        <div class="content-box">
            <p><?php echo $details['speciality']; ?></p>
        </div>
    </section>

    <section>
        <h2>📆Best Time to Visit</h2>
        <div class="content-box">
            <p><?php echo $details['best_time']; ?></p>
        </div>
    </section>

    <section>
        <h2>🏰Tourist Spots</h2>
        <div class="content-box">
            <p><?php echo $details['tourist_spots']; ?></p>
        </div>
    </section>

    <section>
        <h2>🏨Hotel Details</h2>
        <div class="content-box">
            <p><?php echo $details['hotel_details']; ?></p>
        </div>
    </section>

    <section>
        <h2>💰Package Price</h2>
        <div class="content-box">
            <p><strong>Price:</strong> ₹<?php echo number_format($package['price']); ?> per person</p>
        </div>
    </section>

    <!-- Book Now Button -->
    <div class="book-now">
        <a href="package_booking.php">Book Now</a>
    </div>

    <footer>
        <p>© 2025 Vihara | Designed by VIHARA</p>
    </footer>
</body>
</html>
