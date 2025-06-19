<?php
// Include database connection
$conn = new mysqli("localhost", "root", "", "vihara");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get selected package name from URL
$selected_package = isset($_GET['package_name']) ? $_GET['package_name'] : "";

// Fetch package titles
$sql = "SELECT name FROM packages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Booking</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
        }

        .left-image {
            width: 60%;
            background: url('https://yourfriendatthebeach.com/wp-content/uploads/2018/08/Enjoying-the-beach-and-30A-Events.jpg') no-repeat center center;
            background-size: 1000px;
        }

        .form-container {
            width: 40%;
            background: linear-gradient(to right, #93c6fd, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 15px;
        }

        select, input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        @media screen and (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .left-image {
                width: 100%;
                height: 250px;
            }

            .form-container {
                width: 100%;
                padding: 20px;
            }
        }
    </style>

    <script>
        function calculatePrice() {
            let pricePerPerson = parseFloat(document.getElementById("package_price").value);
            let numPeople = parseInt(document.getElementById("num_people").value) || 1;
            let totalPrice = pricePerPerson * numPeople;
            document.getElementById("total_price").value = totalPrice.toFixed(2);
        }

        window.onload = function () {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const minDate = `${yyyy}-${mm}-${dd}`;
            document.getElementById('from_date').setAttribute('min', minDate);
            document.getElementById('to_date').setAttribute('min', minDate);
        };
    </script>
</head>
<body>
    <div style="padding-top: 100%;">
    </div>

<div class="left-image"></div>

<div class="form-container">
    <form action="process_booking.php" method="POST">
        <label for="destination">Destination:</label>
        <select name="destination" required>
            <option value="" disabled <?= $selected_package == "" ? 'selected' : '' ?>>Select a destination</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = htmlspecialchars($row['name']);
                    $selected = ($name == $selected_package) ? 'selected' : '';
                    echo "<option value=\"$name\" $selected>$name</option>";
                }
            } else {
                echo '<option value="" disabled>No packages available</option>';
            }
            ?>
        </select>

        <label for="package">Package:</label>
        <select name="package_id" id="package_price" onchange="calculatePrice()">
            <option value="13000">Basic - Below ₹13,000 per person</option>
            <option value="15000">Average - Below ₹15,000 per person</option>
            <option value="17000">Premium - Below ₹17,000 per person</option>
        </select>

        <label for="num_people">Number of People:</label>
        <input type="number" id="num_people" name="num_people" min="1" value="1" oninput="calculatePrice()">

        <label for="from_date">From Date:</label>
        <input type="date" id="from_date" name="from_date" required>

        <label for="to_date">To Date:</label>
        <input type="date" id="to_date" name="to_date" required>

        <label for="total_price">Total Price (₹):</label>
        <input type="text" id="total_price" name="total_price" readonly>

        <button type="submit">Proceed to Payment</button>
    </form>
</div>

</body>
</html>
