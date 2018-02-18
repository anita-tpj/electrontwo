<?php
/* Template Name: Services Templatet */
//$image = get_term_meta( $term->term_id, 'featured-image', true );
get_header();
?>
<div class="site-main">

<?php if(have_posts()):?>
  <article class="post page <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">
  <header class="page-headline">
    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
  </header>
    <?php
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      $term_id = $term->term_id;
      $image_id = get_term_meta( $term_id, 'featured-image-id', true );
    ?>
  <div class="post-thumbnail">
    <?php echo wp_get_attachment_image ( $image_id, 'big-thumbnail');?>
  </div><!--category-thumbanil-->
    <?php the_archive_description('<div class="post-content">','</div>'); ?>
  </article>


  <div class="references-layout">
    <?php
      while(have_posts()):
        the_post();
        get_template_part('partials/content', 'taxonomy');
      endwhile;
      else:
        echo '<p>No content found</p>';
    endif;
   ?>
  </div><!--references-layout-->
</div><!--main-->
<?php
get_sidebar('references');
get_footer();
?>
