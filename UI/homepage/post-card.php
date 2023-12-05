<div class="post-card">
    <img src="<?php echo $post_image ?>" alt="">
    <div class="tag-date">
        <p><i class="fa-solid fa-clock" style="color: #9e9e9e;"></i>&nbsp;<?php echo $post_date ?></p>|
        <p class="category"><i class="fa-duotone fa-tag"></i>&nbsp</i><?php echo $post_category ?></p>
    </div>
    <a href="post/<?php echo createSlugUrl($post_title) ?>">
        <h1 class="post-title"><?php echo $post_title ?></h1>
    </a>
    <p class="author-name"><i class="fa-duotone fa-feather"></i>&nbsp;<?php echo $post_author_firstname . "  " . $post_author_lastname ?></p>
</div>