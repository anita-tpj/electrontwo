<?php

$args = array(
    'post_type' => 'slides',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
);




$slides = new WP_Query( $args );

if ( $slides->have_posts() ) :?>
    <hr class="fadeAway"/>
    <div id="slider" class="flexslider">
        <ul class="slides">

            <?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
                <li>
                <?php echo the_post_thumbnail('slider-image');?>

                <div class="flex-caption">
            				<h1><?php the_title();?></h1>
            				<?php the_content();
                    $slides_data = get_post_meta($post->ID, 'slides_data', true);
                    if ( $slides_data['slideUrl']): ?>
                        <a href="<?php echo esc_url( $slides_data['slideUrl'] ); ?>" class="post-excerpt-btn">Read More!</a>
                    <?php else:?>
            				<a href="<?php the_permalink(); ?>" class="post-excerpt-btn">Read More!</a>
                    <?php endif;?>
			           </div><!-- .flex-caption -->
                </li>
            <?php endwhile; ?>

        </ul><!-- .slides -->
    </div><!-- .flexslider -->

<?php endif;

// Reset Post Data
wp_reset_postdata();
