<?php
function elt_create_metaboxes(){
  global $post;
  if(!empty($post)){
  $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if($pageTemplate == 'contact.php' ){
      add_meta_box(
        'elt_contact_informations_mb',
        __('Contact Information', 'electrontwo'),
        'elt_contact_informations_mb',
        'page',
        'normal',
        'default'
      );
    }
  }
}
add_action( 'add_meta_boxes', 'elt_create_metaboxes' );
