<?php
include 'connection.php'; // Include database connection

// Fetch reviews
$review_query = "SELECT id, user_name, package, rating, review, created_at FROM reviews ORDER BY created_at DESC";
$review_result = $conn->query($review_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratings & Reviews - VIHARA</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #79b6f7, #ffffff);
            margin: 0;
            padding: 0;
        }

        /* Review Container */
        .review-container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px;
            margin-top: 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        /* Recent Reviews Section */
        h3 {
            margin-top: 30px;
            color: #333;
        }

        /* Review Item */
        .review-item {
            background: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .review-item h4 {
            margin: 0;
            font-size: 18px;
            color: #007bff;
        }

        .review-item p {
            font-size: 16px;
            margin: 8px 0;
        }

        .review-item small {
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <div class="review-container">
        <h2>Rate & Review Your Experience</h2>

        <form method="POST" action="submit_review.php">
            <label for="name">Your Name:</label>
            <input type="text" name="name" required>

            <label for="package">Package:</label>
            <select name="package" required>
                <option value="">Select a Package</option>
                <?php
                // Fetch package names from database
                $package_query = "SELECT name FROM packages"; 
                $package_result = $conn->query($package_query);

                // Populate dropdown options
                if ($package_result->num_rows > 0) {
                    while ($row = $package_result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['name']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No Packages Available</option>";
                }
                ?>
            </select>

            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                <option value="4">⭐⭐⭐⭐ (Good)</option>
                <option value="3">⭐⭐⭐ (Average)</option>
                <option value="2">⭐⭐ (Poor)</option>
                <option value="1">⭐ (Very Bad)</option>
            </select>

            <label for="review">Your Review:</label>
            <textarea name="review" rows="4" required></textarea>

            <button type="submit">Submit Review</button>
        </form>

        <h3>Recent Reviews</h3>
        <div id="reviewsList">
            <?php
            if ($review_result->num_rows > 0) {
                while ($row = $review_result->fetch_assoc()) {
                    echo "<div class='review-item'>";
                    echo "<h4>" . htmlspecialchars($row['user_name']) . " (" . htmlspecialchars($row['package']) . ") - ⭐" . $row['rating'] . "</h4>";
                    echo "<p>" . htmlspecialchars($row['review']) . "</p>";
                    echo "<small>Reviewed on: " . $row['created_at'] . "</small>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>

<?php $conn->close(); ?>