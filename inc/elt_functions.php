<?php

/*Theme Setup*/
function elt_setup(){

  //Register Navigation Menus
  register_nav_menus(array(
    'primary'   => __('Prymary Menu'),
    'footer'    => __('Footer Menu')
  ));

  //Add featured images size support
  add_image_size('extra-small-thumbnail', 80, 80, true);
  add_image_size('small-thumbnail', 180, 120, true);
  add_image_size('middle-thumbnail', 250, 200, true);
  add_image_size('big-thumbnail', 380, 250, true);
  add_image_size('banner-image', 920, 210, array('left', 'top'));
  add_image_size('slider-image', 920, 400, true);
  add_image_size('logo-image', 210, 80, true);
  add_image_size('home-page-small-thumbnail', 120, 120, array('left', 'top'));

  //Add page excerpt support
  add_post_type_support( 'page', 'excerpt' );

}

/*Customize Excerpt Length*/
function elt_excerpt_length(){
  return 35;
}

add_filter('excerpt_length', 'elt_excerpt_length');

function elt_excerpt_more( $more ) {
  if(is_front_page()){
    return '<div class="post-btn"><a class="post-excerpt-btn" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'electrontwo') . '</a></div>';
  }else{
    return '<a class="post-excerpt-link" href="'. get_permalink( get_the_ID() ) . '">' . __('...read more', 'electrontwo') . '</a>';

  }
}
add_filter( 'excerpt_more', 'elt_excerpt_more' );


/*Display Post Meta Data*/
function elot_post_meta() {

    $date = get_the_time('F jS, Y g:i a');
    $author = get_the_author();
    $author = '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a>';
    $categories = get_the_category();
    $separator = ", ";
    $cats = "";


    if($categories){
      $i=0;
      foreach($categories as $category){
        if($i > 0){
          $cats .= $separator;
        }
        $cats .= '<a href="'.esc_url(get_category_link($category->term_id)).'" alt="'.esc_attr('View all posts in$s', $category->name).'">'.esc_html($category->name).'</a>';
        $i++;
        }
      }

    $output = 'Posted on: ' . $date . ' | by '.$author.' | Posted in: ' . $cats;
    return $output;
}

/*Remove meta tag about WP Version in HEADER*/
function elt_remove_version(){
  return '';
}

/*Remove title prefix on Ctaegory, Archive pages*/
function elt_remove_titleprefix($title){
  if(is_tax()){
    return single_term_title( '', false );
  }else{
    return preg_replace('/^\w+:/', '', $title);
  }
}
