<?php
/* Template Name: Full Page Layout */
get_header();
?>

<div class="site-main">

<?php if(have_posts()):
  while(have_posts()): the_post();

  get_template_part('partials/content', 'page');

  endwhile;

  else:
    echo '<p>No content found</p>';

endif;?>

</div> <!--main-->

<?php get_footer();?>
