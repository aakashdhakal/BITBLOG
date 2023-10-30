  <div class="author-card">
    <img src="<?php echo $author_profilepic ?>" alt="">

    <div class="author-info">
      <p class="author-name"><?php echo $author_name ?></p>
      <p class="author-username">@<?php echo $author_username ?></p>

    </div>


    <button id="followBtn" class="<?php echo $follower_class ?>" type="submit" data-author="<?php echo $author_username ?>"><?php echo $follower_text ?></button>
  </div>