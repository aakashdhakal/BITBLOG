<?php
include "includes/extra-script.php";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Arimo">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
</head>

<body>
    <button id="themeToggle"><i class="fa-duotone fa-moon"></i></button>
    <button id="scrollToTop"><i class="fa-solid fa-up"></i></button>
    <div class="alert-box">
        <i></i>
        <div class="alert-message">
            <p id="alertMessage">Please Login to perform this action</p>
        </div>
    </div>
    <div class="preloader">
        <div class="logo">
            <img src="images/Aakash-Dhakal's-logo.svg" alt="logo" class="logo" />
        </div>
        <img src="images/bouncing-circles.svg" alt="">
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
            <button id="closeBtn"><i class="fa-solid fa-xmark" style="color: #858585;"></i></button>
            <div class="max-width">
                <div class="left">
                </div>
                <div class="right">
                    <div class="alert-box-dialog">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p id="dialogAlertMessage">Invalid username or password</p>
                    </div>
                    <div class="section-heading-wrapper">
                        <h1 class="section-heading">Sign in to your account</h1>
                    </div>
                    <div class="login-form-group">
                        <form action="" method="POST" class="loginForm">
                            <div class="input-field">
                                <i class="fa-solid fa-user" style="color:#6e6e6e"></i>
                                <input type="text" name="username" placeholder="Username" id="loginUsername" />
                            </div>
                            <div class="input-field">
                                <i class="fa-solid fa-key" style="color:#6e6e6e"></i>
                                <input type="password" name="password" placeholder="Password" id="loginPassword" />
                                <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>
                            </div>
                            <div class="remember-recover">
                                <label for="rememberMe" class="custom-checkbox-label">
                                    <input type="checkbox" name="rememberMe" id="rememberMe" class="custom-checkbox" checked />
                                    <span class="custom-checkbox-box"></span>
                                    <p>Remember Me</p>
                                </label>
                                <a href="">Forgot Password ?</a>
                            </div>
                            <button type="submit" name="loginSubmit" id="loginSubmit" class="primary-btn">Login</button>
                            <p>Don't have an account ? &nbsp;<button id="signupLink" type="button">Sign up</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </dialog>
        <dialog id="signupForm" name="form">
            <button id="closeBtn"><i class="fa-solid fa-xmark" style="color: #858585;"></i></button>
            <div class="max-width">
                <div class="left">
                </div>
                <div class="right">
                    <div class="alert-box-dialog">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p id="dialogAlertMessage">Invalid username or password</p>
                    </div>
                    <div class="section-heading-wrapper">
                        <h1 class="section-heading">Create your account</h1>
                    </div>
                    <form action="" method="POST" class="signupForm" enctype="multipart/form-data">
                        <div class="form-step">
                            <span class="form-tab">1</span>
                            <span class="form-tab">2</span>
                            <span class="form-tab">3</span>
                            <span class="form-tab">4</span>
                        </div>
                        <div class="form-group">
                            <div class="input-field">
                                <i class="fa-solid fa-id-card" style="color:#6e6e6e"></i>
                                <input type="text" name="firstname" id="signupFirstname" placeholder="" />
                                <label class="placeholder">First Name<sup>*</sup></label>
                            </div>
                            <div class="input-field">
                                <i class="fa-solid fa-id-card" style="color:#6e6e6e"></i>
                                <input type="text" name="lastname" placeholder="" id="signupLastname" />
                                <label class="placeholder">Last Name<sup>*</sup></label>

                            </div>
                            <div class="input-field">
                                <i class="fa-solid fa-envelope" style="color:#6e6e6e"></i>
                                <input type="email" name="email" placeholder="" id="signupEmail" />
                                <label class="placeholder">Email<sup>*</sup></label>
                            </div>

                            <div class="next-prev-button">
                                <button type="button" class="prev-btn primary-btn">Back</button>
                                <button type="button" class="next-btn  primary-btn">Next</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-field">
                                <i class="fa-solid fa-user" style="color:#6e6e6e"></i>
                                <input type="text" name="username" placeholder="" id="signupUsername" />
                                <label class="placeholder">Username<sup>*</sup></label>
                            </div>

                            <div class="input-field">
                                <i class="fa-solid fa-key" style="color:#6e6e6e"></i>
                                <input type="password" name="password" placeholder="" id="signupPassword" />
                                <label class="placeholder">Password<sup>*</sup></label>
                                <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>

                            </div>
                            <div class="input-field">
                                <i class="fa-solid fa-key" style="color:#6e6e6e"></i>
                                <input type="password" name="confirmPassword" placeholder="" id="signupConfirmPassword" />
                                <label class="placeholder">Confirm Password<sup>*</sup></label>
                                <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>

                            </div>
                            <div class="next-prev-button">
                                <button type="button" class="prev-btn  primary-btn">Back</button>
                                <button type="button" class="next-btn  primary-btn">Next</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pic-role">
                                <div class="left">
                                    <div class="file-upload">
                                        <div class="file-upload-select">
                                            <button class="file-select-button primary-btn" type="button"><i class="fa-solid fa-upload"></i>
                                            </button>
                                            <div class="file-select-name">Profile Picture</div>
                                            <input type="file" name="profilepic" id="signupProfilepic">
                                        </div>
                                    </div>
                                    <div class="custom-select">
                                        <input type="text" readonly class="custom-select-display" placeholder="Role" name="role" id="signupRole">
                                        <ul class="custom-options">
                                            <li>Reader</li>
                                            <li>Author</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="right">
                                    <img src="images/noimage.png" alt="" id="profilepicPreview">
                                </div>
                            </div>


                            <div class="next-prev-button">
                                <button type="button" class="prev-btn  primary-btn">Back</button>
                                <button type="button" class="next-btn  primary-btn">Next</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Please verify your email</p>
                            <div class="input-field">
                                <i class="fa-solid fa-messages" style="color:#6e6e6e"></i>
                                <input type="text" name="otpEmail" id="otpEmail" placeholder="Enter 6 digits otp">
                                <button type="button" class="primary-btn" id="sendOtp">Send OTP</button>
                            </div>
                            <p>By signing up, you acknowledge and agree to accept our terms and conditions</p>
                            <div class="next-prev-button">
                                <button type="button" class="prev-btn  primary-btn">Back</button>
                                <button type="submit" name="signupSubmit" id="signupSubmit" class="primary-btn">Sign up</button>
                            </div>
                        </div>
                        <p>Already have and account ? &nbsp;<button id="loginLink" type="button">Log in</button>
                        </p>
                    </form>

                </div>
            </div>
        </dialog>
    </section>