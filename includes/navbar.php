<?php
include "script.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/aakashdhakal.ico">
    <title><?php echo $website_title; ?></title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Cabin">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
</head>

<body>
    <button id="themeToggle"><i class="fa-duotone fa-moon"></i></button>
    <button id="scrollToTop"><i class="fa-solid fa-up"></i></button>
    <div class="alert-box">
        <i></i>
        <div class="alert-message">
            <p id="alertHeading">ERROR!</p>
            <p id="alertMessage">Please Login to perform this action</p>
        </div>
    </div>

    <!-- Navigation -->
    <section id="navigation">
        <nav class="top-nav">
            <div class="hamburger-menu">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <ul class="social-links links">
                <li><a href="https://www.facebook.com/aakash_dhakal12"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/aakash_dhakal12"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.instagram.com/aakash_dhakal12"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="https://github.com/aakashdhakal"><i class="fa-brands fa-github"></i></a></li>
            </ul>
            <div class="logo">
                <img src="images/akash.svg" alt="logo" class="logo-image" />
                <img src="images/aakashdhakal.png" alt="logo" class="logo-image-mobile" />
            </div>
            <?php if (!isset($_SESSION['username'])) { ?>
                <div class="login-signup">
                    <button id="loginBtn">Login</button>
                    <button id="signupBtn">Register</button>
                </div>
            <?php } else { ?>
                <div class="user-control">
                    <p><?php echo $_SESSION["username"]; ?></p>
                    <img src="<?php echo $_SESSION["profilepic"]; ?>" alt="profilepic" id="userProfile" />
                    <button id="notificationBtn"><i class="fa-duotone fa-bell"></i>
                    </button>
                    <div class="sub-menu" id="subMenu">
                        <p><?php echo $_SESSION["username"]; ?></p>
                        <?php if ($_SESSION["role"] != "user") { ?>
                            <a href="admin.php"><i class="fa-solid fa-gauge-max"></i>Dashboard</a>
                        <?php  } ?>

                        <a href=""><i class="fas fa-user"></i>Profile</a>
                        <a href=""><i class="fas fa-gear"></i>Settings</a>
                        <a href=""><i class="fas fa-circle-info"></i>Help</a>
                        <a href="logout.php"><i class="fas fa-right-from-bracket"></i>Logout</a>
                    </div>
                    <div class="sub-menu" id="notificationMenu">
                        <a href="">Mark all as read</a>
                    </div>

                </div>
            <?php } ?>
        </nav>
        <hr>
        <ul class="bottom-nav links">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="contactus.php">Authors</a></li>
            <li><a href="blog.php">Categories</a></li>
            <li><a href="blog.php">About</a></li>
            <li><a href="blog.php">Contact</a></li>
        </ul>
        <dialog id="loginForm" name="form">
            <button id="closeBtn"><i class="fa-solid fa-xmark"></i></button>
            <div class="login-form">
                <h1>LOGIN</h1>
                <form action="" method="POST" class="loginForm">
                    <input type="text" name="username" placeholder="Username" id="loginUsername" />
                    <input type="password" name="password" placeholder="Password" id="loginPassword" />
                    <button type="submit" name="loginSubmit" id="loginSubmit">Login</button>
                </form>
            </div>
        </dialog>
    </section>