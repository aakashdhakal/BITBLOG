<?php

require_once __DIR__ . '/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/A.D-Blogs/dashboard', 'UI/dashboard/dashboard.php');
get('/A.D-Blogs', 'UI/homepage/home.php');
get('/A.D-Blogs/home', 'UI/homepage/home.php');
get('/A.D-Blogs/post/$slug_url', 'UI/post/blog-post.php');
get('/A.D-Blogs/logout', 'config/logout.php');
get('/A.D-Blogs/$i', 'UI/homepage/home.php');

post('/A.D-Blogs/bookmark-config', 'config/bookmark-config.php');
post('/A.D-Blogs/post-like-config', 'config/post-like-config.php');
post('/A.D-Blogs/follow-config', 'config/follow-config.php');
post('/A.D-Blogs/post-list-config', 'config/post-list-config.php');
post('/A.D-Blogs/otp-config', 'config/otp-config.php');
post('/A.D-Blogs/login-config', 'config/login-config.php');
post('/A.D-Blogs/signup-config', 'config/signup-config.php');
post('/A.D-Blogs/signup-validate-config', 'config/signup-validate-config.php');
post('/A.D-Blogs/feedback-config', 'config/feedback-config.php');

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/A.D-Blogs/404', 'UI/404.php');
