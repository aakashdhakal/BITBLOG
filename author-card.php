  <div class="author-card">
    <div class="author-info">
      <img src="<?php echo $author_profilepic ?>" alt="">
      <div class="author-details">
        <p><?php echo $author_firstname . " " . $author_lastname ?></p>
        <p class="followers-count"><i class="fa-duotone fa-users"></i>&nbsp;<?php echo formatNumber($author_followers) ?></p>
      </div>

    </div>
    <p class="author-bio"><?php echo $author_bio ?></p>


    <button id="followBtn" class="<?php echo $follower_class ?>" type="submit" data-author="<?php echo $author_username ?>"><i class="<?php echo $follower_icon ?>"></i>&nbsp;<?php echo $follower_text ?></button>
  </div>