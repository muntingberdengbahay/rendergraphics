<?php
session_start();
require 'connect.php';

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function get_user() {
    global $pdo;
    if (!is_logged_in()) return null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
