<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background:linear-gradient(to right,#79b6f7, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 20px;
            width: 350px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #79b6f7;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 95%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            background-color: #79b6f7;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #00b315;
        }

        input[readonly] {
            background: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Your Package</h2>
        <form action="process_booking.php" method="POST">
            <label>Select Package:</label>
            <select id="package" name="package" required onchange="calculateTotalCost()">
                <option value="" disabled selected>Select a package</option>
                <option value="Delhi-Agra" data-price="5000">Delhi-Agra</option>
                <option value="Kashmir" data-price="10000">Kashmir</option>
                <option value="Alleppey-Munnar" data-price="10000">Alleppey-Munnar</option>
                <option value="Wayanad" data-price="5000">Wayanad</option>
                <option value="Manali-Kasol" data-price="20000">Manali-Kasol</option>
                <option value="Kanatal" data-price="25000">Kanatal</option>
            </select>

            <label>Select Duration:</label>
            <select id="duration" name="duration" required onchange="calculateTotalCost()">
                <option value="3">3 Days 2 Nights</option>
                <option value="4">4 Days 3 Nights</option>
                <option value="5">5 Days 4 Nights</option>
            </select>

            <label>Number of Travelers:</label>
            <input type="number" id="num_persons" name="num_persons" min="1" required oninput="calculateTotalCost()">
            
            <label>Total Cost (INR):</label>
            <input type="text" id="total_cost" name="total_cost" readonly>

            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Phone:</label>
            <input type="text" name="phone" required>

            <button type="submit">Proceed to Payment</button>
        </form>
    </div>

    <script>
        function calculateTotalCost() {
            let packageSelect = document.getElementById("package");
            let selectedOption = packageSelect.options[packageSelect.selectedIndex];
            let perHeadCost = selectedOption.getAttribute("data-price");

            let numPersons = document.getElementById("num_persons").value;
            let duration = document.getElementById("duration").value;

            if (perHeadCost && numPersons && duration) {
                let totalCost = perHeadCost * numPersons;
                document.getElementById("total_cost").value = totalCost;
            } else {
                document.getElementById("total_cost").value = "";
            }
        }
    </script>
</body>
</html>