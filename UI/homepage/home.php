<?php include "includes/head.php"; ?>
<link rel="stylesheet" href="CSS/homepage.css">
<title>Blogs - Aakash Dhakal</title>
<?php include "includes/navbar.php"; ?>

<section id="welcome">
    <div class="max-width">
        <?php if (isset($_SESSION["username"])) { ?>
            <h1>Welcome back ! <?php echo $_SESSION["username"]; ?></h1>
            <p>Great to see you again. Hope you find some new articles to read</p>
        <?php } else { ?>
            <h1>Welcome new user</h1>
            <p>Looks like you are not registered. Feel free to read articles and join by creating your account</p>
        <?php } ?>
        <form action="" method="GET" class="search-bar">
            <input type="text" name="search" id="search" placeholder="Search for blogs or authors" autocomplete="off">
            <button type="submit" name="submit" id="searchBtn"><i class="fa-solid fa-search"></i></button>
        </form>
    </div>
</section>

<?php include "featured-post-config.php" ?>
<section id="featuredPost">
    <div class="max-width">
        <div class="left">
            <img src="<?php echo $featured_post_image ?>" alt="" class="post-thumbnail">
            <div class="post-info">
                <div class="tag-date">
                    <img src="<?php echo $featured_post_author_profilepic ?>" alt="" class="profilepic">
                    <p><?php echo $featured_post_author_name ?></p><i class="bi bi-dot"></i>
                    <p><i class="fa-solid fa-calendar" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo $featured_post_date ?></p><i class="bi bi-dot"></i>
                    <p><i class="fa-solid fa-book-open-cover" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo round(str_word_count($featured_post_content_temp) / 200) ?> min read</p>
                </div>
                <hr>
                <a href="post/<?php echo createSlugUrl($featured_post_title) ?>">
                    <h1 class=" post-title"><?php echo $featured_post_title ?></h1>
                </a>
                <p class="post-content"><?php echo $featured_post_content ?></p>
                <div class="author-info">
                    <p><i class="fa-regular fa-eye"></i><?php echo formatNumber($featured_post_views) ?></p>
                    <p><i class="fa-regular fa-heart"></i><?php echo formatNumber($featured_post_likes) ?></p>
                    <p><i class="fa-regular fa-comment"></i><?php echo formatNumber($featured_post_comments) ?></p>
                </div>
                <div class="category-featured">
                    <p class="category"><i class="fa-regular fa-circle-star"></i>&nbsp;Featured</p>
                    <p class="category"><i class="fa-solid fa-folders" style=" color: #9e9e9e;">&nbsp;</i><?php echo $featured_post_category ?></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="section-heading-wrapper">
                <div class="section-heading-container">
                    <h1 class="section-heading">Popular Posts</h1>
                    <a href="all-posts.php" class="btn">View More&nbsp;<i class="fa-regular fa-circle-chevron-down fa-rotate-270"></i></a>
                </div>
                <hr>
            </div>
            <?php include "top-post-config.php" ?>
        </div>
    </div>
</section>

<section id="recentPosts">
    <div class="max-width">
        <div class="section-heading-wrapper">
            <div class="section-heading-container">
                <h1 class="section-heading">Recent Posts</h1>
                <a href="all-posts.php" class="btn">View More&nbsp;<i class="fa-regular fa-circle-chevron-down fa-rotate-270"></i></a>
            </div>
            <hr>
        </div>
        <div class="posts">
            <?php include "recent-post-config.php" ?>
        </div>
    </div>
</section>

