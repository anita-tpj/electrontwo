<?php
function elt_admin_resources(){
  global $typenow, $pagenow;
  //Enqueue Scripts
  wp_register_script( 'electrontwo_admin', get_template_directory_uri() .  '/js/electrontwo.admin.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'media_upload', get_template_directory_uri() .  '/js/admin/media-upload.js', array( 'jquery' ), '1.0.0', true );

  wp_enqueue_script('electrontwo_admin');

  if(!did_action('wp_enqueue_media')){
  		wp_enqueue_media();
  }

  if(in_array ($pagenow, array ('edit-tags.php', 'term.php'))){
    wp_enqueue_script('media_upload');
  }

  if($typenow != 'references' && $typenow != 'slides' && $typenow != 'logos'  && is_page_template('contact.php')){
    return;
  }

//Enqueue Styles
  wp_register_style('electrontwo_admin', get_template_directory_uri() .'/css/electrontwo.admin.css', '1.0.0');
  wp_enqueue_style('electrontwo_admin');
}
