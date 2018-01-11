<article class="post <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">
<div class="post-thumbnail">

    <?php the_post_thumbnail('home-page-section-image');?>

</div><!-- post-thumbnail-->

<div class="post-content">
<h2 class="styled-line"><?php the_title(); ?></h2>
    <?php the_excerpt();?>
    <div class="service-links">
      <nav class="service-page-nav">
        <ul>
        <?php
        $args = array(
          'depth'       => 1,
          'child_of'    => $post->ID,
          'title_li'    => ''
        );
        ?>
          <?php wp_list_pages($args); ?>
        </ul>
    </nav>
    <a class="read-more" href="<?php echo get_permalink(); ?>"><?php echo sprintf ( __('Read More', 'electrontwo'));?></a>

    </div><!-- service-links-->

</div><!-- post-content-->

</article>
