<?php

// Create Custom Taxonomy


//Custom taxonomy for References post type
function init_references_post_type_taxonomies() {
  $labels = array(
    'name'              => _x( 'References Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Reference Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Reference Categories' ),
    'all_items'         => __( 'All Reference Categories' ),
    'parent_item'       => __( 'Parent Reference Category' ),
    'parent_item_colon' => __( 'Parent Reference Category:' ),
    'edit_item'         => __( 'Edit Reference Category' ),
    'update_item'       => __( 'Update Reference Category' ),
    'add_new_item'      => __( 'Add New Reference Category' ),
    'new_item_name'     => __( 'New Reference Category' ),
    'menu_name'         => __( 'Reference Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  );
  register_taxonomy( 'reference-category', 'references', $args );
}

// register Custom taxonomy which applies to Attachments
function elt_add_location_taxonomy() {
    $labels = array(
        'name'              => 'Locations',
        'singular_name'     => 'Location',
        'search_items'      => 'Search Locations',
        'all_items'         => 'All Locations',
        'parent_item'       => 'Parent Location',
        'parent_item_colon' => 'Parent Location:',
        'edit_item'         => 'Edit Location',
        'update_item'       => 'Update Location',
        'add_new_item'      => 'Add New Location',
        'new_item_name'     => 'New Location Name',
        'menu_name'         => 'Location',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );

    register_taxonomy( 'location', 'attachment', $args );
}
add_action( 'init', 'elt_add_location_taxonomy' );


//Create custom field for custom taxonomy: Extending The Term Form: ADDING META DATA WITH A NEW TERM
add_action( 'reference-category_add_form_fields', 'add_featured_image_field', 10, 2 );
function add_featured_image_field ( $taxonomy ) {?>
  <div class="form-field term-image-wrap">
     <label for="featured-image-id"><?php _e('Image', 'electrontwo'); ?></label>
     <input type="hidden" id="featured-image-id" name="featured-image-id" class="custom_media_url" value="">
     <div id="featured-image-preview"></div>
     <p>
       <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Set Image', 'electrontwo' ); ?>" />
       <input type="button" class="button elt_tax_media_remove" id="elt_tax_media_remove" name="elt_tax_media_remove" value="<?php _e( 'Remove Image', 'electrontwo' ); ?>" />
    </p>
  </div>

 <?php
 }

// Save the term meta
add_action( 'created_reference-category', 'save_featured_image_meta', 10, 2 );

function save_featured_image_meta( $term_id, $tt_id ){
  if( isset( $_POST['featured-image-id'] ) && '' !== $_POST['featured-image-id'] ){
     $image = $_POST['featured-image-id'];
     add_term_meta( $term_id, 'featured-image-id', $image, true );
   }
}

//Updating/Editing A Term With Meta Data
add_action( 'reference-category_edit_form_fields', 'edit_featured_image', 10, 2 );

function edit_featured_image( $term, $taxonomy ){?>
     <tr class="form-field term-group-wrap">
       <th scope="row">
         <label for="featured-image-id"><?php _e( 'Image', 'electrontwo' ); ?></label>
       </th>
       <td>
         <?php $image_id = get_term_meta ( $term -> term_id, 'featured-image-id', true ); ?>
         <input type="hidden" id="featured-image-id" name="featured-image-id" value="<?php echo $image_id; ?>">
         <div id="featured-image-preview">
           <?php if ( $image_id ):
             $image = wp_get_attachment_image ( $image_id, 'thumbnail' );
             echo $image;?>
         </div>
         <p>
           <?php if ( $image ):?>
        <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Replace Image', 'electrontwo' ); ?>" />
        <input type="button" class="button elt_tax_media_remove" id="elt_tax_media_remove" name="elt_tax_media_remove" value="<?php _e( 'Remove Image', 'electrontwo' ); ?>" />
      <?php endif;else: ?>
        </div>
        <p>
           <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Add Image', 'electrontwo' ); ?>" />
         <?php endif;?>
         </p>
       </td>
     </tr>
   <?php
   }

// Save Updated Term With Meta Data
add_action( 'edited_reference-category', 'update_featured_image_meta', 10, 2 );

function update_featured_image_meta( $term_id, $tt_id ){
   if( isset( $_POST['featured-image-id'] ) && '' !== $_POST['featured-image-id'] ){
     $image = $_POST['featured-image-id'];
     update_term_meta ( $term_id, 'featured-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'featured-image-id', '' );
   }
 }

//Displaying The Term Meta Data In The Term List

add_filter('manage_edit-reference-category_columns', 'add_featured_image_column' );

function add_featured_image_column( $columns ){
    $columns['featured-image-id'] = __( 'Image', 'electrontwo' );
    return $columns;
}

//Add the content into the column fields,
add_filter('manage_reference-category_custom_column', 'add_featured_image_column_content', 10, 3 );

function add_featured_image_column_content( $content, $column_name, $term_id ){

    if( $column_name !== 'featured-image-id' ){
        return $content;
    }

    $term_id = absint( $term_id );
    $image = get_term_meta( $term_id, 'featured-image-id', true );

    if( !empty( $image ) ){

        $content .= wp_get_attachment_image ( $image, 'extra-small-thumbnail' );
    }

    return $content;
}

//make the image column sortable

add_filter( 'manage_edit-reference-category_sortable_columns', 'set_featured_image_column_sortable' );

function set_featured_image_column_sortable( $sortable ){
    $sortable['featured-image-id'] = 'featured-image-id';
    return $sortable;
}

//Create custom field for custom taxonomy: Extending The Term Form: ADDING META DATA WITH A NEW TERM
add_action( 'category_add_form_fields', 'add_featured_image_field', 10, 2 );
// Save the term meta
add_action( 'created_category', 'save_featured_image_meta', 10, 2 );
//Updating/Editing A Term With Meta Data
add_action( 'category_edit_form_fields', 'edit_featured_image', 10, 2 );
// Save Updated Term With Meta Data
add_action( 'edited_category', 'update_featured_image_meta', 10, 2 );
//Displaying The Term Meta Data In The Term List
add_filter('manage_edit-category_columns', 'add_featured_image_column' );
//Add the content into the column fields,
add_filter('manage_category_custom_column', 'add_featured_image_column_content', 10, 3 );
//make the image column sortable
add_filter( 'manage_edit-category_sortable_columns', 'set_featured_image_column_sortable' );
