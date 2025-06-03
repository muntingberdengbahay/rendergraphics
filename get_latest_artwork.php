<?php
require_once __DIR__ . '/includes/connect.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch latest artwork from the database
$stmt = $pdo->prepare("SELECT id, title, description, price, image_path FROM artworks ORDER BY created_at DESC LIMIT 1");
$stmt->execute();
$latestArtwork = $stmt->fetch(PDO::FETCH_ASSOC);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($latestArtwork);
?>
