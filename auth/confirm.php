<?php
define('__ROOT__', dirname(__FILE__));
include '../includes/config.php';
include '../includes/functions.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $conn->prepare("UPDATE users SET confirmed = 1, confirm_token = NULL WHERE confirm_token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Your email has been confirmed! You can now log in.";
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}
?>