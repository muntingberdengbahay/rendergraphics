<?php
session_start();
require_once __DIR__ . '/includes/connect.php';

// Redirect if user isn't logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell Your Art</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #ede0d4; /* Lightest color for background */
            color: #5c3a21; /* Dark brown for text */
        }
        
        .container { 
            max-width: 600px; 
            margin: 40px auto; 
            padding: 30px; 
            background: #e6ccb2; /* Light warm beige */
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 1px solid #ddb892; /* Soft border */
        }
        
        h2 {
            color: #7f5539; /* Darker brown for headings */
            margin-bottom: 8px;
        }
        
        .subtitle {
            color: #b08968; /* Medium brown */
            margin-bottom: 25px;
            font-style: italic;
        }
        
        .form-group { 
            margin-bottom: 20px; 
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #7f5539; /* Darker brown */
            font-weight: 600;
        }
        
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddb892;
            border-radius: 6px;
            background-color: #f5ebe0;
            box-sizing: border-box;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #b08968;
            background-color: #fff;
            box-shadow: 0 0 0 2px rgba(176, 137, 104, 0.2);
        }
        
        .file-hint {
            font-size: 14px;
            color: #b08968;
            margin-top: 5px;
        }
        
        .btn-submit { 
            background: #7f5539; /* Primary button color */
            color: white; 
            padding: 14px; 
            width: 100%; 
            border: none; 
            border-radius: 6px;
            cursor: pointer; 
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: background 0.3s;
            margin-top: 10px;
        }
        
        .btn-submit:hover { 
            background: #9c6644; /* Slightly lighter brown on hover */
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sell Your Artwork</h2>
    <p class="subtitle">Share your creative work with our community</p>

    <form id="artUploadForm" action="process_upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="artImage">Upload Artwork</label>
            <input type="file" id="artImage" name="artImage" accept="image/jpeg, image/png" required>
            <p class="file-hint">JPG or PNG, max 5MB</p>
        </div>

        <div class="form-group">
            <label for="artTitle">Artwork Title</label>
            <input type="text" id="artTitle" name="artTitle" placeholder="e.g. Midnight Serenity" required>
        </div>

        <div class="form-group">
            <label for="artDescription">Description</label>
            <textarea id="artDescription" name="artDescription" rows="5" placeholder="Tell us about your artwork..." required></textarea>
        </div>

        <div class="form-group price-group">
            <label for="artPrice">Price (₱)</label>
                       <input type="number" id="artPrice" name="artPrice" min="100" placeholder="Minimum of ₱100" required>

        </div>

        <button type="submit" class="btn-submit">List My Artwork</button>
    </form>
</div>

</body>
</html>