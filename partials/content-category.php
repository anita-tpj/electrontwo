

  <article class="post <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">

    <div class="post-thumbnail">

        <?php if(is_single()):?>
          <?php the_post_thumbnail('banner-image');?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php else:?>
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail');?></a>

      </div><!-- post-thumbnail-->

      <div class="post-content">

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <?php the_excerpt(); ?>
      <?php endif;?>
    </div> <!--post-content-->
  </article>
