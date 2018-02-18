<?php

function elt_resources(){
//Enqueue Styles
  wp_register_style('style', get_stylesheet_uri());
  wp_register_style('font_awsome', get_template_directory_uri() . '/css/font-awsome/css/fontawesome-all.min.css');
  //wp_register_style('nav', get_template_directory_uri() . '/css/nav.css');
  wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', '2.6.4');

  wp_enqueue_style('style');
  wp_enqueue_style('font_awsome');
  //wp_enqueue_style('nav');
  if( is_front_page() || is_home() ){
    wp_enqueue_style( 'flexslider');
  }


//Enqueue Scripts
  wp_register_script( 'nav', get_template_directory_uri() . '/js/front/nav.js', array( 'jquery' ), '1.0.0', true);
  wp_register_script( 'global', get_template_directory_uri() .  '/js/global.js', array( 'jquery' ), '1.0.0', true );
  wp_register_script( 'googlemapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBxIqN4yi07qU8IggSNkrUX_C7133FzAaI', array( 'jquery' ), '1.0.0', true);
  wp_register_script( 'flexslider', get_template_directory_uri() .  '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.4', true );
  wp_register_script( 'sliders', get_template_directory_uri() .  '/js/front/sliders.js', array( 'jquery', 'flexslider' ), '1.0.0', true );

  wp_enqueue_script('jquery');
  wp_enqueue_script('nav');
  wp_enqueue_script( 'global');
  wp_enqueue_script( 'googlemapsapi');
  if( is_front_page() || is_home() ){
    wp_enqueue_script( 'flexslider');
    wp_enqueue_script( 'sliders');
  }
  //if( is_front_page() || is_home() || is_page_template('contact.php') ){

  //}
}
