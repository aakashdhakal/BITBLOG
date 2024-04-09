</head>


<body>

    <button id="themeToggle"><i class="fa-duotone fa-moon"></i></button>
    <button id="scrollToTop"><i class="fa-solid fa-up"></i></button>
    <div class="alert-box-container">
        <div class="alert-box">
            <i></i>
            <div class="alert-message">
                <p id="alertMessage">Please Login to perform this action</p>
            </div>
        </div>
    </div>
    <div class="preloader">
        <img src="<?php echo BASE_URL ?>images/BitBlog-B.svg" alt="">
        <span class="loader"></span>
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
                <img src="<?php echo BASE_URL ?>images/akash.svg" alt="logo" class="logo-image" />
                <img src="<?php echo BASE_URL ?>images/aakashdhakal.png" alt="logo" class="logo-image-mobile" />
            </div>
            <?php if (!isset($_SESSION['username'])) { ?>
                <div class="login-signup">
                    <button id="loginBtn">Login</button>
                    <button id="signupBtn">Register</button>
                </div>
            <?php } else { ?>
                <div class="user-control">
                    <p><?php echo $_SESSION["username"]; ?></p>
                    <img src="<?php echo BASE_URL . $_SESSION["profilepic"]; ?>" alt="profilepic" id="userProfile" />
                    <button id="notificationBtn"><i class="fa-duotone fa-bell"></i>
                    </button>
                    <div class="sub-menu" id="subMenu">
                        <p><?php echo $_SESSION["username"]; ?></p>
                        <?php if (isset($_SESSION["username"]) && $_SESSION["role"] != "Reader") { ?>
                            <a href="<?php echo BASE_URL ?>dashboard"><i class="fa-solid fa-gauge-max"></i>Dashboard <p><?php echo $role ?></p>
                            </a>
                        <?php  } ?>

                        <a href=""><i class="fas fa-user"></i>Profile</a>
                        <a href=""><i class="fas fa-gear"></i>Settings</a>
                        <a href=""><i class="fas fa-circle-info"></i>Help</a>
                        <a href="<?php echo BASE_URL ?>logout"><i class="fas fa-right-from-bracket"></i>Logout</a>
                    </div>
                    <div class="sub-menu" id="notificationMenu">
                        <a href="">Mark all as read</a>
                    </div>

                </div>
            <?php } ?>
        </nav>
        <hr>
        <ul class="bottom-nav links">
            <li><a href="/A.D-Blogs" class="active">Home</a></li>
            <li><a href="contactus.php">Authors</a></li>
            <li><a href="blog.php">Categories</a></li>
            <li><a href="blog.php">About</a></li>
            <li><a href="blog.php">Contact</a></li>
        </ul>
        <dialog id="loginForm" name="form" class="popup-dialog">
            <button id="closeBtn"><i class="fa-solid fa-xmark" style="color: #858585;"></i></button>
            <div class="max-width">
                <div class="left">
                </div>
                <div class="right">
                    <div class="alert-box-dialog">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p id="dialogAlertMessage">Invalid username or password</p>
                    </div>
                    <div class="section-heading-wrapper">
                        <h1 class="section-heading">Login to your account</h1>
                    </div>

                    <div class="login-form-group">
                        <form action="" method="POST" class="loginForm">
                            <div class="input-field">
                                <input type="text" name="username" placeholder="" id="loginUsername" />
                                <label class="placeholder">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" placeholder="" id="loginPassword" />
                                <label class="placeholder">Password</label>
                                <button class="password-show" type="button"><i class="fa-solid fa-eye"></i></button>
                            </div>
                            <div class="remember-recover">
                                <label for="rememberMe" class="custom-checkbox-label">
                                    <input type="checkbox" name="rememberMe" id="rememberMe" class="custom-checkbox" checked />
                                    <span class="custom-checkbox-box"></span>
                                    <p>Remember Me</p>
                                </label>
                                <button class="tertairy-btn" type="button" id="forgetPass">Forgot Password ?</button>
                            </div>
                            <button type="submit" name="loginSubmit" id="loginSubmit" class="primary-btn">Log in</button>
                            <p>Don't have an account ? &nbsp;<button id="signupLink" type="button" class="tertairy-btn">Sign up</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </dialog>
        <dialog id="signupForm" name="form" class="popup-dialog">
            <button id="closeBtn"><i class="fa-solid fa-xmark" style="color: #858585;"></i></button>
            <div class="max-width">
                <div class="left">
                </div>
                <div class="right">
                    <div class="alert-box-dialog">
                        <i class="fa-solid fa-circle-exclamation"></i>
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
                                <input type="text" name="firstname" id="signupFirstname" placeholder="" />
                                <label class="placeholder">First Name<sup>*</sup></label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="lastname" placeholder="" id="signupLastname" />
                                <label class="placeholder">Last Name<sup>*</sup></label>

                            </div>
                            <div class="input-field">
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
                                <input type="text" name="username" placeholder="" id="signupUsername" />
                                <label class="placeholder">Username<sup>*</sup></label>
                            </div>

                            <div class="input-field">
                                <input type="password" name="password" placeholder="" id="signupPassword" />
                                <label class="placeholder">Password<sup>*</sup></label>
                                <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>

                            </div>
                            <div class="input-field">
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
                                    <img src="<?php echo BASE_URL ?>images/noimage.png" alt="" id="profilepicPreview">
                                </div>
                            </div>


                            <div class="next-prev-button">
                                <button type="button" class="prev-btn  primary-btn">Back</button>
                                <button type="button" class="next-btn  primary-btn">Next</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Enter the 6-digits verification code that is sent to your email</p>
                            <div class="input-field">
                                <input type="text" name="otpEmail" id="otpEmail" placeholder="Enter 6 digits otp">
                                <button type="button" class="tertairy-btn sendOtp" id="sendOtp">Send Code</button>
                            </div>
                            <p>By signing up, you acknowledge and agree to accept our terms and conditions</p>
                            <div class="next-prev-button">
                                <button type="button" class="prev-btn  primary-btn">Back</button>
                                <button type="submit" name="signupSubmit" id="signupSubmit" class="primary-btn">Sign up</button>
                            </div>
                        </div>
                        <p>Already have and account ? &nbsp;<button id="loginLink" type="button" class="tertairy-btn">Log in</button>
                        </p>
                    </form>

                </div>
            </div>
        </dialog>
        <dialog id="forgotPassword" class="popup-dialog">
            <button id="closeBtn"><i class="fa-solid fa-xmark" style="color: #858585;"></i></button>
            <div class="max-width">
                <div class="left">
                </div>
                <div class="right">
                    <div class="alert-box-dialog">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <p id="dialogAlertMessage">Invalid username or password</p>
                    </div>
                    <div class="section-heading-wrapper">
                        <h1 class="section-heading">Forgot Password?</h1>
                    </div>
                    <div class="verify-email show-div">

                        <p>Don't worry. Just enter your email so that you can verify it and reset your password<br><br> </p>
                        <div class="input-field">
                            <input type="email" name="forgotEmail" placeholder="" id="forgotEmail" />
                            <label class="placeholder">Email</label>
                        </div>
                        <button id="sendOtp" type="button" class="primary-btn next-step">Send Code</button>
                    </div>
                    <div class="verify-otp">
                        <p>Enter the 6-digits verification code that is sent to your email</p>
                        <div class="input-field">
                            <input type="text" name="otpEmail" id="otpCode" placeholder="Enter 6 digits otp">
                            <button type="button" class="tertairy-btn sendOtp">Send Code</button>
                        </div>
                        <button id="verifyOtp" type="button" class="primary-btn">Verify Code</button>
                    </div>
                    <form action="" id="resetPassword" class="reset-password ">
                        <p class="password-note">Remember, a good password is like a good joke. It's memorable, it's unique, and you don't share it with everyone. And just like a joke, if you find yourself explaining it to others, it's probably time to come up with a new one!</p>
                        <div class="input-field">
                            <input type="password" name="newPassword" placeholder="" id="newPassword" />
                            <label class="placeholder">New Password</label>
                            <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>
                        </div>
                        <div class="input-field">
                            <input type="password" name="confirmPassword" placeholder="" id="confirmNewPassword" />
                            <label class="placeholder">Confirm Password</label>
                            <button class="password-show" type="button"><i class="fa-solid fa-eye" style="color:#6e6e6e"></i></button>
                        </div>
                        <button type="submit" name="resetPassword" id="confirmResetPassword" class="primary-btn">Reset Password</button>
                    </form>
                    <button class="tertairy-btn back-to-login-btn">Back to login</button>
                </div>
            </div>
        </dialog>
    </section>