<section id="postsAuthors">
    <div class="max-width">
        <div class="left">
            <div class="section-heading-wrapper">
                <div class="section-heading-container">
                    <h1 class="section-heading">Trending Categories</h1>
                    <a href="all-posts.php" class="btn">View More&nbsp;<i class="fa-regular fa-circle-chevron-down fa-rotate-270"></i></a>
                </div>
                <hr>
            </div>
            <div class="category-list">
                <button class="category" data-category="All">All</button>
                <?php include "random-category-config.php" ?>
            </div>
            <div class="posts">
                <?php include "config/post-list-config.php" ?>

            </div>
        </div>
        <div class="right">
            <div class="top">
                <?php include "top-author-config.php" ?>
                <div class="author-card">
                    <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                                <stop stop-color="rgba(243, 106, 62, 1)" offset="0%"></stop>
                                <stop stop-color="rgba(255, 179, 11, 1)" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,98L48,130.7C96,163,192,229,288,228.7C384,229,480,163,576,147C672,131,768,163,864,155.2C960,147,1056,98,1152,65.3C1248,33,1344,16,1440,73.5C1536,131,1632,261,1728,261.3C1824,261,1920,131,2016,98C2112,65,2208,131,2304,163.3C2400,196,2496,196,2592,204.2C2688,212,2784,229,2880,261.3C2976,294,3072,343,3168,334.8C3264,327,3360,261,3456,228.7C3552,196,3648,196,3744,187.8C3840,180,3936,163,4032,204.2C4128,245,4224,343,4320,343C4416,343,4512,245,4608,245C4704,245,4800,343,4896,375.7C4992,408,5088,376,5184,310.3C5280,245,5376,147,5472,122.5C5568,98,5664,147,5760,171.5C5856,196,5952,196,6048,187.8C6144,180,6240,163,6336,171.5C6432,180,6528,212,6624,236.8C6720,261,6816,278,6864,285.8L6912,294L6912,490L6864,490C6816,490,6720,490,6624,490C6528,490,6432,490,6336,490C6240,490,6144,490,6048,490C5952,490,5856,490,5760,490C5664,490,5568,490,5472,490C5376,490,5280,490,5184,490C5088,490,4992,490,4896,490C4800,490,4704,490,4608,490C4512,490,4416,490,4320,490C4224,490,4128,490,4032,490C3936,490,3840,490,3744,490C3648,490,3552,490,3456,490C3360,490,3264,490,3168,490C3072,490,2976,490,2880,490C2784,490,2688,490,2592,490C2496,490,2400,490,2304,490C2208,490,2112,490,2016,490C1920,490,1824,490,1728,490C1632,490,1536,490,1440,490C1344,490,1248,490,1152,490C1056,490,960,490,864,490C768,490,672,490,576,490C480,490,384,490,288,490C192,490,96,490,48,490L0,490Z"></path>
                    </svg>
                    <img src="<?php echo $top_author_profilepic ?>" alt="">
                    <div class="name-username">
                        <p class="author-name"><?php echo $top_author_name ?></p>
                        <p class="author-username">@<?php echo $top_author_username ?></p>
                    </div>
                    <p class="author-bio"><?php echo $top_author_bio ?></p>
                    <div class="author-details">

                        <div class="author-detail">
                            <i class="fa-solid fa-newspaper"></i>
                            <p class="author-detail-value"><?php echo $top_author_posts ?></p>
                        </div>|
                        <div class="author-detail">
                            <i class="fa-regular fa-heart"></i>
                            <p class="author-detail-value"><?php echo $top_author_likes ?></p>
                        </div>|
                        <div class="author-detail">
                            <i class="fa-regular fa-users"></i>
                            <p class="author-detail-value"><?php echo formatNumber($top_author_followers) ?></p>
                        </div>
                    </div>
                    <button class="btn <?php echo $follower_class ?>" id="followBtn" data-author="<?php echo $top_author_username ?>"><?php echo $follower_text ?></button>
                </div>
            </div>
            <div class="bottom">
                <div class="newsletter-subscription">
                    <img src="images/newsletter.svg" alt="">
                    <h1>Subscribe to our newsletter</h1>
                    <p>Get notified about new articles and updates</p>
                    <form action="" method="POST">
                        <div class="input-field">
                            <input type="email" name="email" placeholder="Enter your email address" id="subscribeEmail" value="<?php
                                                                                                                                if (isset($_SESSION["username"])) {
                                                                                                                                    echo $_SESSION["email"];
                                                                                                                                }
                                                                                                                                ?>" />
                        </div>
                        <button type="submit" name="submit" id="subscribeBtn" class="primary-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="authorNotice">
    <div class="max-width">
        <h1>Want to become author ?</h1>
        <p><i class="fa-solid fa-triangle-exclamation"></i> We are sorry to say that the author system is currently being built. But if you want to publish your article then you can send the document to our email and we will contact you shortly after <i class="fa-solid fa-triangle-exclamation"></i></p>

        <a href="mailto:contact@aakashdhakal.com.np?&subject=Blog Posting Request" class="btn">Send Email</a>
    </div>
</section>

<?php include "includes/footer.php"; ?>
<script src="<?php echo BASE_URL ?>JS/homepage.js"></script>

</body>

</html>