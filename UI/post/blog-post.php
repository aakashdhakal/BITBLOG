<?php

include "includes/database-config.php";
include "includes/head.php";




$sql = "SELECT * FROM posts WHERE slug_url = ? AND status = '1'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $slug_url);
$stmt->execute();
$result = $stmt->get_result();
$blog_post = $result->fetch_assoc();

if ($result->num_rows == 0) {
    header("Location: 404");
    exit();
}
$blog_post_id = $blog_post["id"];
$blog_post_title = $blog_post["title"];
$blog_post_content = nl2br($blog_post["content"]);
$blog_post_author = $blog_post["author"];
$blog_post_date = date("F j, Y", strtotime($blog_post["date"]));
$blog_post_category = $blog_post["category"];
$blog_post_image = $blog_post["thumbnail"];
$blog_post_status = $blog_post["status"];
$blog_post_views = formatNumber($blog_post["views"]);
$blog_post_comments = formatNumber($blog_post["comments"]);
$blog_post_likes = formatNumber(get_likes_count($blog_post_id));


$author = get_author_info($blog_post_author);
$blog_post_author_name = $author["firstname"] . " " . $author["lastname"] . " " . verification_badge($blog_post_author);
$blog_post_author_profilepic = $author["profilepic"];
$blog_post_author_username = $author["username"];

if (!isset($_SESSION["viewed-posts"][$blog_post["id"]])) {
    $sql = "UPDATE posts SET views = views + 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $blog_post["id"]);
    $stmt->execute();
    $_SESSION["viewed-posts"][$blog_post["id"]] = true;
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $sql = "SELECT * FROM likes WHERE user_username = ? AND post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $username, $blog_post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $like_class = "liked";
        $like_icon = "<i class='fa-solid fa-heart' style='color: #BA0021'></i>";
    } else {
        $like_class = "not-liked";
        $like_icon = "<i class='fa-light fa-heart'></i>";
    }

    $sql = "SELECT * FROM bookmarks WHERE user_username = ? AND post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $username, $blog_post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $bookmark_class = "bookmarked";
        $bookmark_icon = "<i class='fa-solid fa-bookmark' style='color: #d5ac4e'></i>";
    } else {
        $bookmark_class = "not-bookmarked";
        $bookmark_icon = "<i class='fa-light fa-bookmark'></i>";
    }
} else {
    $like_class = "not-liked";
    $like_icon = "<i class='fa-light fa-heart'></i>";
    $bookmark_class = "not-bookmarked";
    $bookmark_icon = "<i class='fa-light fa-bookmark'></i>";
}

$follower_class = "not-followed";
$follower_text = "Follow";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (check_follow_status($username, $blog_post_author_username)) {
        $follower_class = "followed";
        $follower_text = "Following";
    }
}

?>

<link rel="stylesheet" href="<?php echo BASE_URL ?>/CSS/blog-page.css">
<title><?php echo $blog_post_title ?></title>
<?php include "includes/navbar.php"; ?>
<div class="scroll-indicator"></div>
<section id="blogPost">
    <div class="max-width">

        <div class="tag-date">
            <p class="category"><?php echo $blog_post_category ?></p>
        </div>

        <h1><?php echo $blog_post_title ?></h1>
        <div class="post-thumbnail">
            <img src="<?php echo BASE_URL . $blog_post_image ?>" alt="">
        </div>
        <div class="post-details">
            <div class="author-info">
                <p class="author-name"><?php echo $blog_post_author_name ?></p> <i class="bi bi-dot"></i>
                <p>Updated <?php echo $blog_post_date ?></p> <i class="bi bi-dot"></i>
                <p>About <?php echo round(str_word_count($blog_post_content) / 200) ?> min read</p>
            </div>
            <div class="like-views">
                <p><i class="fa-light fa-eye"></i> &nbsp;<?php echo $blog_post_views ?></p><i class="bi bi-dot"></i>
                <p><i class="fa-light fa-heart"></i> &nbsp;<?php echo $blog_post_likes ?></p><i class="bi bi-dot"></i>
                <p><i class="fa-light fa-comment"></i> &nbsp;<?php echo $blog_post_comments ?></p>
            </div>

        </div>
        <hr>


        <article>
            <p><?php echo $blog_post_content ?></p>
        </article>
        <div class="article-buttons">
            <button class="secondary-btn like-btn <?php echo $like_class ?>" title="Like" data-post="<?php echo $blog_post_id ?>"><?php echo $like_icon ?></button><i class="bi bi-dot"></i>
            <button class="secondary-btn" title="Comment"><i class="fa-light fa-comment"></i> </button><i class="bi bi-dot"></i>
            <button class="secondary-btn bookmark-btn <?php echo $bookmark_class ?>" title="Bookmark" data-post="<?php echo $blog_post_id ?>"><?php echo $bookmark_icon ?></button><i class="bi bi-dot"></i>
            <button class="secondary-btn" title="Share"><i class="fa-light fa-share"></i> </button>
        </div>
        <div class="post-author-details">
            <div class="author-info">
                <div class="author-name-img">
                    <img src="<?php echo BASE_URL ?><?php echo $blog_post_author_profilepic ?>" alt="" class="profilepic">
                    <div class="author-name-username">
                        <p class="author-name"><?php echo $blog_post_author_name ?></p>
                        <p class="author-username">@<?php echo $blog_post_author_username ?></p>
                    </div>
                </div>
                <div class="author-follow">
                    <button class="primary-btn follow-btn <?php echo $follower_class ?>" data-author="<?php echo $blog_post_author_username ?>" id="followBtn"><?php echo $follower_text ?></button>
                </div>
            </div>
            <div class="author-bio">
                <p class="author-bio"><?php echo $author["bio"] ?></p>
            </div>
        </div>
        <hr>
    </div>
</section>


<?php include "includes/footer.php"; ?>
<script src="<?php echo BASE_URL ?>JS/blogPost.js"></script>

</body>

</html>