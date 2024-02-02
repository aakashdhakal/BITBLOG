<?php

require_once __DIR__ . '/router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
get('/dashboard', 'UI/dashboard/dashboard.php');
get('', 'UI/homepage/home.php');
get('/home', 'UI/homepage/home.php');
get('/post/$slug_url', 'UI/post/blog-post.php');
get('/logout', 'config/logout.php');
get('/$i', 'UI/homepage/home.php');
get('/api/postAuthors/$username', 'api/postAuthors.php');

post('/bookmark-config', 'config/bookmark-config.php');
post('/post-like-config', 'config/post-like-config.php');
post('/follow-config', 'config/follow-config.php');
post('/post-list-config', 'config/post-list-config.php');
post('/otp-config', 'config/otp-config.php');
post('/login-config', 'config/login-config.php');
post('/signup-config', 'config/signup-config.php');
post('/signup-validate-config', 'config/signup-validate-config.php');
post('/feedback-config', 'config/feedback-config.php');

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', 'UI/404.php');
