<?php
session_start();
require 'db.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';

        switch ($action) {
            case 'register':
                // Registration logic
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response['message'] = 'Invalid email format';
                    break;
                }

                if (strlen($password) < 8) {
                    $response['message'] = 'Password must be at least 8 characters';
                    break;
                }

                if ($password !== $confirmPassword) {
                    $response['message'] = 'Passwords do not match';
                    break;
                }

                // Check if email exists
                $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $response['message'] = 'Email already registered';
                    break;
                }

                // Hash password and insert user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
                $stmt->execute([$email, $hashedPassword]);

                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_email'] = $email;

                $response['success'] = true;
                $response['message'] = 'Registration successful';
                break;

            case 'login':
                // Login logic
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];
                $remember = isset($_POST['remember']);

                $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_email'] = $email;

                    if ($remember) {
                        // Set cookie to expire in 30 days
                        $cookieValue = base64_encode($user['id'] . ':' . $email);
                        setcookie('remember_me', $cookieValue, time() + (30 * 24 * 60 * 60), '/');
                    }

                    $response['success'] = true;
                    $response['message'] = 'Login successful';
                } else {
                    $response['message'] = 'Invalid email or password';
                }
                break;

            case 'logout':
                // Logout logic
                session_unset();
                session_destroy();
                setcookie('remember_me', '', time() - 3600, '/');
                $response['success'] = true;
                $response['message'] = 'Logged out successfully';
                break;

            default:
                $response['message'] = 'Invalid action';
        }
    }
} catch (Exception $e) {
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

echo json_encode($response);
?>