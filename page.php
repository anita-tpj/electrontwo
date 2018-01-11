<?php get_header();?>

<div class="site-main">

<?php if(have_posts()):
  while(have_posts()): the_post();

  get_template_part('partials/content', 'page');

  endwhile;

  else:
    echo '<p>No content found</p>';

endif;?>

</div> <!--main-->


<?php
if(!has_children() || $post->post_parent < 0):
  if (is_active_sidebar('left-sidebar-1')):
    get_sidebar();
  endif;
endif;

get_footer();
?>
