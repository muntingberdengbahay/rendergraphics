<?php
// Error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Default to JPEG if we can't determine type
header('Content-Type: image/jpeg');

// Validate input
if (empty($_GET['img'])) {
    die('Error: No image specified.');
}

$imagePath = 'images/' . basename($_GET['img']);
$watermarkPath = 'images/watermark30.png';

// Security check - prevent directory traversal
if (strpos($_GET['img'], '..') !== false || !file_exists($imagePath)) {
    die('Error: Invalid image path.');
}

if (!file_exists($watermarkPath)) {
    die('Error: Watermark not found.');
}

try {
    // Auto-detect image type
    $imgType = exif_imagetype($imagePath);
    if (!$imgType) {
        die('Error: Could not determine image type.');
    }

    // Create image resource based on type
    switch ($imgType) {
        case IMAGETYPE_JPEG:
            $sourceImage = @imagecreatefromjpeg($imagePath);
            if (!$sourceImage) die('Error loading JPEG image');
            header('Content-Type: image/jpeg');
            break;
        case IMAGETYPE_PNG:
            $sourceImage = @imagecreatefrompng($imagePath);
            if (!$sourceImage) die('Error loading PNG image');
            header('Content-Type: image/png');
            break;
        case IMAGETYPE_GIF:
            $sourceImage = @imagecreatefromgif($imagePath);
            if (!$sourceImage) die('Error loading GIF image');
            header('Content-Type: image/gif');
            break;
        default:
            die('Unsupported image type.');
    }

    $watermark = @imagecreatefrompng($watermarkPath);
    if (!$watermark) die('Error loading watermark');

    // Handle transparency
    imagealphablending($watermark, true);
    imagesavealpha($watermark, true);

    // Get sizes
    $srcW = imagesx($sourceImage);
    $srcH = imagesy($sourceImage);
    $wmW = imagesx($watermark);
    $wmH = imagesy($watermark);

    // Position watermark (bottom-right with 10px margin)
    $x = max(0, $srcW - $wmW - 10); // Ensure not negative
    $y = max(0, $srcH - $wmH - 10); // Ensure not negative

    // Merge watermark onto image
    if (!imagecopy($sourceImage, $watermark, $x, $y, 0, 0, $wmW, $wmH)) {
        die('Error applying watermark');
    }

    // Output the image in correct format
    switch ($imgType) {
        case IMAGETYPE_PNG:
            imagepng($sourceImage);
            break;
        case IMAGETYPE_GIF:
            imagegif($sourceImage);
            break;
        default:
            imagejpeg($sourceImage, NULL, 90); // Default to JPEG
    }

    // Cleanup
    imagedestroy($sourceImage);
    imagedestroy($watermark);

} catch (Exception $e) {
    die('Error processing image: ' . $e->getMessage());
}
?>