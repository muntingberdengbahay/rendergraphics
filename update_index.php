<?php


header("Cache-Control: no-cache, no-store, must-revalidate"); // Prevent caching
header("Pragma: no-cache"); // Ensures older browser compatibility
header("Expires: 0"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/includes/connect.php';

// Paths
$indexDir = __DIR__ . '/';
$maxProductsPerPage = 8;

// Step 1: Find the highest indexX.php file (FIXED)
$files = glob($indexDir . "index*.php");

if (empty($files)) {
    die(json_encode(["error" => "No index files found"]));
}

// Extract and sort page numbers numerically
$pageNumbers = [];
foreach ($files as $file) {
    if (preg_match('/index(\d+)\.php$/', $file, $matches)) {
        $pageNumbers[] = (int)$matches[1];
    }
}

if (empty($pageNumbers)) {
    die(json_encode(["error" => "No valid index files found"]));
}

// Sort numerically in descending order
rsort($pageNumbers);
$lastPageNum = $pageNumbers[0];
$currentPageFile = "index{$lastPageNum}.php";
$fullPath = $indexDir . $currentPageFile;

// Debug output (you can remove this later)
error_log("Highest numbered file: " . $fullPath);

// Step 2: Count products in the latest page
$productCount = 0;
if (file_exists($fullPath)) {
    $content = file_get_contents($fullPath);
    preg_match_all('/\["name" => "[^"]+"/', $content, $matches);
    $productCount = count($matches[0]);
    
    // Debug output
    error_log("Found $productCount products in $currentPageFile");
} else {
    die(json_encode(["error" => "File $fullPath does not exist"]));
}

// Step 3: Determine correct index page
if ($productCount >= $maxProductsPerPage) {
    // Create new page if full
    $newPageNum = $lastPageNum + 1;
    $targetPage = "index{$newPageNum}.php";
    copy($templatePage, $indexDir . $targetPage);
} else {
    // Otherwise, use the existing page
    $targetPage = $currentPageFile;
}

// Step 4: Fetch the latest artwork
$stmt = $pdo->prepare("SELECT id, title, description, price, image_path FROM artworks ORDER BY created_at DESC LIMIT 1");
$stmt->execute();
$latestArtwork = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$latestArtwork) {
    die(json_encode(["error" => "No artwork found."]));
}

// Step 5: Format new product entry with correct image paths
$imagePath = (strpos($latestArtwork['image_path'], 'uploads/artworks/') !== false)
    ? $latestArtwork['image_path']  // Keep as-is if already in uploads folder
    : 'images/' . basename($latestArtwork['image_path']);  // Move to images folder

$newProductEntry = <<<ENTRY
    ["name" => "{$latestArtwork['title']}", "image" => "$imagePath", "price" => "₱{$latestArtwork['price']}", "originalPrice" => "₱" . ({$latestArtwork['price']} * 1.2), "discount" => "-20%"],
ENTRY;

// Step 6: Insert the new artwork into the $products array (AT THE BOTTOM)
$currentContent = file_get_contents($indexDir . $targetPage);

// Pattern to find the $products array
$pattern = '/(\$products\s*=\s*\[)(.*?)(\];)/s';
if (preg_match($pattern, $currentContent, $matches)) {
    $opening = $matches[1];
    $existingProducts = $matches[2];
    $closing = $matches[3];
    
    // MODIFIED: Add new product at the END of the array
    $updatedProducts = $opening . $existingProducts . "\n" . $newProductEntry . $closing;
    $updatedContent = preg_replace($pattern, $updatedProducts, $currentContent);
    
    if (file_put_contents($indexDir . $targetPage, $updatedContent) === false) {
        die(json_encode(["error" => "Failed to write to file"]));
    }
} else {
    die(json_encode(["error" => "Could not find \$products array in target file"]));
}

// Return success response
echo json_encode([
    "status" => "success", 
    "targetPage" => $targetPage,
    "productCount" => $productCount + 1
]);
?>