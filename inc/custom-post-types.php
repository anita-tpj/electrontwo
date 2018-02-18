<?php

// Create Custom Post Type

//Register References Post Type
function init_references_post_type(){

  $labels = array(
  	'name'               => _x( 'References', 'post type general name', 'electrontwo' ),
  	'singular_name'      => _x( 'Reference', 'post type singular name', 'electrontwo' ),
  	'menu_name'          => _x( 'References List', 'admin menu', 'electrontwo' ),
  	'name_admin_bar'     => _x( 'Reference', 'add new on admin bar', 'electrontwo' ),
  	'add_new'            => _x( 'Add New', 'reference', 'electrontwo' ),
  	'add_new_item'       => __( 'Add New Reference', 'electrontwo' ),
  	'new_item'           => __( 'New Reference', 'electrontwo' ),
  	'edit_item'          => __( 'Edit Reference', 'electrontwo' ),
  	'view_item'          => __( 'View Reference', 'electrontwo' ),
  	'all_items'          => __( 'All References', 'electrontwo' ),
  	'search_items'       => __( 'Search References', 'electrontwo' ),
  	'parent_item_colon'  => __( 'Parent References:', 'electrontwo' ),
  	'not_found'          => __( 'No references found.', 'electrontwo' ),
  	'not_found_in_trash' => __( 'No references found in Trash.', 'electrontwo' )
  );

  $taxonomies = array('category', 'post_tag');

  $supports = array('title', 'thumbnail', 'editor');

  $post_type_args = array(
  	'labels'             => $labels,
    'description'        => __( 'A custom post type for references.', 'electrontwo' ),
  	'public'             => true,
  	'publicly_queryable' => true,
  	'show_ui'            => true,
  	'show_in_menu'       => true,
  	'query_var'          => true,
  	'rewrite'            => array( 'slug' => 'references', 'with_front' => false ),
  	'capability_type'    => 'post',
  	'has_archive'        => true,
  	'hierarchical'       => false,
  	'menu_position'      => 6,
    'menu_icon'         => 'dashicons-media-document',
  	'supports'           => $supports,
    'taxonomies'        => $taxonomies
  );

  register_post_type('references', $post_type_args);

}

//Register Slides Post Type
function init_slides_post_type() {

    $labels = array(
      'name'               => _x( 'Slides', 'post type general name', 'electrontwo' ),
      'singular_name'      => _x( 'Slide', 'post type singular name', 'electrontwo' ),
      'menu_name'          => _x( 'HPE Top Slider', 'admin menu', 'electrontwo' ),
      'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'electrontwo' ),
      'add_new'            => _x( 'Add New', 'slide', 'electrontwo' ),
      'add_new_item'       => __( 'Add New Slide', 'electrontwo' ),
      'new_item'           => __( 'New Slide', 'electrontwo' ),
      'edit_item'          => __( 'Edit Slide', 'electrontwo' ),
      'view_item'          => __( 'View Slide', 'electrontwo' ),
      'all_items'          => __( 'All Slides', 'electrontwo' ),
      'search_items'       => __( 'Search Slides', 'electrontwo' ),
      'parent_item_colon'  => __( 'Parent Slides:', 'electrontwo' ),
      'not_found'          => __( 'No slides found.', 'electrontwo' ),
      'not_found_in_trash' => __( 'No slides found in Trash.', 'electrontwo' )
    );

    $taxonomies = array();

    $supports = array('title', 'thumbnail', 'editor');

    $post_type_args = array(
    	'labels'             => $labels,
      'description'        => __( 'A custom post type for top slider\'s slides.', 'electrontwo' ),
    	'public'             => true,
    	'publicly_queryable' => true,
    	'show_ui'            => true,
    	'show_in_menu'       => true,
    	'query_var'          => true,
    	'rewrite'            => array( 'slug' => 'slides', 'with_front' => false ),
    	'capability_type'    => 'post',
    	'has_archive'        => true,
    	'hierarchical'       => false,
    	'menu_position'      => 27,
      'menu_icon'          => 'dashicons-images-alt2',
    	'supports'           => $supports,
      'taxonomies'         => $taxonomies
    );

    register_post_type('slides', $post_type_args);
}

//Register Logos Post Type
function init_logos_post_type() {

    $labels = array(
      'name'               => _x( 'Logos', 'post type general name', 'electrontwo' ),
      'singular_name'      => _x( 'Logo', 'post type singular name', 'electrontwo' ),
      'menu_name'          => _x( 'HPE Logo Slider', 'admin menu', 'electrontwo' ),
      'name_admin_bar'     => _x( 'Logo', 'add new on admin bar', 'electrontwo' ),
      'add_new'            => _x( 'Add New', 'logo', 'electrontwo' ),
      'add_new_item'       => __( 'Add New Logo', 'electrontwo' ),
      'new_item'           => __( 'New Logo', 'electrontwo' ),
      'edit_item'          => __( 'Edit Logo', 'electrontwo' ),
      'view_item'          => __( 'View Logo', 'electrontwo' ),
      'all_items'          => __( 'All Logos', 'electrontwo' ),
      'search_items'       => __( 'Search Logos', 'electrontwo' ),
      'parent_item_colon'  => __( 'Parent Logos:', 'electrontwo' ),
      'not_found'          => __( 'No logos found.', 'electrontwo' ),
      'not_found_in_trash' => __( 'No logos found in Trash.', 'electrontwo' )
    );

    $taxonomies = array();

    $supports = array('title', 'thumbnail');

    $post_type_args = array(
    	'labels'             => $labels,
      'description'        => __( 'A custom post type for logo slider\'s slides.', 'electrontwo' ),
    	'public'             => true,
    	'publicly_queryable' => true,
    	'show_ui'            => true,
    	'show_in_menu'       => true,
    	'query_var'          => true,
    	'rewrite'            => array( 'slug' => 'logos', 'with_front' => false ),
    	'capability_type'    => 'post',
    	'has_archive'        => false,
    	'hierarchical'       => false,
    	'menu_position'      => 28,
      'menu_icon'          => 'dashicons-images-alt',
    	'supports'           => $supports,
      'taxonomies'         => $taxonomies
    );

    register_post_type('logos', $post_type_args);
}
