<?php
include 'db.php';

// Fetch all images
$result = $conn->query("SELECT * FROM images ORDER BY uploaded_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Attack - Gallery </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .gallery-img {
            height: 200px;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .gallery-img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<?php include './includes/navbar.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">Gallery</h2>

    <div class="row">
        <?php while ($image = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-4 text-center">
                <a href="next.php?id=<?php echo $image['id']; ?>">
                    <img src="<?php echo $image['image_path']; ?>" class="img-fluid gallery-img" alt="Image">
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
