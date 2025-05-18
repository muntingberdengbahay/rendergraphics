<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "art_portfolio");
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM artworks WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
  <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
  <p><a href="upload_art.php">Upload New Art</a> | <a href="logout.php">Logout</a></p>

  <h2>Your Uploaded Art</h2>
  <?php while ($row = $result->fetch_assoc()) { ?>
    <div style="margin-bottom:20px;">
      <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
      <img src="uploads/watermarked/<?php echo $row['filename_watermarked']; ?>" width="200"><br>
      Price: $<?php echo $row['price']; ?>
    </div>
  <?php } ?>
</body>
</html>
