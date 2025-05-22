<?php
// Load the main image
$mainImgPath = 'uploads/product.jpg';
$mainImg = imagecreatefromjpeg($mainImgPath);

// Load the watermark image (should be PNG with transparency)
$watermarkPath = 'images/watermark15.png';
$watermark = imagecreatefrompng($watermarkPath);

// Get dimensions
$mainWidth = imagesx($mainImg);
$mainHeight = imagesy($mainImg);
$watermarkWidth = imagesx($watermark);
$watermarkHeight = imagesy($watermark);

// Position watermark (bottom right, 10px margin)
$x = $mainWidth - $watermarkWidth - 10;
$y = $mainHeight - $watermarkHeight - 10;

// Merge watermark onto main image
imagecopy($mainImg, $watermark, $x, $y, 0, 0, $watermarkWidth, $watermarkHeight);

// Output or save result
header('Content-Type: image/jpeg');
imagejpeg($mainImg);

// Clean up
imagedestroy($mainImg);
imagedestroy($watermark);
?>