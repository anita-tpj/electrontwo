
<article class="post references <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">

  <div class="post-card">
    <div class="post-card-thumbnail">
    <?php
    if(is_singular('references')): ?>
      <?php the_post_thumbnail('extra-small-thumbnail');
    else: ?>
      <?php the_post_thumbnail('small-thumbnail');
    endif; ?>


    </div><!--post-card-thumbnail-->
    <div class="post-card-title">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div><!--post-card-title-->

  </div><!--post-card-->
</article>
