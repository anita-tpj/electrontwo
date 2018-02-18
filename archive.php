<?php get_header(); ?>
<div class="site-main">
<?php if(have_posts()):?>
  <header class="page-headline">
  <?php the_archive_title('<h1 class="page-title">', '</h1>');

  ?>
  </header>
  <?php
  while(have_posts()):
    the_post();
    get_template_part('partials/content', 'archive');
  endwhile;

  else:
    echo '<p>No content found</p>';

endif;?>
</div><!--main-->
<?php
get_sidebar();
get_footer();
?>
