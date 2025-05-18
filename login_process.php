<?php
session_start();
$conn = new mysqli("localhost", "root", "", "art_portfolio");

$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from database
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    echo "Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
} else {
    echo "Invalid email or password.";
}
?>
