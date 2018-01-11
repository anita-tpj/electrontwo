<?php

$args = array(
    'post_type' => 'logos',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
);

$logos = new WP_Query( $args );

if ( $logos->have_posts() ) :?>
    <div id = "references" class="flexslider">
        <ul class="slides">

            <?php while ( $logos->have_posts() ) : $logos->the_post(); ?>
                <li>
                <?php // Check if there's a Slide URL given and if so let's a link to it
                if ( get_post_meta( get_the_id(), 'elt_logourl', true) != '' ): ?>
                    <a href="<?php echo esc_url( get_post_meta( get_the_id(), 'elt_logourl', true) ); ?>">
                <?php endif;

                // The Slide's Image
                echo the_post_thumbnail('logo-image');?>

                <?php
                // Close off the Slide's Link if there is one
                if ( get_post_meta( get_the_id(), 'elt_logourl', true) != '' ): ?>
                    </a>
                <?php endif; ?>

                </li>
            <?php endwhile; ?>

        </ul><!-- .slides -->
    </div><!-- .flexslider -->

<?php endif;

// Reset Post Data
wp_reset_postdata();
