<?php
/* Template Name: Services Templatet */
get_header();
  ?>
<div class="site-main">
<?php if(have_posts()):?>
  <header class="page-header">
  <?php the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="taxonomy-description">','</div>');
  ?>
  </header>
  <?php
  while(have_posts()):
    the_post();
    get_template_part('partials/content', 'category');
  endwhile;

  else:
    echo '<p>No content found</p>';

endif;


?>

</div><!--main-->
  <?php get_sidebar('left-2');


get_footer();
?>
