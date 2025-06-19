<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
<style>
footer {
  background-color: #2c3e50;
  color: #ecf0f1;
  padding: 40px 20px;
  text-align: center;
}

.footer-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  gap: 20px;
}

.footer-section {
  flex: 1;
  min-width: 250px;
}

.footer-section h3, .footer-section h4 {
  color: #f39c12;
  margin-bottom: 15px;
}

.footer-section p {
  margin: 5px 0;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section ul li {
  margin: 5px 0;
}

.footer-section ul li a {
  color: #ecf0f1;
  text-decoration: none;
}

.footer-section ul li a:hover {
  color: #f39c12;
}

.social-icons {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.social-icon img {
  width: 30px;
  height: 30px;
  transition: transform 0.3s ease;
}

.social-icon img:hover {
  transform: scale(1.1);
}

.footer-bottom {
  margin-top: 20px;
  font-size: 14px;
}

.footer-bottom p {
  color: #95a5a6;
}

  </style>
    
    
</head>



<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<nav  class="navbar navbar-expand-lg bg-body-tertiary"  style="padding: top 100px;background:linear-gradient(to right,#93c6fd, #ffffff);"></div>
 

      <div class="container-fluid">
        <img src="./vihara__1___1_-removebg-preview.png" alt="" width="100">
       

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <p style="font-style: italic;padding: left 0.02em" >Explore the colors of India</p>
        <div style="padding-left: 55%;" class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a style="color: black;" class="nav-link active" href="#">Home</a>
            </li>

            <li class="nav-item">
              <a style="color: black;" class="nav-link active" href="signup.php">signup</a>
            </li>

            <li class="nav-item">
              <a style="color: black;" class="nav-link" href="packages.php" >Packages</a>
            </li>

            <li class="nav-item">
              <a style="color: black;" class="nav-link" href="aboutus.php" >About us</a>
            </li>
          </a>

          <li class="nav-item">
            <a style="color: black;" class="nav-link" href="reviews.php" >Reviews and Ratings</a>
          </li>
  
            <li class="nav-item">
              <a style="color: black;" class="nav-link" href="contact us.php" >Contact us</a>
            </li>
          </a>
          </ul>  
        </div>
         
        
      </div>
    </nav>
    
    <div style="background-image: url(https://wallpapercave.com/wp/wp6445765.jpg);">
    <div class="row mb-4">
      <br>
  <div class="col"><br>
    <input type="text" id="destinationSearch" class="form-control" placeholder="Search by Destination">
  </div>
  <div class="col"><br>
    <input type="text" id="priceSearch" class="form-control" placeholder="Search by Price">
  </div>
  <div class="col"><br>
    <input type="text" id="durationSearch" class="form-control" placeholder="Search by Duration">
  </div>
</div>

  
    <table style="opacity: 50%;" class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th>Destination</th>
      <th>Price (₹)</th>
      <th>Duration</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="packageTable">
    <?php
    $conn = new mysqli("localhost", "root", "", "vihara");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
      ?>
      <tr data-destination="<?php echo $row['name']; ?>" data-budget="<?php echo $row['price']; ?>" data-duration="<?php echo $row['duration']; ?>">
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['price']); ?></td>
        <td><?php echo htmlspecialchars($row['duration']); ?></td>
        <td><a href="package_details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Package</a></td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
<br>
    
<br>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="sean-oulashin-KMn4VEeEPR8-unsplash.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Beaches</h5>
        <p class="card-text">Explore the most beautiful beaches in India with our exclusive beach tour packages.</p>
      </div>
      <div class="card-footer">
        <a href="beaches.php" style="padding-left: 46%;"  class="text-reset">View More</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://indiachalk.com/wp-content/uploads/2021/09/00.-blog-feature-image-india-chalk-scaled.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Festivals</h5>
        <p class="card-text">Experience the vibrant festivals across India, from Diwali to Holi, with our festival tours.</p>
      </div>
      <div class="card-footer">
        <a href="festivals.php" style="padding-left: 46%;"  class="text-reset">View More</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://images.pexels.com/photos/247478/pexels-photo-247478.jpeg?cs=srgb&dl=dawn-landscape-mountains-247478.jpg&fm=jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Mountains</h5>
        <p class="card-text">Embark on an adventurous mountain journey with our trekking and mountain tour packages.</p>
      </div>
      <div class="card-footer">
        <a href="mountains.php" style="padding-left: 46%;"  class="text-reset">View More</a>
      </div>
    </div>
  </div>
</div>
<br><br><br><br></div>
<!-- Footer -->

<div style="background-color: #79b6f7;" class="footer-container">
        <div class="footer-section">
          <h3>Vihara Travel</h3>
          <p>Explore budget-friendly destinations around the world.</p>
        </div>
    
        <div class="footer-section">
          <h4>Quick Links</h4>
          <ul style="color: black;">
            <li><a href="#">Home</a></li>
            <li><a href="#">Destinations</a></li>
            <li><a href="#">Packages</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
    
        <div class="footer-section">
          <h4>Contact</h4>
          <p>Email: viharatravels25@gmail.com</p>
          <p>Phone: +91 987654321</p>
        </div>
    
        <div class="footer-section">
          <h4>Follow Us</h4>
          <div class="social-icons">
            <a href="#" target="_blank" class="social-icon"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Facebook_colored_svg_copy-256.png" alt="Facebook"></a>
            <a href="#" target="_blank" class="social-icon"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Twitter_colored_svg-1024.png" alt="Twitter"></a>
            <a href="#" target="_blank" class="social-icon"><img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Instagram_colored_svg_1-256.png" alt="Instagram"></a>
          </div>
        </div>
      </div>

<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
© 2025 Copyright: Vihara Travel Agency Pvt Ltd.
</div>




    
    



<!-- JavaScript for filtering the table -->
<script>
  const destinationInput = document.getElementById('destinationSearch');
  const priceInput = document.getElementById('priceSearch');
  const durationInput = document.getElementById('durationSearch');

  function filterTable() {
    const destinationVal = destinationInput.value.toLowerCase();
    const priceVal = priceInput.value.toLowerCase();
    const durationVal = durationInput.value.toLowerCase();

    const rows = document.querySelectorAll('#packageTable tr');

    rows.forEach(row => {
      const destination = row.getAttribute('data-destination').toLowerCase();
      const price = row.getAttribute('data-budget').toLowerCase();
      const duration = row.getAttribute('data-duration').toLowerCase();

      const matchDestination = destination.includes(destinationVal);
      const matchPrice = price.includes(priceVal);
      const matchDuration = duration.includes(durationVal);

      if (matchDestination && matchPrice && matchDuration) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  destinationInput.addEventListener('keyup', filterTable);
  priceInput.addEventListener('keyup', filterTable);
  durationInput.addEventListener('keyup', filterTable);
</script>



</body>
</html>