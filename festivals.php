<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Festivals of India</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #93c6fd, #ffffff);
      color: #333;
    }

    header {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    header h1 {
      margin: 0;
      font-size: 3em;
    }

    header p {
      font-size: 1.2em;
      margin: 10px;
    }

    section {
      padding: 20px;
      margin: 20px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    section h2, .state-festivals h3 {
      text-align: center;
      color: #333;
      font-size: 2em;
    }

    .festival-card, .state-festival-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .card, .state-card {
      width: 280px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      text-align: center;
    }

    .card img, .state-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card h3, .state-card h4 {
      background-color: #4CAF50;
      color: white;
      margin: 0;
      padding: 10px;
      font-size: 1.4em;
    }

    .card p, .state-card p {
      padding: 15px;
      font-size: 1.05em;
      color: #555;
    }

    footer {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 15px;
      position: fixed;
      width: 100%;
      bottom: 0;
    }

    .state-festivals {
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Festivals of India</h1>
    <p>Explore the vibrant and diverse festivals celebrated across India</p>
  </header>

  <section>
    <h2>Popular National Festivals</h2>
    <div class="festival-card">
      <!-- Diwali -->
      <div class="card">
        <img src="https://ts2.mm.bing.net/th?id=OIP.CwSRU_73JHvD-PdWM6x8BAHaD5&pid=15.1" alt="Diwali Festival" />
        <h3>Diwali</h3>
        <p>Diwali, the Festival of Lights, celebrates the victory of light over darkness, good over evil.</p>
      </div>

      <!-- Holi -->
      <div class="card">
        <img src="https://cdn.britannica.com/57/244757-131-EBAFDFE0/Hindu-Holi-Festival-Mathura-Uttar-Pradesh-India.jpg" alt="Holi Festival" />
        <h3>Holi</h3>
        <p>Holi, the Festival of Colors, celebrates the arrival of spring with vibrant powders and joy.</p>
      </div>

      <!-- Eid -->
      <div class="card">
        <img src="https://th.bing.com/th/id/OIP.kd6-t45ZEeI3GTm0HMyfzAHaEK?w=297&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Eid Festival" />
        <h3>Eid</h3>
        <p>Eid marks the end of Ramadan, celebrated with feasts, prayers, and the giving of charity.</p>
      </div>
    </div>
  </section>

  <section class="state-festivals">
    <h3>Main Festivals by State</h3>
    <div class="state-festival-container">
      <!-- Maharashtra -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.DleTSDWfrXcvC85DnqV62QHaEz?w=281&h=182&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Ganesh Chaturthi" />
        <h4>Maharashtra</h4>
        <p><strong>Ganesh Chaturthi:</strong> Celebrated with grand processions, prayers, and devotion to Lord Ganesha.</p>
      </div>

      <!-- West Bengal -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.ePIw8NBj6pn-VAQ7Fzf_ZQHaFU?w=242&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Durga Puja" />
        <h4>West Bengal</h4>
        <p><strong>Durga Puja:</strong> A festival celebrating Goddess Durga with decorations and cultural events.</p>
      </div>

      <!-- Tamil Nadu -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.egn4jQic133UlIbtqzcKggHaEK?w=329&h=185&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Pongal" />
        <h4>Tamil Nadu</h4>
        <p><strong>Pongal:</strong> A harvest festival with offerings to the Sun God and delicious meals.</p>
      </div>

      <!-- Uttar Pradesh -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.eSp2DlI2E6nPF8TTBorkOwHaEo?w=289&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Mathura Holi" />
        <h4>Uttar Pradesh</h4>
        <p><strong>Mathura Holi:</strong> Known for its unique celebration in Lord Krishna’s birthplace.</p>
      </div>

      <!-- Kerala -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.UeoqoD_SX_4POUpmiJoJOgHaE8?w=250&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Onam" />
        <h4>Kerala</h4>
        <p><strong>Onam:</strong> A traditional festival with boat races, dance, and floral arrangements.</p>
      </div>

      <!-- Rajasthan -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.5NonPsKVGCiNvBI1VeICFQHaFJ?w=245&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Pushkar Fair" />
        <h4>Rajasthan</h4>
        <p><strong>Pushkar Fair:</strong> A colorful camel fair featuring music, races, and local traditions.</p>
      </div>

      <!-- Gujarat -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.Pn1G0PCQ32R-WdLQEr3IUwHaE8?w=264&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Navratri" />
        <h4>Gujarat</h4>
        <p><strong>Navratri:</strong> Celebrated with Garba and Dandiya Raas dances for nine nights.</p>
      </div>

      <!-- Punjab -->
      <div class="state-card">
        <img src="https://th.bing.com/th/id/OIP.Ly3zWw_dQPZE9r7OasvutgHaFj?w=213&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Lohri" />
        <h4>Punjab</h4>
        <p><strong>Lohri:</strong> A bonfire festival with folk songs and traditional dancing.</p>
      </div>
    </div>
  </section>

  <footer>
    &copy; 2025 Festivals of India. All Rights Reserved.
  </footer>

</body>
</html>
