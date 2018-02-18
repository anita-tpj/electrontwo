<?php
/* Template Name: Info Page Layout */

get_header();?>

<div class="site-main">
<?php if(have_posts()):
  while(have_posts()):
    the_post();?>
    <article class="post page info">

      <div class="page-headline">
        <h1><?php the_title(); ?></h1>
      </div>

      <div class="post-content">
          <div class="disclaimer-info">
            <h4>Disclaimer Title</h4>
            <p>
              The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.
              Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum” by Cicero are also reproduced
              in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
            </p>
          </div>
          <div class="info-content">
            <?php the_content(); ?>
          </div>
        </div>

    </article>

  <?php endwhile;

  else:
    echo '<p>No content found</p>';

endif;?>
</div> <!--main-->

<?php get_footer();?>
