<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <style>
        .header-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            padding: 10px 20px;
            position: relative;
        }
        
        .cart {
            font-size: 18px;
            color: #333;
            cursor: pointer;
            padding: 10px;
        }
        
        .user-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .profile-container {
            position: relative;
            display: inline-block;
        }
        
        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        .dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown a:hover {
            background-color: #f1f1f1;
        }
        
        .show {
            display: block;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <!-- User actions first -->
        <div class="user-actions">
            <?php if (isset($_SESSION['user_email'])): ?>
                <div class="profile-container">
                    <i class="fa fa-user-circle profile-icon" onclick="toggleDropdown()"></i>
                    <div id="profileDropdown" class="dropdown">
                        <a href="auth/logout.php">Log Out</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="javascript:void(0)" class="sign-in"><i class="far fa-user"></i> Sign In</a>
            <?php endif; ?>
        </div>
        
        <!-- Cart icon second -->
        <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i> Cart</a> <!-- NADAGDAG -->
    </div>

    <script>
    function toggleDropdown() {
        document.getElementById("profileDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.profile-icon')) {
            var dropdowns = document.getElementsByClassName("dropdown");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    </script>
</body>
</html>