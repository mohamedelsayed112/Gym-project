<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitLife Gym</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header class="text-white p-3" style="background-color: black">
        <div class="container">
        <img src="7OCqj0wF_400x400.jpg" class="img-fluid" alt="Gym Image" style="width: 100px;">
            <h1>FitLife Gym</h1>
            <nav>
                <a href="index.php" class="text-white mx-2"><i class="fas fa-home"></i> Home</a>
                <a href="about-us.php" class="text-white mx-2"><i class="fas fa-info-circle"></i> About Us</a>
                <a href="contact-us.php" class="text-white mx-2"><i class="fas fa-envelope"></i> Contact Us</a>
                <?php
                if(!isset($_SESSION['name']))
                {
                    echo'<a href="signin.php" class="text-white mx-2"><i class="fas fa-sign-in-alt"></i> Sign In</a>';
                    echo'<a href="signup_handler.php" class="text-white mx-2"><i class="fas fa-user-plus"></i> Sign Up</a>';
                }
                else
                {
                    echo'<a href="logout.php" class="text-white mx-2"><i class="fas fa-user-plus"></i>logout</a>';
                }
                ?>
                
            </nav>
        </div>
    </header>
