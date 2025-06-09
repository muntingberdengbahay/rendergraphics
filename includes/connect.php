<?php
session_start(); // Start session across all pages

$host = 'localhost'; // Change if needed
$dbname = 'u492043267_mywebsite';
$username = 'u492043267_rendergraphics'; // Modify based on your setup
$password = 'R3nd3rgr4ph1cs'; // Modify based on your setup

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
