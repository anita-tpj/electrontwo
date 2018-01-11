

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
        <p class="post-info">
          <?php echo elot_post_meta();?>
        </p>

          <?php if(is_search() || is_archive()):?>
            <p>
            <?php echo get_the_excerpt(); ?>
            <a href="the_permalink()">Read more &raquo;</a>
            </p>

          <?php else:?>

              <?php if($post->post_excerpt):?>
              <p>
              <?php echo get_the_excerpt(); ?>
              <a href="the_permalink()">Read more &raquo;</a>
              </p>

      <?php
            else: the_content('Continue reading &raquo;');
          endif;
        endif;
      endif;
      ?>
    </div> <!--post-content-->
  </article>
