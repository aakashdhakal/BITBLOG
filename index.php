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


<section id="featuredPost">
    <div class="max-width">
        <div class="left">
            <img src="<?php echo $featured_post_image ?>" alt="">
            <div class="post-info">
                <div class="tag-date">
                    <p class="category"><i class="fa-regular fa-circle-star"></i>&nbsp;Featured</p>
                    <p class="category"><i class="fa-duotone fa-tag"></i>&nbsp;<?php echo $featured_post_category ?></p>|
                    <p><i class="fa-solid fa-clock" style="color: #9e9e9e;"></i>&nbsp;<?php echo $featured_post_date ?></p>
                </div>
                <a href="">
                    <h1><?php echo $featured_post_title ?></h1>
                </a>
                <p><?php echo $featured_post_content ?></p>
                <div class="author-info">
                    <p> <img src="<?php echo $featured_post_author_profilepic ?>" alt="" class="profilepic">
                        <?php echo $featured_post_author_firstname . "  " . $featured_post_author_lastname ?></p>
                    <p><i class="fa-solid fa-eye" style="color: #9e9e9e;"></i><?php echo formatNumber($featured_post_views) ?></p>
                    <p><i class="fa-solid fa-heart" style="color: #9e9e9e;"></i><?php echo formatNumber($featured_post_likes) ?></p>
                    <p><i class="fa-solid fa-comment" style="color: #9e9e9e;"></i><?php echo formatNumber($featured_post_comments) ?></p>
                </div>
            </div>
        </div>
        <div class="right">
            <h1 class="section-heading">Top Posts</h1>
            <?php include "top-post-config.php" ?>
        </div>
    </div>

</section>

<section id="recentPosts">
    <div class="max-width">
        <div class="section-heading-wrapper">
            <h1 class="section-heading">Recent Posts</h1>
            <a href="all-posts.php" class="btn">View More&nbsp;<i class="fa-regular fa-circle-chevron-down fa-rotate-270"></i></a>
        </div>
        <hr>
        <div class="posts">
            <?php include "recent-post-config.php" ?>
        </div>
    </div>
</section>

<section id="authorsList">
    <div class="max-width">
        <div class="section-heading-wrapper">
            <h1 class="section-heading">Top Authors</h1>
            <a href="all-authors.php" class="btn">View More&nbsp;<i class="fa-regular fa-circle-chevron-down fa-rotate-270"></i></a>
        </div>
        <hr>
        <div class="authors">
            <?php include "author-config.php" ?>
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
<script src="JS/script.js" async></script>
<script src="JS/login.js" defer></script>
</body>

</html>