
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountains of India</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: linear-gradient(to right,#79b6f7, #ffffff);;
            margin: 0;
            padding: 0;
        }

        header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .mountain-section {
            margin: 40px 0;
            justify-content: center;
            
        }

        .mountain-title {
            text-align: center;
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .mountain-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .mountain-card {
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .mountain-card:hover {
            transform: scale(1.05);
        }

        .mountain-card img {
            width: 100%;
            height: 80%;
            border-radius: 5px;
        }

        .mountain-card h3 {
            font-size: 1.5em;
            color: #34495e;
        }

        .mountain-card p {
            font-size: 1em;
            color: #7f8c8d;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color:linear-gradient(to right,#79b6f7, #ffffff);;
        }

        footer {
            background-color: #2c3e50;
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
        <h1>Mountains of India</h1>
        <p>Discover the majestic mountains and peaks of India</p>
    </header>

    <div class="container">

        <!-- Himalayas Section -->
        <div style="background-color: linear-gradient(to right,#79b6f7, #ffffff);"mountain-section">
            <h2 class="mountain-title">Himalayas</h2>
            <div class="mountain-content">
                <div class="mountain-card ">
                    <img style="width: 100%;" src="https://cdn.wallpapersafari.com/28/39/VIUxDo.jpg" alt="Himalayas">
                    <h3>Himalayas</h3>
                    <p>The world's highest mountain range, home to the world's highest peaks including Mount Kanchenjunga.</p>
                </div>
                <div class="mountain-card">
                    <img  src="https://wallpaperaccess.com/full/4082005.jpg" alt="Mount Kanchenjunga">
                    <h3>Mount Kanchenjunga</h3>
                    <p>The third-highest mountain in the world, located in the state of Sikkim.</p>
                </div>
                <div class="mountain-card">
                    <img src="https://thetempleguru.com/wp-content/uploads/2023/03/Kedarnath-temple-jyotirling-4.jpg" alt="Kedarnath">
                    <h3>Kedarnath</h3>
                    <p>A sacred peak, part of the Char Dham pilgrimage, known for its spiritual significance.</p>
                </div>
            </div>
        </div>

        <!-- Western Ghats Section -->
        <div class="mountain-section">
            <h2 class="mountain-title">Western Ghats</h2>
            <div class="mountain-content">
                <div class="mountain-card">
                    <img src="https://thebigwild.com/wp-content/uploads/2022/04/western-ghats-india-1.jpg" alt="Western Ghats">
                    <h3>Western Ghats</h3>
                    <p>A UNESCO World Heritage Site, known for its rich biodiversity and scenic beauty.</p>
                </div>
                <div class="mountain-card">
                    <img src="https://th.bing.com/th/id/OIP.GYPjZlzYdWvpJQ5KVYiwmwHaEU?w=333&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Coorg">
                    <h3>Coorg</h3>
                    <p>Located in Karnataka, known for its coffee plantations and lush landscapes.</p>
                </div>
                <div class="mountain-card">
                    <img src="https://www.ekeralatourism.net/wp-content/uploads/2019/01/best-time-munnar.jpg" alt="Munnar">
                    <h3>Munnar</h3>
                    <p>A popular hill station in Kerala, famous for its tea plantations and pleasant weather.</p>
                </div>
            </div>
        </div>

        <!-- Nilgiri Hills Section -->
        <div class="mountain-section">
            <h2 class="mountain-title">Nilgiri Hills</h2>
            <div class="mountain-content">
                <div class="mountain-card">
                    <img src="https://static.toiimg.com/photo/79611694/oie_7172918VuR4gT3j.jpg?width=748&resize=4" alt="Nilgiris">
                    <h3>Nilgiris</h3>
                    <p>Known for its tea plantations and stunning views, this hill station is a favorite getaway.</p>
                </div>
                <div class="mountain-card">
                    <img src="https://seoimgak.mmtcdn.com/blog/sites/default/files/images/ooty_2.jpg" alt="Ooty">
                    <h3>Ooty</h3>
                    <p>Known as the "Queen of Hill Stations," Ooty is a popular destination in Tamil Nadu.</p>
                </div>
                <div class="mountain-card">
                    <img src="https://travelentice.com/wp-content/uploads/2021/05/14-Best-Places-to-visit-in-Coonoor-Hill-Station-Dolphin-nose.jpg" alt="Coonoor">
                    <h3>Coonoor</h3>
                    <p>Located near Ooty, Coonoor is known for its tranquil environment and scenic landscapes.</p>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <p>&copy; 2025 All rights reserved | Mountains of India</p>
    </footer>

</body>
</html>
