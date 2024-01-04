<div class="top-posts">
    <img src="<?php echo $top_post_image ?>" alt="" class="post-thumbnail">
    <div class="post-info">

        <a href="post/<?php echo $top_slug_url ?>">
            <h1 class="post-title"><?php echo $top_post_title ?></h1>
        </a>
        <div class="tag-date">
            <p class="author-name"><i class="fa-solid fa-pen-circle" style="color: #9e9e9e;"></i>&nbsp;<?php echo $top_post_author_name ?></p><i class="bi bi-dot"></i>
            <p><i class="fa-solid fa-book-open-cover" style="color: #9e9e9e;"></i>&nbsp;&nbsp;<?php echo round(str_word_count($top_post_content) / 200) ?> min read </p>

        </div>
    </div>
</div>