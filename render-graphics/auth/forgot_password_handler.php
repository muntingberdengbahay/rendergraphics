<?php
header('Content-Type: application/json');
require 'db.php';

$email = $_POST['email'] ?? '';
if (!$email) {
    echo json_encode(['success' => false, 'error' => 'Email is required']);
    exit;
}

// Check if user exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(['success' => true, 'message' => 'If this email is registered, instructions have been sent.']);
    exit;
}

$token = bin2hex(random_bytes(16));
$expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

// Save token
$stmt = $pdo->prepare("UPDATE users SET reset_token=?, reset_expiry=? WHERE id=?");
$stmt->execute([$token, $expiry, $user['id']]);

// Simulate sending email (for dev: echo the link)
$resetLink = "http://localhost/reset_password.php?token=$token";
echo json_encode(['success' => true, 'message' => 'Password reset instructions sent.', 'reset_link' => $resetLink]);
?>