<?php

require_once __DIR__ . '/router.php';

// ##################################################
// ##################################################
// ##################################################
$baseUrl = "/A.D-Blogs";
// Static GET
// In the URL -> http://localhost
// The output -> Index
get($baseUrl . '/dashboard', 'UI/dashboard/dashboard.php');
get($baseUrl, 'UI/homepage/home.php');
get($baseUrl . '/home', 'UI/homepage/home.php');
get($baseUrl . '/post/$slug_url', 'UI/post/blog-post.php');
get($baseUrl . '/logout', 'config/logout.php');
get($baseUrl . '/$i', 'UI/homepage/home.php');
get($baseUrl . '/dashboard/writePost', 'UI/dashboard/writePost.php');
get($baseUrl . '/dashboard/adminHome', 'UI/dashboard/adminHome.php');
get($baseUrl . '/dashboard/posts', 'UI/dashboard/posts.php');
get($baseUrl . '/dashboard/settings', 'UI/dashboard/settings.php');


post($baseUrl . '/bookmark-config', 'config/bookmark-config.php');
post($baseUrl . '/post-like-config', 'config/post-like-config.php');
post($baseUrl . '/follow-config', 'config/follow-config.php');
post($baseUrl . '/post-list-config', 'config/post-list-config.php');
post($baseUrl . '/otp-config', 'config/otp-config.php');
post($baseUrl . '/login-config', 'config/login-config.php');
post($baseUrl . '/signup-config', 'config/signup-config.php');
post($baseUrl . '/signup-validate-config', 'config/signup-validate-config.php');
post($baseUrl . '/feedback-config', 'config/feedback-config.php');

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any($baseUrl . '/404', 'UI/404.php');
any($baseUrl . '/post/404', 'UI/404.php');
