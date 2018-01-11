
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
<article class="post page">
  <h2 class="styled-line"><?php the_title(); ?></h2>
  <?php the_content(); ?>
</article>
