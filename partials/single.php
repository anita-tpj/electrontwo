<?php get_header(); ?>

<div class="site-main">
  <?php if(have_posts()):
    while(have_posts()): the_post();
      get_template_part('partials/content', get_post_format());
    endwhile;

    else:
      echo '<p>No content found</p>';

  endif;

    if (is_active_sidebar('left-sidebar')):
      get_sidebar();
    endif;
    ?>
</div> <!--main-->

<?php get_footer();?>
