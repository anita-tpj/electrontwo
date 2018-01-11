<?php
/* Disable WordPress Admin Bar for all users but admins. */
  show_admin_bar(false);

//Set Up
add_theme_support('menu');
add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'caption' ) );
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('post-formats', array('link', 'quote', 'aside', 'gallery'));
add_theme_support('custom-logo');
add_theme_support('custom-background');
add_theme_support('custom-header');


//Includes
/*require(get_template_directory() . '/inc/walker.php');*/
include(get_template_directory() . '/inc/front/enqueue.php');
include(get_template_directory() . '/inc/elt_functions.php');
include(get_template_directory() . '/inc/custom-post-types.php');
include(get_template_directory() . '/inc/shortcodes.php');
include(get_template_directory() . '/inc/admin/init.php');
include(get_template_directory() . '/process/save-post.php');
include(get_template_directory() . '/process/filter-content.php');


/*//Action and Filter Hooks
add_action('wp_enqueue_scripts', 'tap_enqueue_style' );
add_action('after_setup_theme', 'tap_setup_theme');
add_action('widgets_init', 'tap_widgets');
add_action('after_switch_theme', 'tap_activate');
add_action('admin_menu', 'tap_admin_menu');
add_action('admin_init', 'tap_admin_init');
add_action('customize_register', 'tap_customize_register');
add_action('wp_head', 'tap_head');
add_filter('excerpt_length', 'tap_set_excerpt_length');
add_filter( 'excerpt_more', 'tap_new_excerpt_more' );
add_action( 'tgmpa_register', 'tap_register_required_plugins' );
add_filter('the_generator', 'tap_remove_version');
add_action('init', 'portfolio_init');
add_action('init', 'custom_taxonomies_init');
*/
add_action('init', 'init_references_post_type');
add_action('init', 'init_slides_post_type');
add_action('init', 'init_logos_post_type');
add_action('admin_init', 'references_admin_init');
add_action('admin_init', 'slidess_admin_init');
add_action('save_post_references', 'references_save_post_admin' , 10, 3);
add_action('save_post_slides', 'slides_save_post_admin' , 10, 3);
add_filter('the_content', 'references_content');

/*Get Top Ancestor*/
function get_top_ancestor_id(){
  global $post;
  if($post->post_parent){
    $ancestor = array_reverse(get_post_ancestors($post->ID));
    return $ancestor[0];
  }
  return $post->ID;
}



/*Does Page Has a Children*/
function has_children(){
 global $post;
 $pages = get_pages('child_of=' . $post->ID);
 return count($pages);
}

/*Does Category Has a Children*/
function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
    $children = get_categories( array(
        'child_of'      => $term_id,
        'taxonomy'      => $taxonomy,
        'hide_empty'    => false,
        'fields'        => 'ids',
    ) );
    return ( $children );
}

/*Add Widgets Location*/
function elot_widget_init(){
  register_sidebar( array(
    'id'          => 'left-sidebar-1',
    'name'        => __( 'Left Sidebar 1', 'electrontwo' ),
    'description' => __( 'This sidebar is located at left.', 'electrontwo' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget'  => '</div>',
  	'before_title'  => '<h4 class="widgettitle widget-title"><span>',
  	'after_title'   => '</span></h4>'
) );

register_sidebar( array(
  'id'          => 'left-sidebar-2',
  'name'        => __( 'Left Sidebar 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at left.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle widget-title"><span>',
  'after_title'   => '</span></h4>'
) );

register_sidebar( array(
  'id'          => 'footer1',
  'name'        => __( 'Footer 1', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );


register_sidebar( array(
  'id'          => 'footer2',
  'name'        => __( 'Footer 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'footer3',
  'name'        => __( 'Footer 3', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'footer4',
  'name'        => __( 'Footer 4', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'service1',
  'name'        => __( 'Service 1', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service2',
  'name'        => __( 'Service 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service3',
  'name'        => __( 'Service 3', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service4',
  'name'        => __( 'Service 4', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );
}

add_action('widgets_init', 'elot_widget_init');


add_filter( 'widget_posts_args', 'elot_widget_posts_args');
function elot_widget_posts_args($args) {
	if ( is_category() ) { //adds the category parameter in the query if we display a category
		$cat = get_queried_object();
		return array(
			'posts_per_page' => 10,//set the number you want here
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'cat' => $cat -> term_id//the current category id
			 );
	}
	else {//keeps the normal behaviour if we are not in category context
		return $args;
	}
}
