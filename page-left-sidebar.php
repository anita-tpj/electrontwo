<?php

/*Template Name: Left Sidebar Page Layout */

get_header();?>

<div class="site-main">
  <div class="page-headline">
    <h1><?php the_title(); ?></h1>
  </div><!--page-headline-->

<?php
//for each subcategory, show all posts


$parent_category = get_cat_ID( 'Smart Buildings' );

$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'child_of'  => $parent_category
   );
$categories=get_categories($cat_args);
  foreach($categories as $category) {
    $args=array(
      'showposts' => -1,
      'category__in' => array($category->term_id),
    );
    $posts=get_posts($args);
    $image_id = get_term_meta( $category->term_id, 'featured-image-id', true );
      if ($posts) {
        echo '<article class= "post page has-thumbnail">';
        echo '<div class="post-headline"><h2><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></h2></div>';
        echo '<div class="post-thumbnail">' . wp_get_attachment_image ( $image_id, 'full') . '</div>';
        echo '<div class="post-content">' . category_description( $category->term_id);

        foreach($posts as $post) {
          setup_postdata($post); ?>
          <p><a href="<?php the_permalink() ?>" rel="bookmark"
            title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            <p>
            <?php echo get_the_excerpt(); ?>
            </p>
          <?php
        } // foreach($posts
        echo '</div>';
      } // if ($posts
      echo '</article>';
    } // foreach($categories

//for custom taxonomy show Categories

$taxonomy = 'reference-category';

$top_level_terms = get_terms( array(
    'taxonomy'      => $taxonomy,
    'parent'        => '0',
    'hide_empty'    => false,
) );

if ($top_level_terms) {
    foreach ($top_level_terms as $top_level_term) {

        $top_term_id = $top_level_term->term_id;
        $top_term_name = $top_level_term->name;
        $top_term_tax = $top_level_term->taxonomy;

        echo '<article class= "post page has-thumbnail">';
        echo '<div class="page-headline"><h2><a href="' . esc_url( get_term_link( $top_term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'electrontwo' ), $top_term_name ) ) . '">' . $top_term_name . '</a></h2></div>';

        $image_id = get_term_meta( $top_term_id, 'featured-image-id', true );
        echo '<div class="post-thumbnail">' . wp_get_attachment_image ( $image_id, 'big-thumbnail') . '</div>';
        echo '<div class="post-content">' . term_description($top_term_id, 'reference-category');
        $second_level_terms = get_terms( array(
            'taxonomy' => $top_term_tax, // you could also use $taxonomy as defined in the first lines
            'child_of' => $top_term_id,
            'parent' => $top_term_id, // disable this line to see more child elements (child-child-child-terms)
            'hide_empty' => false,
        ) );

        if ($second_level_terms) {

            foreach ($second_level_terms as $second_level_term) {

                $second_term_name = $second_level_term->name;
                $second_term_id = $second_level_term->term_id;
                echo '<p><a href="' . esc_url( get_term_link( $second_term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'electrontwo' ), $second_term_name ) ) . '">' . $second_term_name . '</a></p>';
                echo the_excerpt(term_description($second_term_id, 'reference-category'));

            }// END foreach
            echo '</div>';//<!--post-content-->
        }// END if
        echo '</article>';

    }// END foreach

}// END if
?>

</div> <!--main-->


<?php
  get_sidebar();
  get_footer();
?>
