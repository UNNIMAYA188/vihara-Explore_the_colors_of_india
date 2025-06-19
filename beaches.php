<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Famous Seas and Beaches of India</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #0077b6;
            color: white;
            text-align: center;
            padding: 30px 0;
        }

        header h1 {
            margin: 0;
            font-size: 3em;
        }

        header p {
            font-size: 1.3em;
            margin: 10px;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        section h3 {
            font-size: 2em;
            text-align: center;
            color: #0077b6;
            margin-bottom: 30px;
        }

        /* Flexbox container for beach cards */
        .beach-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .beach-card-details, .card {
            width: 23%; /* Allows 4 cards per row */
            box-sizing: border-box;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .beach-card-details img, .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card h3, .beach-card-details h4 {
            background-color: #0077b6;
            color: white;
            padding: 12px;
            margin: 0;
        }

        .beach-card-details p, .card p {
            padding: 12px;
            font-size: 1em;
            color: #555;
        }

        .highlight {
            font-weight: bold;
            color: #0077b6;
        }

        footer {
            background-color: #0077b6;
            color: white;
            text-align: center;
            padding: 20px;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 900px) {
            .beach-card-details, .card {
                width: 48%; /* 2 cards per row */
            }
        }

        @media (max-width: 600px) {
            .beach-card-details, .card {
                width: 100%; /* 1 card per row */
            }
        }

    </style>
</head>
<body>

<header>
    <h1>Famous Seas and Beaches of India</h1>
    <p>Discover the most stunning and serene beaches across the Indian coastline</p>
</header>

<section >
    

    
    <h3>Explore the Top Beaches in India</h3>

    
    <div class="beach-card-container">
        <!-- Cherai Beach -->
        <div class="beach-card-details">
            <img src="https://th.bing.com/th/id/OIP.8iKOyLSQMtgzhnOxNyPZ0QHaE7?w=244&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Cherai Beach">
            <h4>Cherai Beach, Kerala</h4>
            <p>Known for its serene surroundings and golden sands, <span class="highlight">Cherai Beach</span> is located near Kochi in Kerala. Ideal for a peaceful getaway with opportunities for swimming and boat rides.</p>
        </div>

        <!-- Baga Beach -->
        <div class="beach-card-details">
            <img src="https://th.bing.com/th/id/OIP.uTSC5s7gt71qPBRnROmLgwHaEn?w=269&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Baga Beach">
            <h4>Baga Beach, Goa</h4>
            <p><span class="highlight">Baga Beach</span>, located in North Goa, is known for its lively beach scene, water sports, and beach shacks. A perfect place for parties, seafood, and relaxation on golden sands.</p>
        </div>

        <!-- Puri Beach -->
        <div class="beach-card-details">
            <img src="https://static.toiimg.com/photo/67589912/puri-beach.jpg?width=748&resize=4" alt="Puri Beach">
            <h4>Puri Beach, Odisha</h4>
            <p>Puri Beach is famous for its religious significance and golden sands. The beach offers a vibrant atmosphere, and you can enjoy beach activities or witness the famous Jagannath Rath Yatra here.</p>
        </div>

        <!-- Kovalam Beach -->
        <div class="beach-card-details">
            <img src="https://th.bing.com/th/id/OIP.3xI-BjuNWdBgEjPdTQ1EQQHaEK?w=333&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Kovalam Beach">
            <h4>Kovalam Beach, Kerala</h4>
            <p>Located in Kerala, Kovalam is one of the most famous beach destinations in India, known for its crescent-shaped beaches and water activities like surfing, boating, and swimming.</p>
        </div>

        <!-- Rishikonda Beach -->
        <div class="beach-card-details">
            <img src="https://th.bing.com/th/id/OIP.TIkxkUZNmr_a4Eb5K60N2wHaD8?w=299&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Rishikonda Beach">
            <h4>Rishikonda Beach, Andhra Pradesh</h4>
            <p>Located near Visakhapatnam, Rishikonda Beach is famous for its scenic beauty, calm atmosphere, and perfect conditions for water sports such as jet skiing and parasailing.</p>
        </div>

        <!-- Malpe Beach -->
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.UMuzxFZD5qb36-NYqE3XhAHaEK?w=259&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Malpe Beach">
            <h3>Malpe Beach, Udupi</h3>
            <p>Malpe Beach, located in Udupi, Karnataka, is known for its clean and calm environment. It's a great destination for relaxation, water sports, and boat rides to nearby islands.</p>
        </div>

        <!-- Surathkal Beach -->
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.vuEPGZt5KNZ2fGx9rzSjbwHaFj?w=186&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Surathkal Beach">
            <h3>Surathkal Beach</h3>
            <p>Surathkal Beach is a tranquil and picturesque destination near Mangalore. Known for its clean surroundings, golden sands, and clear waters, Surathkal Beach is perfect for a peaceful day out. The nearby Surathkal Lighthouse offers stunning views of the coastline.</p>
        </div>

        <!-- Gokarna Beach -->
        <div class="card">
            <img src="https://static2.tripoto.com/media/filter/nl/img/395463/TripDocument/1568458658_gopr0275_01.jpg" alt="Gokarna Beach">
            <h3>Gokarna Beach</h3>
            <p>Gokarna Beach is known for its spiritual vibes and laid-back atmosphere. Located in the small town of Gokarna, this beach offers pristine sands and scenic views. It is an ideal spot for yoga, meditation, and relaxation amidst nature.</p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2025 Famous Beaches of India | All Rights Reserved</p>
</footer>

</body>
</html>
