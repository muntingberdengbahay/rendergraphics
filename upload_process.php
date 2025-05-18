<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// DB Connection
$conn = new mysqli("localhost", "root", "", "art_portfolio");

// Get data from form
$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$price = $_POST['price'];

// Handle uploaded file
$original_name = $_FILES['artfile']['name'];
$tmp_path = $_FILES['artfile']['tmp_name'];
$ext = pathinfo($original_name, PATHINFO_EXTENSION);

// Generate unique file name
$unique_name = uniqid() . '.' . $ext;
$original_path = "uploads/original/" . $unique_name;
$watermarked_path = "uploads/watermarked/" . $unique_name;

// Make sure upload folders exist
if (!file_exists('uploads/original')) mkdir('uploads/original', 0777, true);
if (!file_exists('uploads/watermarked')) mkdir('uploads/watermarked', 0777, true);

// Move the original file to the server
move_uploaded_file($tmp_path, $original_path);

// Load the image using GD
$image_data = file_get_contents($original_path);
$img = imagecreatefromstring($image_data);
if (!$img) {
    die("Error: Unable to create image. Ensure the uploaded file is a valid image.");
}

// Image dimensions
$img_width = imagesx($img);
$img_height = imagesy($img);

// Watermark text
$wm_text = "WATERMARK";
$font_size = 5; // from 1 to 5 (only sizes supported by imagestring)
$text_width = imagefontwidth($font_size) * strlen($wm_text);
$text_height = imagefontheight($font_size);
$x = ($img_width - $text_width) / 2;
$y = ($img_height - $text_height) / 2;

// Text color (white)
$color = imagecolorallocate($img, 255, 255, 255);

// Add watermark to image
imagestring($img, $font_size, $x, $y, $wm_text, $color);

// Save watermarked image
imagejpeg($img, $watermarked_path);
imagedestroy($img);

// Store into database
$stmt = $conn->prepare("INSERT INTO artworks (user_id, title, filename_original, filename_watermarked, price) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isssd", $user_id, $title, $unique_name, $unique_name, $price);
$stmt->execute();

// Confirmation
echo "✅ Upload complete!<br><a href='dashboard.php'>Go back to Dashboard</a>";
?>
