<aside class="site-sidebar">

  <?php if(is_active_sidebar('left-sidebar-1')): ?>
  	<?php dynamic_sidebar('left-sidebar-1'); ?>
  <?php endif; ?>

  <?php if(is_active_sidebar('left-sidebar-2')): ?>
    <?php dynamic_sidebar('left-sidebar-2'); ?>
  <?php endif; ?>

</aside>
