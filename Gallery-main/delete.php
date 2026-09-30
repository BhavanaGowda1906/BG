<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $result = $conn->query("SELECT image_path FROM images WHERE id = $id");
    if ($result->num_rows > 0) {
        $image = $result->fetch_assoc();
        $imagePath = $image['image_path'];

        if (file_exists($imagePath)) {
            if (unlink($imagePath)) {
                echo "Image file deleted successfully.<br>";
            } else {
                echo "Failed to delete the image file.<br>";
            }
        } else {
            echo "Image file does not exist at: $imagePath<br>";
        }

        $deleteQuery = "DELETE FROM images WHERE id = $id";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Database record deleted successfully.<br>";
        } else {
            echo "Error deleting record: " . $conn->error . "<br>";
        }
    } else {
        echo "No image found with ID: $id<br>";
    }
}

header("Location: gallery.php");
exit();
?>
