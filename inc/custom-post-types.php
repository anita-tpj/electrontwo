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




    // Meta Box for Slider URL

    $slidelink_2_metabox = array(
        'id' => 'slidelink',
        'title' => 'Slide Link',
        'page' => array('slides'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(

                    array(
                        'name'          => 'Slide URL',
                        'desc'          => '',
                        'id'                => 'wptuts_slideurl',
                        'class'             => 'wptuts_slideurl',
                        'type'          => 'text',
                        'rich_editor'   => 0,
                        'max'           => 0
                    ),
                    )
    );

    add_action('admin_menu', 'wptuts_add_slidelink_2_meta_box');
    function wptuts_add_slidelink_2_meta_box() {

        global $slidelink_2_metabox;

        foreach($slidelink_2_metabox['page'] as $page) {
            add_meta_box($slidelink_2_metabox['id'], $slidelink_2_metabox['title'], 'wptuts_show_slidelink_2_box', $page, 'normal', 'default', $slidelink_2_metabox);
        }
    }

    // function to show meta boxes
    function wptuts_show_slidelink_2_box()  {
        global $post;
        global $slidelink_2_metabox;
        global $wptuts_prefix;
        global $wp_version;

        // Use nonce for verification
        echo '<input type="hidden" name="wptuts_slidelink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

        echo '<table class="form-table">';

        foreach ($slidelink_2_metabox['fields'] as $field) {
            // get current post meta data

            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<tr>',
                    '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                    '<td class="wptuts_field_type_' . str_replace(' ', '_', $field['type']) . '">';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                    break;
            }
            echo    '<td>',
                '</tr>';
        }

        echo '</table>';
    }

    // Save data from meta box
    add_action('save_post', 'wptuts_slidelink_2_save');
    function wptuts_slidelink_2_save($post_id) {
        global $post;
        global $slidelink_2_metabox;

        // verify nonce
        if (!wp_verify_nonce($_POST['wptuts_slidelink_2_meta_box_nonce'], basename(__FILE__))) {
            return $post_id;
        }

        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        foreach ($slidelink_2_metabox['fields'] as $field) {

            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];

            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = wptuts_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    }
                    update_post_meta($post_id, $field['id'], $new);


                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }



        // Meta Box for Logo URL

        $logolink_2_metabox = array(
            'id' => 'logolink',
            'title' => 'Logo Link',
            'page' => array('logos'),
            'context' => 'normal',
            'priority' => 'default',
            'fields' => array(

                        array(
                            'name'          => 'Logo URL',
                            'desc'          => '',
                            'id'                => 'elt_logourl',
                            'class'             => 'elt_logoeurl',
                            'type'          => 'text',
                            'rich_editor'   => 0,
                            'max'           => 0
                        ),
                        )
        );

        add_action('admin_menu', 'elt_add_logolink_2_meta_box');
        function elt_add_logolink_2_meta_box() {

            global $logolink_2_metabox;

            foreach($logolink_2_metabox['page'] as $page) {
                add_meta_box($logolink_2_metabox['id'], $logolink_2_metabox['title'], 'elt_show_logolink_2_box', $page, 'normal', 'default', $logolink_2_metabox);
            }
        }

        // function to show meta boxes
        function elt_show_logolink_2_box()  {
            global $post;
            global $logolink_2_metabox;
            global $elt_prefix;
            global $wp_version;

            // Use nonce for verification
            echo '<input type="hidden" name="elt_logolink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

            echo '<table class="form-table">';

            foreach ($logolink_2_metabox['fields'] as $field) {
                // get current post meta data

                $meta = get_post_meta($post->ID, $field['id'], true);

                echo '<tr>',
                        '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                        '<td class="elt_field_type_' . str_replace(' ', '_', $field['type']) . '">';
                switch ($field['type']) {
                    case 'text':
                        echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                        break;
                }
                echo    '<td>',
                    '</tr>';
            }

            echo '</table>';
        }

        // Save data from meta box
        add_action('save_post', 'elt_logolink_2_save');
        function elt_logolink_2_save($post_id) {
            global $post;
            global $logolink_2_metabox;

            // verify nonce
            if (!wp_verify_nonce($_POST['elt_logolink_2_meta_box_nonce'], basename(__FILE__))) {
                return $post_id;
            }

            // check autosave
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return $post_id;
            }

            // check permissions
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
                }
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }

            foreach ($logolink_2_metabox['fields'] as $field) {

                $old = get_post_meta($post_id, $field['id'], true);
                $new = $_POST[$field['id']];

                if ($new && $new != $old) {
                    if($field['type'] == 'date') {
                        $new = wptuts_format_date($new);
                        update_post_meta($post_id, $field['id'], $new);
                    } else {
                        if(is_string($new)) {
                            $new = $new;
                        }
                        update_post_meta($post_id, $field['id'], $new);


                    }
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, $field['id'], $old);
                }
            }
        }
