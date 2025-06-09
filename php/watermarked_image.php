<?php
header('Content-Type: image/jpeg'); // Default output format

$imagePath = 'images/' . basename($_GET['img']); // Dynamic image path
$watermarkPath = 'images/watermark30.png'; // Watermark (PNG)

if (!file_exists($imagePath) || !file_exists($watermarkPath)) {
    die('Error: Image or watermark not found.');
}

// Auto-detect image type
$imgType = exif_imagetype($imagePath);
switch ($imgType) {
    case IMAGETYPE_JPEG:
        $sourceImage = imagecreatefromjpeg($imagePath);
        header('Content-Type: image/jpeg');
        break;
    case IMAGETYPE_PNG:
        $sourceImage = imagecreatefrompng($imagePath);
        header('Content-Type: image/png');
        break;
    case IMAGETYPE_GIF:
        $sourceImage = imagecreatefromgif($imagePath);
        header('Content-Type: image/gif');
        break;
    default:
        die('Unsupported image type.');
}

$watermark = imagecreatefrompng($watermarkPath);

// Handle transparency
imagealphablending($watermark, true);
imagesavealpha($watermark, true);

// Get sizes
$srcW = imagesx($sourceImage);
$srcH = imagesy($sourceImage);
$wmW = imagesx($watermark);
$wmH = imagesy($watermark);

// Position watermark (bottom-right)
$x = $srcW - $wmW - 10;
$y = $srcH - $wmH - 10;

// Merge watermark onto image
imagecopy($sourceImage, $watermark, $x, $y, 0, 0, $wmW, $wmH);

// Output the image in correct format
if ($imgType === IMAGETYPE_PNG) {
    imagepng($sourceImage);
} elseif ($imgType === IMAGETYPE_GIF) {
    imagegif($sourceImage);
} else {
    imagejpeg($sourceImage, NULL, 90); // Default to JPEG
}

// Cleanup
imagedestroy($sourceImage);
imagedestroy($watermark);
?>
