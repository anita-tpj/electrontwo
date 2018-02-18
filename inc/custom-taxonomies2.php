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

//Custom field for custom taxonomy- Extending The Term Form: ADDING META DATA WITH A NEW TERM
add_action( 'reference-category_add_form_fields', 'add_featured_image_field', 10, 2 );
function add_featured_image_field($taxonomy) {

?>
    <p>
    	<label for="featured-image"><?php _e('Set featured image', 'electrontwo'); ?></label><br>
    	<input type="text" name="featured-image" id="featured-image" class="meta-image regular-text" value="">
      <?php

      if(isset($_POST['featured-image']) && $_POST['featured-image'] != ""): ?>
      <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Change Image', 'electrontwo' ); ?>">
      <input type="button" class="button elt_tax_media_button-remove" id="elt_tax_media_button-remove" name="elt_tax_media_button-remove" value="<?php _e( 'Remove Image', 'electrontwo' ); ?>">

      <?php else: ?>
      <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Add Image', 'electrontwo' ); ?>">

    <?php endif;?>
    </p>
    <div class="image-preview"><img src="" style="max-width: 250px;"></div>
   <?php
}

// Save the term meta

add_action( 'created_reference-category', 'save_feature_meta', 10, 2 );

function save_feature_meta( $term_id, $tt_id ){
    if( isset( $_POST['featured-image'] ) && '' !== $_POST['featured-image'] ){
        $image = $_POST['featured-image'];
        add_term_meta( $term_id, 'featured-image', $image, true );
    }
}

//Updating/Editing A Term With Meta Data
add_action( 'reference-category_edit_form_fields', 'edit_featured_image_field', 10, 2 );

function edit_featured_image_field( $term, $taxonomy ){

    // get current group
    $image = get_term_meta( $term->term_id, 'featured-image', true );

    ?>
    <p>
    	<label for="featured-image"><?php _e('Set featured image', 'electrontwo'); ?></label><br>
    	<input type="text" name="featured-image" id="featured-image" class="meta-image regular-text" value="<?php echo $image; ?>">
      <?php if($image): ?>
      <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Replace Image', 'electrontwo' ); ?>">
      <input type="button" class="button elt_tax_media_button-remove" id="elt_tax_media_button-remove" name="elt_tax_media_button-remove" value="<?php _e( 'Remove Image', 'electrontwo' ); ?>">
      <?php else: ?>
      <input type="button" class="button elt_tax_media_button" id="elt_tax_media_button" name="elt_tax_media_button" value="<?php _e( 'Add Image', 'electrontwo' ); ?>">
<?php endif;?>
    </p>
    <?php if($image): ?>
    <div class="image-preview"><?php echo wp_get_attachment_image( $image, 'small-thumbnail' )?></div>
<?php else: ?>
  <div class="image-preview"></div>

<?php endif;
  }






// Save Updated Term With Meta Data
add_action( 'edited_reference-category', 'update_feature_meta', 10, 2 );

function update_feature_meta( $term_id, $tt_id ){

    if( isset( $_POST['featured-image'] ) && '' !== $_POST['featured-image'] ){
        $image = $_POST['featured-image'];
        update_term_meta( $term_id, 'featured-image', $image );
    }
}

//Displaying The Term Meta Data In The Term List

add_filter('manage_edit-reference-category_columns', 'add_featured_image_column' );

function add_featured_image_column( $columns ){
    $columns['featured-image'] = __( 'Image', 'electrontwo' );
    return $columns;
}

//Add the content into the column fields,
add_filter('manage_reference-category_custom_column', 'add_featured_image_column_content', 10, 3 );

function add_featured_image_column_content( $content, $column_name, $term_id ){

    if( $column_name !== 'featured-image' ){
        return $content;
    }

    $term_id = absint( $term_id );
    $featured_image = get_term_meta( $term_id, 'featured-image', true );

    if( !empty( $featured_image ) ){

        $content .= wp_get_attachment_image ( $featured_image, 'extra-small-thumbnail' );
    }

    return $content;
}

//make the image column sortable

add_filter( 'manage_edit-reference-category_sortable_columns', 'set_featured_image_column_sortable' );

function set_featured_image_column_sortable( $sortable ){
    $sortable['featured-image'] = 'featured-image';
    return $sortable;
}
