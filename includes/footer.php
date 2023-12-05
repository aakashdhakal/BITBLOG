    <footer>
        <div class="top-footer">
            <div class="left">
                <div class="logo">
                    <img src="<?php echo BASE_URL ?>images/akash.svg" alt="logo" class="logo-image" />
                </div>
                <p>Exploring the world with words, one click at a time.</p>
                <ul class="social-links links">
                    <li><a href="https://www.facebook.com/aakash_dhakal12"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/aakash_dhakal12"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.instagram.com/aakash_dhakal12"><i class="fa-brands fa-x-twitter"></i></i></a></li>
                    <li><a href="https://github.com/aakashdhakal"><i class="fa-brands fa-github"></i></a></li>
                </ul>
            </div>
            <div class="middle">
                <ul class="quick-links links">
                    <h3>Quick Links</h3>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="contactus.php">Authors</a></li>
                    <li><a href="blog.php">Categories</a></li>
                    <li><a href="blog.php">About</a></li>
                    <li><a href="blog.php">Contact</a></li>
                </ul>

                <ul class="terms-privacy links">
                    <h3>Terms & Privacy</h3>
                    <li><a href="">Terms of Use</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Cookie Policy</a></li>
                </ul>

            </div>
            <div class=" right">
                <h3>Share Your Feedback</h3>
                <form action="" method="POST" id="feedbackForm">
                    <input type="email" name="email" id="feedbackEmail" placeholder="Enter your email" required value="<?php if (isset($_SESSION['username'])) echo $_SESSION["email"] ?>" />
                    <textarea name="message" placeholder="Enter your message" required id="feedback"></textarea>
                    <button type="submit" name="send-feedback" id="feedbackBtn">Send</button>
                </form>
            </div>
        </div>
        <hr>
        <div class=" bottom-footer">
            <p>&copy; <?php echo date("Y") ?> Aakash Dhakal. All rights reserved.</p>
        </div>
        </div>
    </footer>
    <script src="<?php echo BASE_URL ?>JS/script.js" defer></script>
    <script src="<?php echo BASE_URL ?>JS/login.js" defer></script>
    <script src="<?php echo BASE_URL ?>JS/signup.js" defer></script>