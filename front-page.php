<?php get_header();?>

<div class="site-main">

<!--Slider Section-->
<section class="slider">
<?php get_template_part('sections/content', 'slider'); ?>


</section>


<!--Services Section-->

<section class="main-service">

    <?php $mainService = new WP_Query('page_id=92');
      if($mainService->have_posts()):
        while($mainService->have_posts()): $mainService->the_post();
          get_template_part('sections/content', 'main-service');
        endwhile;

        else:
          echo '<p>No content found</p>';

      endif;?>
</section><!-- main-service-->



<section class="other-services">
<div class= "service-boxes">
  <div class="box">
    <?php $service1 = new WP_Query('page_id=94');
      if($service1->have_posts()):
        while($service1->have_posts()): $service1->the_post();
          get_template_part('sections/content', 'other-services');
        endwhile;

        else:
          echo '<p>No content found</p>';

      endif;?>

  </div><!-- box-->

  <div class="box">
    <?php $service1 = new WP_Query('page_id=94');
      if($service1->have_posts()):
        while($service1->have_posts()): $service1->the_post();
          get_template_part('sections/content', 'other-services');
        endwhile;

        else:
          echo '<p>No content found</p>';

      endif;?>

  </div><!-- box-->

  <div class="box">
    <?php $service1 = new WP_Query('page_id=94');
      if($service1->have_posts()):
        while($service1->have_posts()): $service1->the_post();
          get_template_part('sections/content', 'other-services');
        endwhile;

        else:
          echo '<p>No content found</p>';

      endif;?>

  </div><!-- box-->
</div><!-- service-boxes-->
</section><!-- main-service-->

<!--About Us Section-->
<section class="about-us">
    <?php if(have_posts()):
      while(have_posts()): the_post();
        get_template_part('sections/content', 'about-us');
      endwhile;

      else:
        echo '<p>No content found</p>';

    endif;?>
</section><!-- about-us-->

<!--Slider Reference-->
<section class="reference">
  <?php get_template_part('sections/content', 'logos'); ?>
</section>

</div> <!--main-->

<?php get_footer();?>
