<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Art Attack - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <style>
    .carousel-item img {
      height: 300px;
      object-fit: cover;
    }

    .carousel-caption {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 10px 20px;
    }

    .custom-card {
      border-radius: 15px;
      overflow: hidden;
      height: 100%;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .custom-card img {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }

    .custom-card .card-body {
      height: 150px;
      overflow: hidden;
    }
  </style>
</head>
<body>

<?php include './includes/navbar.php'; ?>

<div class="container mt-5 text-center">
    <p class="fs-5 text-muted">
        Immerse yourself in the world of art. Whether you're an artist, a traveler, or a lover of landscapes, there's something here for everyone!
    </p>

    <h5 class="fw-bold text-primary mb-4">
        Discover stunning art pieces, Explore landscapes around the world, Hurry Up and share your creative journey!
    </h5>

    <h2 class="fw-bold mb-4">Explore Our Categories</h2>

    <div class="row g-4">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/gallery_background.jpg" class="card-img-top" alt="Gallery">
                <div class="card-body">
                    <p class="card-text">The gallery showcases a diverse collection of creative artwork, capturing beauty, imagination, and expression.</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/fav.jpg" class="card-img-top" alt="Japanese Landscape">
                <div class="card-body">
                    <p class="card-text">Japanese landscapes are a harmonious blend of natural beauty and cultural elegance, featuring serene mountains, cherry blossoms, and tranquil temples.</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/trecking.avif" class="card-img-top" alt="Trekking">
                <div class="card-body">
                    <p class="card-text">Trekking is an adventurous journey on foot through natural terrains often in remote and scenic locations like mountains, forests, or valleys.</p>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/aestetic.jpg" class="card-img-top" alt="Aesthetic">
                <div class="card-body">
                    <p class="card-text">Aesthetic refers to the appreciation of beauty, art, and taste, often evoking emotional or intellectual responses through visual or sensory experiences.</p>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/beach-sandy-beach-lagoon-tropical-landscape-wallpaper-preview.jpg" class="card-img-top" alt="Beach">
                <div class="card-body">
                    <p class="card-text">Beaches offer a tranquil escape with golden sands, gentle waves, and breathtaking ocean views.</p>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-md-4">
            <div class="card custom-card">
                <img src="./assets/images/wild-life.jpg" class="card-img-top" alt="Wildlife">
                <div class="card-body">
                    <p class="card-text">Wildlife showcases the beauty and diversity of nature, from majestic predators to delicate ecosystems.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
