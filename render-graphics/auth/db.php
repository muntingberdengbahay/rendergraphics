<?php
$host = "localhost";
$dbname = "render_graphics";
$username = "root";
$password = ""; // Default for XAMPP. Change if needed.

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(json_encode(['success' => false, 'error' => 'Database connection failed']));
}
?>