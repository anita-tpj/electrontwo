<article class="post">
  <div class="post-headline">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </div>
  <p class="post-info">
    <?php the_time('F j, Y g:i a'); ?> | by <a href="<?php the_author_link(); ?>"><?php the_author_posts_link(); ?></a> | Posted in: <?php the_category(', '); ?>
  </p>
  <p>
  <?php echo get_the_excerpt(); ?>
  </p>
</article>
