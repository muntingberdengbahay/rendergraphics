<?php
defined('__ROOT__') or die("Access Denied!");
function sendEmail($to, $subject, $message) {
    $headers = "From: noreply@yourwebsite.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    return mail($to, $subject, $message, $headers);
}

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function redirect($url) {
    header("Location: " . $url);
    exit();
}
?>