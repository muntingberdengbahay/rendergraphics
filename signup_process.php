<?php
$conn = new mysqli("localhost", "root", "", "art_portfolio");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);
$stmt->execute();

echo "Registration successful! <a href='login.php'>Login</a>";
?>
