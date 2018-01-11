<?php
get_header();

if(have_posts()):?>

<h2><?php _e('Search reasult for', 'electrontwo');?>:
<span class="text-info"><?php the_search_query(); ?></span></h2>
  <?php
  while(have_posts()): the_post();
    get_template_part('partials/content', get_post_format());
  endwhile;
else:
    echo '<p>No content found</p>';
endif;

get_footer();
?>
