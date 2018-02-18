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

                $logos_data = get_post_meta($post->ID, 'logos_data', true);
                if ( $logos_data): ?>
                    <a href="<?php echo esc_url( $logos_data['logoUrl']); ?>">
                <?php endif;

                // The Logo's Image
                echo the_post_thumbnail('logo-image');?>

                <?php if ( $logos_data): ?>
                </a>
                <?php endif; ?>
                </li>
            <?php endwhile; ?>

        </ul><!-- .slides -->
    </div><!-- .flexslider -->

<?php endif;

// Reset Post Data
wp_reset_postdata();
