<?php

function elt_resources(){
//Enqueue Styles
  wp_register_style('style', get_stylesheet_uri());
  wp_register_style('font_awsome', get_template_directory_uri() . '/css/font-awsome/css/fontawesome-all.min.css');
  wp_register_style('nav', get_template_directory_uri() . '/nav.css');
  wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', '2.6.4');

  wp_enqueue_style('style');
  wp_enqueue_style('font_awsome');
  wp_enqueue_style('nav');
  wp_enqueue_style( 'flexslider');

//Enqueue Scripts
  wp_register_script('nav', get_template_directory_uri() . '/js/nav.js', array( 'jquery' ), '1.0.0', true);
  wp_register_script( 'global', get_template_directory_uri() .  '/js/global.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'flexslider', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.4', true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('nav');
  wp_enqueue_script( 'global');
  wp_enqueue_script( 'flexslider');

}

add_action('wp_enqueue_scripts', 'elt_resources');
