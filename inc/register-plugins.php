<?php
function elt_register_required_plugins(){
  $plugins = array(
    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => true
    )
  );

  $config = array(
  		'id'           => 'elt_tgmpa',
  		'default_path' => '',
  		'menu'         => 'tgmpa-install-plugins',
      'parent_slug'  => 'themes.php',
      'capability'   => 'edit_theme_options',
      'has_notices'  => true,
  		'dismissable'  => true,
  		'dismiss_msg'  => '',
  		'is_automatic' => true,
  		'message'      => '',
    );
    
  tgmpa($plugins, $config);
}
