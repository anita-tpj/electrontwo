<article class="post <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">

    <div class="post-headline">
      <?php if(is_single()):?>
      <h1><?php the_title(); ?></h1>
      <?php else:?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php endif; ?>
    </div><!--post-headline-->

    <p class="post-info">
      <?php echo elot_post_meta();?>
    </p>

  <div class="post-thumbnail">
    <?php if(is_single()):
      the_post_thumbnail('banner-image'); ?>
    <?php else:?>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('banner-image');?></a>
    <?php endif; ?>
  </div><!--post-thumbnail-->

  <div class="post-content">
          <?php the_excerpt(); ?>
  </div> <!--post-content-->

</article>
