<article class="post page <?php if(has_post_thumbnail()):?>has-thumbnail<?php endif; ?>">
<div class="post-thumbnail">

    <?php the_post_thumbnail('big-thumbnail');?>

</div><!-- post-thumbnail-->

<div class="post-content">
    <h3 class="styled-line"><?php the_title(); ?></h3>
    <?php the_excerpt();?>


</div><!-- post-content-->

</article>
