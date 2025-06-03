<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Render Graphics</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
    <meta name="description" content="Welcome to Render Graphics—where digital art meets creativity.">
</head>

<body>
    <div class="startup-container">
        <div class="startup-overlay"></div>
        
        <div class="startup-content">
            <h1 class="fade-in">Welcome to <span class="highlight">Render Graphics</span></h1>
            <p class="fade-in-delay">Discover premium digital art and custom creations.</p>
            
            <button class="start-btn" onclick="startExperience()">Enter Portfolio</button>
        </div>
    </div>

    <script>
        function startExperience() {
            document.querySelector('.startup-container').classList.add('hide');
            setTimeout(() => {
                window.location.href = 'index.php'; // Redirect to main portfolio
            }, 500);
        }
    </script>

    <style>
        /* Background & Layout */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #EDE0D4; /* Soft neutral */
            color: #9C6644; /* Deep warm brown */
            font-family: 'Lora', serif;
        }

        .startup-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            background: rgba(237, 224, 212, 0.9); /* Light warmth */
            transition: opacity 0.5s ease-in-out;
        }

        .startup-container.hide {
            opacity: 0;
            pointer-events: none;
        }

        .startup-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('render-graphics/images/background.jpg') no-repeat center center / cover;
            filter: blur(5px);
            z-index: -1;
        }

        .startup-content {
            z-index: 2;
        }

        /* Fade-In Animation */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        .fade-in-delay {
            opacity: 0;
            animation: fadeIn 1s forwards 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Text Styling */
        .highlight {
            color: #B08968; /* Warm brown */
        }

        /* Button Styling */
        .start-btn {
            margin-top: 20px;
            padding: 12px 24px;
            font-size: 18px;
            background: #7F5539; /* Rich earthy tone */
            color: #EDE0D4; /* Soft neutral for contrast */
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .start-btn:hover {
            background: #9C6644; /* Slightly deeper tone */
        }
    </style>

</body>
</html>
