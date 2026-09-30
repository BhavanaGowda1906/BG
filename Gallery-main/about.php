<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - Art Attack</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Add these just before </body> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="style.css">
  <style>
 
    .about-section {
      /* padding: 60px 20px; */
      background-color: #f8f9fa;
    }
    .top-logo {
      display: block;
      margin: 0 auto;
      max-width: 250px;
      height: auto;
      width:;
    }
  </style>
</head>
<body>

<?php include './includes/navbar.php'; ?>

<!-- Top Centered Logo -->


<!-- About Section -->
<div class="container about-section">

<div class="container text-center my-4">
  <img src="images/logo.webp" alt="Art Attack Logo" class="top-logo">
</div>
  <h1 class="text-center mb-2">About Us</h1>
  <p class="lead text-center">Welcome to <strong>Art Attack</strong> – your personal photo gallery platform!</p>

  <p class="mt-4">
    Art Attack is built with simplicity and creativity in mind. This platform allows users to upload, view, and manage their favorite images easily. Whether you're a casual photographer, a designer, or just someone who loves collecting memories through photos – Art Attack is your digital space.
  </p>

  <p>
    Our gallery supports comments and easy navigation. We’re constantly working on adding more features and improvements to enhance your experience.
  </p>

  <p>
    Feel free to explore the gallery, upload your best shots, and share feedback!
  </p>

  <hr class="my-4">

  <div class="text-center mb-3">
    <a href="gallery.php" class="btn btn-primary" action="gallery.php">Visit Gallery</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
