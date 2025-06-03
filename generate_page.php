<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Paths
$productsFile = 'js/products.js';
$templatePage = 'index4.php'; // Use an existing page format for new ones
$maxProductsPerPage = 8;

// Step 1: Find the highest indexX.php file
$files = glob("index*.php");
sort($files);

// Extract the last page number
$lastPage = 1;
foreach ($files as $file) {
    preg_match("/index(\d+)\.php/", $file, $matches);
    if (!empty($matches[1])) {
        $pageNum = intval($matches[1]);
        if ($pageNum > $lastPage) {
            $lastPage = $pageNum;
        }
    }
}

// Step 2: Find last product ID from products.js
$productsData = file_get_contents($productsFile);
preg_match_all("/id: (\d+),/", $productsData, $matches);
$lastProductId = max($matches[1]);

// Step 3: Determine correct index page
$currentPage = ceil($lastProductId / $maxProductsPerPage);
$targetPage = "index{$currentPage}.php";

if ($lastProductId % $maxProductsPerPage == 0) {
    // Create a new page if the current one reaches the limit
    $newPage = $currentPage + 1;
    $targetPage = "index{$newPage}.php";
    
    // Duplicate the existing page template
    copy($templatePage, "public_html/{$targetPage}");
}

// Return the correct page for insertion
echo json_encode(["targetPage" => $targetPage]);
?>
