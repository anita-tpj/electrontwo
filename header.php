<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset = "<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width" />
  <title><?php bloginfo('name');?></title>
  <?php wp_head(); ?>
</head>
<body <?php  body_class();?>>
  <div class="container <?php if(is_front_page()):?>full<?php endif;?>">
    <!-- Site Header -->
    <header class="site-header">

      <div class="header-info">

       <div class="header-site-info">
          <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
          <h5><?php bloginfo('description'); ?>
            <?php
            if(is_page('portfolio')):?>
            - Thank you for viewing our work!
          <?php endif;?>
          </h5>
       </div>
       <!--<div class="header-site-search">
         <?php get_search_form(); ?>
       </div> -->

       <button type="button" id="inv-nav-main-btn" class="hamburger right">
       	<span class="hamburger-box">
       		<span class="hamburger-inner"></span>
       	</span>
       	<span class="text">Menu</span>
       </button>


        <?php $args = array(
          'theme_location' => 'primary',
          'container' => '',
          'container' => 'nav',
          'menu_class' =>'right',
          'menu_id' => 'inv-menu'
        ); ?>
        <?php wp_nav_menu($args); ?>

      </div><!-- header-site-info -->





    </header><!-- /Site Header -->
