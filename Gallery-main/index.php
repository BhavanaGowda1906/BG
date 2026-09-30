<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Art Attack - Upload Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/gallery_background.jpg'); /* ✅ Update this path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white */
            backdrop-filter: blur(10px); /* Blurred background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #333;
            font-weight: 600;
        }

        .btn {
            width: 100px;
        }

        .btn + .btn {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <?php include './includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Image</h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
            $imgName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            $targetPath = "uploads/" . basename($imgName);
            $category = $_POST['category'];

            if (move_uploaded_file($tmpName, $targetPath)) {
                $stmt = $conn->prepare("INSERT INTO images (image_path, category) VALUES (?, ?)");
                $stmt->bind_param("ss", $targetPath, $category);
                $stmt->execute();
                echo "<div class='alert alert-success text-center'>Image uploaded successfully!</div>";
            } else {
                echo "<div class='alert alert-danger text-center'>Upload failed.</div>";
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6">
                <div class="form-container bg-transparent">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control bg-transparent" type="file" name="image" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control bg-transparent" type="text" name="category" placeholder="Enter category (e.g. Nature)" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Upload</button>
                            <a class="btn btn-success" href="gallery.php">View</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
