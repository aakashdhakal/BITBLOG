<div class="post-card">
    <img src="<?php echo $post_image ?>" alt="">
    <div class="tag-date">
        <p class="author-name"><i class="fa-solid fa-pen-circle" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo $post_author_name ?></p><i class="bi bi-dot"></i>
        <p><i class="fa-solid fa-calendar" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo $post_date ?></p>
    </div>
    <a href="post/<?php echo $post_slug_url ?>">
        <h1 class="post-title"><?php echo $post_title ?></h1>
    </a>
    <p class="category"></i><?php echo $post_category ?></p>

</div>