<?php
session_start();
require_once __DIR__ . '/includes/connect.php';

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

// Initialize variables
$errors = [];
$success = false;
$uploadDir = 'images/';

// Create upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Process form when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $title = trim($_POST['artTitle']);
    $description = trim($_POST['artDescription']);
    $price = (int)$_POST['artPrice'];
    $user_id = $_SESSION["user_id"];  // Using user_id instead of artist_id
    
    // Validate title
    if (empty($title)) {
        $errors['title'] = "Artwork title is required";
    } elseif (strlen($title) > 100) {
        $errors['title'] = "Title must be less than 100 characters";
    }
    
    // Validate description
    if (empty($description)) {
        $errors['description'] = "Description is required";
    }
    
    // Validate price
    if ($price < 100) {
        $errors['price'] = "Minimum price is ₱100";
    } elseif ($price > 1000000) {
        $errors['price'] = "Maximum price is ₱1,000,000";
    }
    
    // Handle file upload
    if (isset($_FILES['artImage']) && $_FILES['artImage']['error'] == UPLOAD_ERR_OK) {
        $file = $_FILES['artImage'];
        
        // File properties
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        
        // Get file extension
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Allowed extensions
        $allowed = ['jpg', 'jpeg', 'png'];
        
        // Validate file
        if (!in_array($fileExt, $allowed)) {
            $errors['image'] = "Only JPG, JPEG, and PNG files are allowed";
        } elseif ($fileSize > 5242880) { // 5MB in bytes
            $errors['image'] = "File size must be less than 5MB";
        }
    } else {
        $errors['image'] = "Please upload an image file";
    }
    
    // If no errors, process the upload
    if (empty($errors)) {
        // Generate unique filename
        $newFileName = uniqid('art_', true) . '.' . $fileExt;
        $uploadPath = $uploadDir . $newFileName;
        
        // Move uploaded file
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            // Insert into database
            try {
                $stmt = $pdo->prepare("INSERT INTO artworks 
                    (user_id, title, description, price, image_path) 
                    VALUES (?, ?, ?, ?, ?)");
                
                $stmt->execute([$user_id, $title, $description, $price, $uploadPath]);
                
                $success = true;
            } catch (PDOException $e) {
                $errors['database'] = "Database error: " . $e->getMessage();
                // Delete the uploaded file if database insert failed
                if (file_exists($uploadPath)) {
                    unlink($uploadPath);
                }
            }
        } else {
            $errors['upload'] = "There was an error uploading your file";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Status</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #ede0d4;
            color: #5c3a21;
        }
        
        .container { 
            max-width: 600px; 
            margin: 40px auto; 
            padding: 30px; 
            background: #e6ccb2;
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 1px solid #ddb892;
        }
        
        h2 {
            color: #7f5539;
            margin-bottom: 20px;
        }
        
        .success-message {
            color: #2e7d32;
            background-color: #e8f5e9;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #a5d6a7;
        }
        
        .error-message {
            color: #c62828;
            background-color: #ffebee;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #ef9a9a;
        }
        
        .error-list {
            margin: 10px 0 0 20px;
            padding: 0;
        }
        
        .btn {
            background: #7f5539;
            color: white; 
            padding: 12px 20px; 
            border: none; 
            border-radius: 6px;
            cursor: pointer; 
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
            margin-top: 15px;
        }
        
        .btn:hover { 
            background: #9c6644;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if ($success): ?>
        <h2>Upload Successful!</h2>
        <div class="success-message">
            Your artwork has been successfully listed for sale.
        </div>
        <a href="sellart.php" class="btn">Upload Another Artwork</a>
        <a href="#" class="btn" id="updateBtn">Back to Home</a>

<script>
document.getElementById("updateBtn").addEventListener("click", function(event) {
event.preventDefault(); // Prevent immediate navigation
// Run update_products.php first
fetch("update_products.php")
.then(() => fetch("update_index.php")) // Then run update_index.php
.then(() => {
window.location.href = "index.php"; // Redirect after both complete
})
.catch(error => console.error("Error updating products or index:", error));
});


</script>

        
    <?php else: ?>
        <h2>Upload Status</h2>
        
        <?php if (!empty($errors)): ?>
            <div class="error-message">
                <p>There were errors with your submission:</p>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <a href="sellart.php" class="btn">Try Again</a>
    <?php endif; ?>
</div>

</body>
</html>