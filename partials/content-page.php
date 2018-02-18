
<?php
if(has_children() || $post->post_parent):
?>
  <nav class="page-children-nav">
    <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
      <?php echo get_the_title(get_top_ancestor_id());?></a>
    </span>
    <ul>
      <?php
      $args = array(
        'depth'        => 1,
        'child_of'    => get_top_ancestor_id(),
        'title_li'    => ''
      );
      ?>
      <?php wp_list_pages($args); ?>
    </ul>
  </nav>
<?php endif; ?>

<article class="post page <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">
  <div class="page-headline">
    <h1><?php the_title(); ?></h1>
  </div><!--page-headline-->
  <div class="post-thumbnail">
  <?php the_post_thumbnail('big-thumbnail'); ?>
  </div><!--post-thumbnail-->
  <div class="post-content">
  <?php the_content(); ?>
  </div><!--post-content-->
</article>
