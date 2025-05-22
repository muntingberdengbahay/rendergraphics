<?php
defined('__ROOT__') or die("Access Denied!");
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        redirect('/auth/login.php');
    }
}

function isConfirmed($email, $conn) {
    $stmt = $conn->prepare("SELECT confirmed FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($confirmed);
    $stmt->fetch();
    return $confirmed === 1;
}
?>