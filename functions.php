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
add_theme_support( 'custom-logo', array(
	'height'      => 82,
	'width'       => 217,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );


//Includes
/*require(get_template_directory() . '/inc/walker.php');*/
include(get_template_directory() . '/inc/front/enqueue.php');
include(get_template_directory() . '/inc/elt_functions.php');
include(get_template_directory() . '/inc/widgets.php');
include(get_template_directory() . '/inc/custom-post-types.php');
include(get_template_directory() . '/inc/custom-taxonomies.php');
include(get_template_directory() . '/inc/shortcodes.php');
include(get_template_directory() . '/inc/admin/init.php');
include(get_template_directory() . '/process/save-post.php');
include(get_template_directory() . '/process/filter-content.php');
include(get_template_directory() . '/inc/metaboxes.php');
include(get_template_directory() . '/inc/metadata.php');
require_once(get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php');
include(get_template_directory() . '/inc/register-plugins.php');





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
add_action('wp_enqueue_scripts', 'elt_resources');
add_action('after_setup_theme', 'elt_setup');
add_action('widgets_init', 'elt_widget_init');
add_action('widgets_init', 'elt_load_widget' );
add_action('init', 'init_references_post_type');
add_action('init', 'init_slides_post_type');
add_action('init', 'init_logos_post_type');
add_action('admin_init', 'references_admin_init');
add_action('admin_init', 'slides_admin_init');
add_action('admin_init', 'logos_admin_init');
add_action('save_post_references', 'references_save_post_admin', 10, 3);
add_action('save_post_slides', 'slides_save_post_admin', 10, 3);
add_action('save_post_logos', 'logos_save_post_admin', 10, 3);
add_filter('the_content', 'references_content');
add_action( 'init', 'init_references_post_type_taxonomies', 0 );
add_action( 'tgmpa_register', 'elt_register_required_plugins' );
add_filter('the_generator', 'elt_remove_version');
add_filter('get_the_archive_title', 'elt_remove_titleprefix');



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


add_filter( 'widget_posts_args', 'my_widget_posts_args');
function my_widget_posts_args($args) {
	if ( is_category()) { //adds the category parameter in the query if we display a category
		$cat = get_queried_object();
		return array(
			'posts_per_page' => 10,//set the number you want here
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'cat' => $cat -> term_id//the current category id
			 );
	}else if(is_single()){
    global $post;
    $cat =  wp_get_post_categories($post->ID);
    return array(
			'posts_per_page' => 10,//set the number you want here
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'cat' => $cat
			 );




  }else {//keeps the normal behaviour if we are not in category context
		return $args;
	}
}


function wpb_postsbycategory() {
// the query
$the_query = new WP_Query( array( 'category_name' => 'solutions', 'posts_per_page' => 10 ) );
global $post;
// The Loop
if ( $the_query->have_posts() ) {
  $string="";
    $string .= '<ul class="postsbycategory widget_recent_entries">';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
            if ( has_post_thumbnail() ) {
            $string .= '<li>';
            $string .= '<a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_post_thumbnail($post->id, array( 50, 50) ) . get_the_title() .'</a></li>';
            } else {
            // if no featured image is found
            $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">' . get_the_title() .'</a></li>';
            }
            }
    } else {
    // no posts found
}
$string .= '</ul>';

return $string;

/* Restore original Post Data */
wp_reset_postdata();
}
// Add a shortcode
add_shortcode('categoryposts', 'wpb_postsbycategory');

// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


function _category_dropdown_filter( $cat_args ) {
        $cat_args['show_option_none'] = __('My Category');
        return $cat_args;
}
add_filter( 'widget_categories_dropdown_args', '_category_dropdown_filter' );
