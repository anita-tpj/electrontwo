<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset = "<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width" />
  <title><?php bloginfo('name');?></title>
  <?php wp_head(); ?>
</head>
<body <?php  body_class();?>>
  <div class="container
  <?php if(is_front_page()):?> front-page<?php endif;?>
  <?php if(is_page_template('contact.php', 'page-full.php')):?> full-page<?php endif;?>">
    <!-- Site Header -->
    <header class="site-header">

      <div class="header-info">

       <div class="header-site-info">
          <!--<h1><a href="<?php //echo home_url(); ?>"><?php //bloginfo('name'); ?></a></h1>-->
          <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if(has_custom_logo()){
                    echo '<a href="'.get_home_url().'"><img id="logo" src="'. esc_url( $logo[0] ) .'"></a>';
            }else{
                    echo '<h1 id="site-name"><a href="'.gert_home_url().'">'. get_bloginfo( 'name' ) .'</a></h1>';
            }
          ?>

          <h5 id="site-description"><?php bloginfo('description'); ?>
            <?php
            if(is_page('portfolio')):?>
            - Thank you for viewing our work!
          <?php endif;?>
          </h5>
       </div><!-- .header-site-info -->
       <!--<div class="header-site-search">
         <?php get_search_form(); ?>
       </div> -->

       <button type="button" id="inv-nav-main-btn" class="hamburger right hamburger--collapse">
       	<span class="hamburger-box">
       		<span class="hamburger-inner"></span>
       	</span>
       	<span class="text"><?php _e('Menu', 'electrontwo'); ?></span>
       </button>


        <?php $args = array(
          'theme_location' => 'primary',
          'container' => 'nav',
          'menu_class' =>'right',
          'menu_id' => 'inv-menu'
        ); ?>
        <?php wp_nav_menu($args); ?>

      </div><!-- .header-info -->


<?php if(!is_front_page()):?>

<hr class="fadeAway"/>
<?php endif;?>
    </header><!-- /Site Header -->
