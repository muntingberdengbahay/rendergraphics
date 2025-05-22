<?php
defined('__ROOT__') or die("Access Denied!");
// Prevent direct access
if (!defined('__ROOT__')) {
    exit("Direct access forbidden");
}

define('__ROOT__', dirname(__FILE__));
include 'functions.php';

$host = 'localhost';      // Usually localhost
$db   = 'your_db_name';  // From cPanel > MySQL Databases
$user = 'your_db_user';  // Your MySQL username
$pass = 'your_db_pass';  // MySQL password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>