<?php
require_once __DIR__ . '/includes/connect.php';

header("Cache-Control: no-cache, no-store, must-revalidate"); // Prevent caching
header("Pragma: no-cache"); // Ensures older browser compatibility
header("Expires: 0"); 
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Paths
$productsFile = __DIR__ . "/js/products.js";

// Step 1: Fetch the latest artwork
$stmt = $pdo->prepare("SELECT id, title, description, price, image_path FROM artworks ORDER BY created_at DESC LIMIT 1");
$stmt->execute();
$latestArtwork = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$latestArtwork) {
    die(json_encode(["error" => "No artwork found."]));
}

// Step 2: Modify image path format
$modifiedImagePath = str_replace("images/", "watermarked_image.php?img=", $latestArtwork['image_path']);

// Step 3: Read `products.js` and find the highest ID
$productsData = file_get_contents($productsFile);
preg_match_all("/(\d+): \{/", $productsData, $matches);
$lastProductId = !empty($matches[1]) ? max($matches[1]) : 0;
$newProductId = $lastProductId + 1;

// Step 4: Format new product entry
$newProductEntry = "
$newProductId: {
    name: \"{$latestArtwork['title']}\",
    image: \"{$modifiedImagePath}\",
    price: \"₱{$latestArtwork['price']}\",
    originalPrice: \"₱" . ($latestArtwork['price'] * 1.2) . "\",
    discount: \"-20%\",
    description: \"{$latestArtwork['description']}\",
    reviews: []
},
";

// Step 5: Append new entry to `products.js`
$updatedContent = str_replace("};", "$newProductEntry };", $productsData);
file_put_contents($productsFile, $updatedContent);

// Return success response
echo json_encode(["status" => "success", "newProductId" => $newProductId]);
?>
