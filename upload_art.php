<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Upload Art</title></head>
<body>
  <h2>Upload Your Art</h2>
  <form method="POST" action="upload_process.php" enctype="multipart/form-data">
    Title: <input type="text" name="title" required><br>
    Price: <input type="number" name="price" step="0.01" required><br>
    Upload File: <input type="file" name="artfile" accept="image/*" required><br>
    <input type="submit" value="Upload">
  </form>
  <p><a href="dashboard.php">← Back to Dashboard</a></p>
</body>
</html>
