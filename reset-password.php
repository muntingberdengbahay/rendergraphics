<?php
require_once __DIR__ . '/includes/connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$resetToken = $_GET['token'] ?? null;
if (!$resetToken) {
    die("Invalid reset token.");
}

// Verify token in the database
$stmt = $pdo->prepare("SELECT email, reset_expires FROM users WHERE reset_token = :reset_token");
$stmt->execute([':reset_token' => $resetToken]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Invalid reset token.");
}

// Check if token has expired
if (strtotime($user['reset_expires']) < time()) {
    die("Reset token has expired.");
}

// Password validation function
function isValidPassword($password) {
    return (
        strlen($password) >= 8 &&     // At least 8 characters
        preg_match('/[A-Z]/', $password) && // At least 1 uppercase letter
        preg_match('/[a-z]/', $password) && // At least 1 lowercase letter
        preg_match('/[0-9]/', $password) && // At least 1 number
        preg_match('/[^A-Za-z0-9]/', $password) // At least 1 special character
    );
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newPassword = $_POST['new_password'] ?? null;
    $confirmPassword = $_POST['confirm_password'] ?? null;

    if (!$newPassword || !$confirmPassword) {
        echo "Both password fields are required.";
    } elseif ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
    } elseif (!isValidPassword($newPassword)) {
        echo "Password does not meet security requirements.";
    } else {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // Update password & clear reset token
        $stmt = $pdo->prepare("UPDATE users SET password = :password, reset_token = NULL, reset_expires = NULL WHERE reset_token = :reset_token");
        $stmt->execute([
            ':password' => $hashedPassword,
            ':reset_token' => $resetToken
        ]);

        echo "Password reset successful! You may now <a href='index.php'>sign in</a>.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: auto; padding: 20px; }
        input { width: 100%; padding: 10px; margin-bottom: 10px; }
        button { background-color: #7f5539; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<h2>Reset Your Password</h2>


<form method="post">
    <label>New Password: <input type="password" name="new_password" id="newPassword" required></label>
    <label>Confirm Password: <input type="password" name="confirm_password" required></label>
    <p>Password must contain:</p>
<ul>
    <li id="req-length">✗ At least 8 characters</li>
    <li id="req-uppercase">✗ 1 uppercase letter</li>
    <li id="req-lowercase">✗ 1 lowercase letter</li>
    <li id="req-number">✗ 1 number</li>
    <li id="req-special">✗ 1 special character</li>
</ul>
    <button type="submit">Reset Password</button>
</form>

<script>
document.getElementById('newPassword').addEventListener('input', function() {
    const password = this.value;
    
    const requirements = {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /[0-9]/.test(password),
        special: /[^A-Za-z0-9]/.test(password)
    };

    Object.keys(requirements).forEach(key => {
        const element = document.getElementById(`req-${key}`);
        if (element) {
            element.innerHTML = (requirements[key] ? '✓' : '✗') + ' ' + element.textContent.replace(/^[✓✗]\s/, '');
            element.style.color = requirements[key] ? 'green' : 'red';
        }
    });
});
</script>
</body>
</html>
