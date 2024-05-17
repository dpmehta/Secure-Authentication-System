<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Authentication System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-top: 50px;
        }
        .welcome-message {
            font-size: 24px;
            margin-top: 20px;
        }
        .logout-link {
            padding: 5px 20px;
            margin-top: 30px;
            color: black;
            text-decoration: none;
            font-weight: bold;
            border:2px solid black;
            border-radius:5px;
        }
        img{
        height:92%;
        width:100%;
        position:absolute;
        z-index:-2;
        opacity: 0.8;
      }
    </style>
</head>
<body>
    <?php
        require 'partials/navbar.php';
    ?>
    <img src="banner.webp" alt="photo"/>
    <div class="container">
        <h1>Welcome to Authentication System</h1>
        <?php 
            if(isset($_SESSION['username'])) {
                echo '<p class="welcome-message">Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</p>';
            }
        ?>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
</body>
</html>
