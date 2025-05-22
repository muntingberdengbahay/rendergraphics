<?php
define('__ROOT__', dirname(__FILE__));
include '../includes/config.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = sanitizeInput($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Email already registered.");
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (email, password, confirm_token) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $password, $token);
    $stmt->execute();

    // Send confirmation email
    $subject = "Confirm Your Email";
    $message = "Thank you for registering with Render Graphics.<br><br>";
    $message .= "Please click the link below to confirm your email:<br><br>";
    $message .= "<a href='https://yourwebsite.com/auth/confirm.php?token= $token'>Confirm Email</a>";

    sendEmail($email, $subject, $message);

    echo "Registration successful! Please check your email to confirm your account.";
}
?>

<!-- Simple Registration Form -->
<h2>Register</h2>
<form method="post" action="register.php">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
</form>