<?php
include 'db.php';

// Redirect to first image if no ID is passed
if (!isset($_GET['id'])) {
    $first_result = $conn->query("SELECT id FROM images ORDER BY id ASC LIMIT 1");
    if ($first_result && $first_result->num_rows > 0) {
        $first_image = $first_result->fetch_assoc();
        header("Location: next.php?id=" . $first_image['id']);
        exit();
    } else {
        echo "No images found in the database.";
        exit();
    }
}

// Get current image ID from query
$image_id = intval($_GET['id']);

// Fetch image details
$image_result = $conn->query("SELECT * FROM images WHERE id = $image_id");
$image = $image_result->fetch_assoc();

if (!$image) {
    echo "Image not found.";
    exit();
}

// Fetch previous and next images
$prev_result = $conn->query("SELECT id FROM images WHERE id < $image_id ORDER BY id DESC LIMIT 1");
$prev_image = $prev_result->fetch_assoc();

$next_result = $conn->query("SELECT id FROM images WHERE id > $image_id ORDER BY id ASC LIMIT 1");
$next_image = $next_result->fetch_assoc();

// Handle comment form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
    $user_name = $conn->real_escape_string($_POST['user_name']);
    $comment = $conn->real_escape_string($_POST['comment']);
    $conn->query("INSERT INTO comments (image_id, user_name, comment) VALUES ($image_id, '$user_name', '$comment')");
    header("Location: next.php?id=$image_id");
    exit();
}

// Fetch comments
$comments_result = $conn->query("SELECT * FROM comments WHERE image_id = $image_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Art Attack - View Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .gallery-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<?php include './includes/navbar.php'; ?>

<div class="container mt-4">
    <h2 class="mb-3">Image View</h2>

    <!-- Display Image -->
    <img src="<?php echo $image['image_path']; ?>" class="gallery-img" alt="Image">
    <p class="text-center">Category: <?php echo $image['category']; ?> | Uploaded At: <?php echo $image['uploaded_at']; ?></p>

    <!-- Buttons Row -->
    <div class="d-flex justify-content-center gap-3 mb-4">
        <?php if ($prev_image): ?>
            <a href="next.php?id=<?php echo $prev_image['id']; ?>" class="btn btn-primary">Previous</a>
        <?php endif; ?>

        <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
            <input type="hidden" name="id" value="<?php echo $image_id; ?>">
            <button type="submit" class="btn btn-danger">Delete Image</button>
        </form>

        <?php if ($next_image): ?>
            <a href="next.php?id=<?php echo $next_image['id']; ?>" class="btn btn-primary">Next</a>
        <?php endif; ?>
    </div>

    <!-- Comment Form -->
    <div class="mb-4">
        <h5>Leave a Comment:</h5>
        <form method="POST">
            <div class="mb-2">
                <input type="text" name="user_name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-2">
                <textarea name="comment" class="form-control" rows="3" placeholder="Your Comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>

    <!-- Display Comments -->
    <div>
        <h5>Comments:</h5>
        <?php if ($comments_result->num_rows > 0): ?>
            <?php while ($comment = $comments_result->fetch_assoc()): ?>
                <div class="mb-3 border rounded p-2">
                    <strong><?php echo htmlspecialchars($comment['user_name']); ?>:</strong>
                    <p class="mb-1"><?php echo htmlspecialchars($comment['comment']); ?></p>
                    <small class="text-muted">Posted on <?php echo $comment['created_at']; ?></small>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No comments yet.</p>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
