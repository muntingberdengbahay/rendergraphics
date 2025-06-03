<?php
session_start();
require_once __DIR__ . '/../includes/connect.php';

// Retrieve JSON input
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

if (!isset($data['action'], $data['email'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

$action = $data['action'];
$email = trim($data['email']);
$password = isset($data['password']) ? trim($data['password']) : null;

if ($action === 'register') {
    // Prevent duplicate email registration
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Email already registered.']);
        exit;
    }

    // Hash password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $createdAt = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO users (email, password, created_at) VALUES (:email, :password, :created_at)");
    $success = $stmt->execute([
        ':email' => $email,
        ':password' => $hashedPassword,
        ':created_at' => $createdAt
    ]);

    echo json_encode(['success' => $success, 'message' => $success ? 'Registration successful' : 'Registration failed']);

} elseif ($action === 'signin') {
    $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store session data upon successful login
        $_SESSION["user_email"] = $user["email"];
        $_SESSION["user_id"] = $user["id"];

        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }

} elseif ($action === 'forgot_password') {
    // Check if email exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'Email not found']);
        exit;
    }

    // Generate a secure token
    $resetToken = bin2hex(random_bytes(32));
    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 minutes'));

    // Store token and expiration in database
    $stmt = $pdo->prepare("UPDATE users SET reset_token = :reset_token, reset_expires = :reset_expires WHERE email = :email");
    $stmt->execute([
        ':reset_token' => $resetToken,
        ':reset_expires' => $expiresAt,
        ':email' => $email
    ]);

    // Send email using PHP Mailer
    require_once __DIR__ . '/../includes/send_reset_email.php';
    $emailSent = sendPasswordResetEmail($email, $resetToken);

    echo json_encode(['success' => $emailSent, 'message' => $emailSent ? 'Reset email sent!' : 'Email sending failed']);

} else {
    echo json_encode(['success' => false, 'message' => 'Invalid action']);
}
?>
