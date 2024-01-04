<div class="post-list">
    <img src="<?php echo $post_image ?>" alt="">
    <div class="post-info">
        <div class="tag-date">
            <p class="category"><?php echo $post_category ?></p>
            <p class="post-date"><i class="bi bi-dot"></i> &nbsp;&nbsp;<i class="fa-solid fa-calendar" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo $post_date ?></p><i class="bi bi-dot"></i>
            <p><i class="fa-duotone fa-pen-circle"></i>&nbsp;&nbsp;<?php echo $post_author_name ?></p>
        </div>
        <a href="post/<?php echo createSlugUrl($post_title) ?>">
            <h1 class="post-title"><?php echo $post_title ?></h1>
        </a>
        <p class="post-content"><?php echo $post_content ?></p>
    </div>
</div>