<?php
function elt_admin_resources(){

  global $typenow;
  if($typenow != references){
    return;
  }

//Enqueue Styles
  wp_register_style('electrontwo_admin', get_template_directory_uri() .'/css/electrontwo.admin.css', '1.0.0');
  wp_enqueue_style('electrontwo_admin');
}
