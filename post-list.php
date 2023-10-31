<div class="post-list">
    <img src="<?php echo $post_image ?>" alt="">
    <div class="post-info">
        <div class="tag-date">
            <p class="category"><i class="fa-duotone fa-tag"></i>&nbsp;<?php echo $post_category ?></p>|
            <p><i class="fa-solid fa-clock" style="color: #9e9e9e;"></i>&nbsp;<?php echo $post_date ?></p>|
            <p><i class="fa-duotone fa-feather"></i>&nbsp;<?php echo $post_author_name ?></p>
        </div>
        <a href="post.php?id=<?php echo $post_id ?>">
            <h1 class="post-title"><?php echo $post_title ?></h1>
        </a>
        <p class="post-content"><?php echo $post_content ?></p>
        <a href="">
            <p class="read-more">Read More&nbsp;<i class="fa-solid fa-circle-arrow-right"></i></p>
        </a>

    </div>
</div>