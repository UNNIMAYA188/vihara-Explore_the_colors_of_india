<?php
session_start();
include("connection.php");

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $query=mysqli_query($conn, "SELECT packages.* FROM packages WHERE packages.id='$id'");
    while($row=mysqli_fetch_array($query)){
       
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delhi - Agra Tour Package</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Header */
        header {
            background:linear-gradient(to right,#79b6f7, #ffffff);;;
            color: rgb(15, 30, 117);
            text-align: center;
            padding: 20px;
        }

        /* Navigation Bar */
        nav {
            background:linear-gradient(to right,#79b6f7, #ffffff);
            text-align: center;
            padding: 10px;
        }

        .section {
            padding: 40px;
            text-align: center;
            background-color: #fff;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        /* Sections */
        section {
            padding: 20px;
            background:linear-gradient(to right,#ffffff, #79b6f7);;
            margin: 20px;
            border-radius: 10px;
        }
      
        

        /* Itinerary */
        .day {
            background:linear-gradient(to right,#79b6f7, #ffffff);
            padding: 20px;
            margin: 20px ;
            border-left: 5px solid #3d4faa;
        }

        /* Pricing */
        #price ul {
            list-style-type: none;
            padding: 0;
        }

        #price ul li {
            background:  #ffffff;
            padding: 10px;
            margin: 5px 0;
        }

        /* Contact Form */
        form {
            display: flex;
            flex-direction: column;
        }

        label, input, textarea {
            margin: 10px 0;
            padding: 8px;
            width: 100%;
        }

        .hotel {
            display: flex;
            align-items: center;
            background:linear-gradient(to right,#79b6f7, #ffffff);;
            padding: 10px;
            margin: 10px 0;
            border-left: 5px solid #e67e22;
        }
        .hotel img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            margin-right: 15px;
        }

        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .itinerary {
            display: ruby-base;
            justify-content: center;
            gap: 70px;
            flex-wrap: wrap;
        }

        button:hover {
            background: #45a049;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1 ><?php echo $row["name"]; ?></h1>
        <p><?php echo $row["description"]; ?></p>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a style="color: black;" href="#overview">Overview</a></li>
            <li><a style="color: black;" href="#itinerary">Itinerary</a></li>
            <li><a style="color: black;" href="#price">Pricing</a></li>
            <li><a style="color: black;" href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Overview Section -->
    <section id="overview">
        <h2>Package Overview</h2>
        <p><?php echo $row["description1"]; ?></p>
        <img src="taj.jpeg" alt="taj" width="1425px" height="700px"  >
    </section>
    <section id="speciality">
<h2>What’s Special About <?php echo $row["name"]; ?>!</h2>
<p><?php echo $row["description2"]; ?></p>
<img src="tomb.jpeg" alt="tomb" width="1425px" height="700px" >
</section>
<section id="best visit">
    <h2>Tourist Attractions That Can Be Covered With This Delhi - Agra Holiday Package</h2>
    <p>This package includes exploring iconic landmarks such as India Gate, Qutub Minar, and Lotus Temple. Hot air balloon ride over Delhi's skyline for a panoramic view of the city. Visit the historic Red Fort. Embark on an adventure walk through the historic Agra Fort. Take an adventurous boat ride along the Yamuna River, visiting Mehtab Bagh. Head to Fatehpur Sikri for a historical exploration.</p>
</section>
<section>
    <h2>Best Time To Avail a Delhi - Agra Holiday Package</h2>
    <p>The best time to avail a Delhi-Agra tour is from October to March, when the weather is pleasant and ideal for sightseeing. During these months, temperatures range from 10°C to 25°C, making it comfortable to explore historical landmarks like the Taj Mahal, Agra Fort, Red Fort, and Qutub Minar. This period also coincides with major festivals like Diwali, Christmas, Republic Day, and Holi, adding a cultural charm to the visit. Summers, from April to June, can be extremely hot, with temperatures soaring up to 45°C, making outdoor exploration exhausting. The monsoon season (July to September) brings heavy rains, which can disrupt travel plans. To make the most of your trip, it is best to visit early in the morning for the Taj Mahal to enjoy the sunrise and avoid crowds, while late afternoons are perfect for exploring forts and markets.</p>

</section>

   

    <!-- Itinerary Section -->
    <div class="section">

    <section id="itinerary">
        <h2 style="text-align: center;">Itinerary</h2>

        <div class="itinerary">

        <div class="day">
            <h3>Day 1: Arrival in Delhi & Adventure Kickoff</h3>
            <p>Arrival at Delhi Airport. Begin with an exhilarating walk around India Gate to explore the monument's surroundings. Enjoy an adventurous street food crawl through the narrow lanes of Old Delhi. Explore the iconic Qutub Minar and Lotus Temple on a guided cycling tour, a thrilling way to experience the city. </p>
            <img src="indiagate.jpeg" alt="indiagate" width="750px" height="375px">
        </div>
        <div class="day">
            <h3>Day 2: Adventure and Sightseeing in Delhi</h3>
            <p>Morning hot air balloon ride over Delhi's skyline for a panoramic view of the city. Visit the historic Red Fort, and embark on an adventure hunt in the fort complex. Head to an outdoor adventure park for some rock climbing challenges with stunning views of Delhi. In the evening, relax and watch the light and sound show at Akshardham, learning about India's rich history.</p>
            <img src="tajmahal.jpeg" alt="tajmahal" width="750px" height="375px">
        </div>
        <div class="day">
            <h3>Day 3: Delhi to Agra with Adventure Activities</h3>
            <p>Enjoy a comfortable drive to Agra and check in at hotel. Start your day early with a stunning sunrise visit to the Taj Mahal. After visiting the Taj Mahal, embark on an adventure walk through the historic Agra Fort. Explore the outskirts of Agra with an off-road biking tour through rural landscapes.</p>
            <img src="redfort.jpeg" alt="redfort" width="750px" height="375px">
        </div>
        <div class="day">
            <h3>Day 4: Adventure Around Agra & Departure</h3>
            <p>Take an adventurous boat ride along the Yamuna River, visiting Mehtab Bagh. Head to Fatehpur Sikri for a historical exploration tour involving some fun facts and adventurous moments. Drive back to Delhi for your departure or onward journey.</p>
            <img src="fort.jpeg" alt="fort" width="750px" height="375px">
        </div>
        
    </section>
    </div>
    </div>

    <section id="hotel">
        <h2>Hotel Details</h2>
        <div class="hotels">
            <div class="hotel">
                <img src=".../../images/itc.jpeg" alt="Hotel 1">
                <div>
                    <strong>ITC Mughal, Luxuary resort and spa, Agra</strong><br>
                    ★★★★★ | Luxurious accomodation | Spacious rooms | Fine dine
                </div>
            </div>
            <div class="hotel">
                <img src="imperial.jpeg" alt="Hotel 2">
                <div>
                    <strong>The Imperial hotel, Agra</strong><br>
                    ★★★★☆ | Easy access to local landmarks | cleanliness and comfort | pool
                </div>
            </div>
            <div class="hotel">
                <img src="leela.jpeg" alt="Hotel 3">
                <div>
                    <strong>The Leela palace, New Delhi</strong><br>
                    ★★★★★ | Stunning riverside view | outdoor pool | Spa
                </div>
            </div>
            
        </div>
    </section>
    


    <!-- Pricing Section -->
    <section id="price">
        <h2>Package Pricing</h2>
        <ul>
            <li><strong>Standard:</strong> ₹12,999 per person</li>
            <li><strong>Deluxe:</strong> ₹16,999 per person</li>
            <li><strong>Luxury:</strong> ₹22,999 per person</li>
        </ul>
    </section>

    
            <button href="booking.php"; type="submit">book</button>
        

    <!-- Footer -->
    <footer>
        <p>© 2025 Manali-Kasol tours | Designed by VIHARA</p>
    </footer>
    
    <?php
    }}
?>
</body>
</html>