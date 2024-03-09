<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: " . "http://localhost/A.D-Blogs/");
}
define('BASE_URL', 'http://localhost/A.D-Blogs/');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo BASE_URL ?>/images/BitBlog.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">
    <title>Admin Panel - BITBLOG</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/UI/dashboard/dashboard.css">


</head>


<body>
    <div class="preloader">
        <img src="<?php echo BASE_URL ?>images/BitBlog.svg" alt="">
        <span class="loader"></span>
    </div>
    <header>
        <nav class=" side-navigation">
            <div class="logo-name">
                <img src="<?php echo BASE_URL ?>/images/BitBlog.svg" alt="logo">
                <h1 class="side-nav-text">BITBLOG</h1>
            </div>
            <ul class="side-nav">

                <li title="Dashboard"><a href="<?php echo BASE_URL ?>dashboard/adminHome" class="active" data-title="Dashboard" data-function="adminHome"><i class="fa-solid fa-objects-column"></i>
                        <p class="side-nav-text">Dashboard</p>
                    </a></li>
                <li title="Posts"><a href="<?php echo BASE_URL ?>dashboard/posts" data-title="Posts" data-function="posts"><i class="fa-solid fa-memo"></i>
                        <p class="side-nav-text">Posts</p>
                    </a></li>
                <li title="Write Post"><a href="<?php echo BASE_URL ?>dashboard/writePost" data-title="Create Post" data-function="blogEditor"><i class="fa-solid fa-pen-swirl"></i>
                        <p class="side-nav-text">Write </p>
                    </a></li>
                <li title="Settings"><a href="<?php echo BASE_URL ?>dashboard/settings" data-title="Settings" data-function="settings"><i class="fa-solid fa-gear"></i>
                        <p class="side-nav-text">Settings</p>
                    </a></li>

            </ul>
        </nav>
        </button>
        <!-- <div class="copyright">
            <p>© <?php echo date("Y") ?> BITBLOG</p>

        </div> -->

    </header>
    <dialog class="popup-box">
        <div class="popup">
            <div class="popup-header">
                <i class="fa-solid fa-brake-warning"></i>
                <h3 class="popup-title">Are you sure?</h3>
                <button id="closePopup"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="popup-message">
                <p>Do you really want to delete this post?</p>
            </div>
            <div class="popup-footer">
                <button id="confirmBtn" class="primary-btn">Delete</button>
                <button id="cancelBtn" class="tertiary-btn">Cancel</button>
            </div>
        </div>
    </dialog>

    <main>
        <div class=" top-nav">
            <div class="collapse-name"> <button id="collapseSidenav" title="Collapse Menu" class="tertiary-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                <h3 class="active-page-name"></h3>
            </div>


            <div class="search-bar">
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="Search for something">

            </div>

            <div class="user-profile">
                <!-- <button id="createPost"><i class="fa-solid fa-file-plus"></i>Create Post</button> -->
                <img src="<?php echo $_SESSION["profilepic"] ?>" alt="user">
                <div class="user-name-role">
                    <p class="user-name"><?php echo $_SESSION["name"] ?></p>
                    <p class="user-role"><?php echo strtoupper($_SESSION["role"]) ?></p>
                </div>
                <button id="logoutBtn" title="Logout" class="secondary-btn"><i class="fa-solid fa-right-from-bracket"></i></button>
            </div>
        </div>
        <div class="main-content">

        </div>

    </main>
    <script src="<?php echo BASE_URL ?>/UI/dashboard/dashboard.js"></script>

</body>