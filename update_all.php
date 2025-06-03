<?php
require_once __DIR__ . '/includes/connect.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Call update_products.php
$responseProducts = file_get_contents("http://yourwebsite.com/update_products.php");

// Call update_index.php
$responseIndex = file_get_contents("http://yourwebsite.com/update_index.php");

// Return a success response
echo json_encode(["status" => "success", "productsResponse" => $responseProducts, "indexResponse" => $responseIndex]);
?>
