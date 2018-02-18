<?php
/* Template Name: Contact Page Layout */

get_header();
$contact_data = get_post_meta( $post->ID, 'contact_data', true );
?>

<div class="site-main">

<?php if(have_posts()):

  while(have_posts()): the_post();

  get_template_part('partials/content', 'page');

  endwhile;

  else:
    echo '<p>No content found</p>';

endif;?>

<div id="map"></div>

<?php if($contact_data): ?>
  <div id="locations">
  <?php foreach (array_reverse($contact_data) as $key=>$location):
    if($key< count($contact_data)-1):?>

      <ul>

        <?php if($location['company']!=""):?><li class = "ci-company" ><?php if($location['latitude']!="" && $location['longitude']!=""):?><a href = "#"><?php endif; ?><?php echo $location['company']; ?>
        <?php if($location['latitude']!="" && $location['longitude']!=""):?></a><?php endif; ?></li><?php endif; ?>
        <?php if($location['location']!=""):?><li class = "ci-location"><span style="white-space: nowrap"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $location['location']; ?></li></span><?php endif; ?>
        <?php if($location['address']!=""):?><address class="ci-address"><span style="white-space: nowrap"><i class="fa fa-street-view" aria-hidden="true"></i> <?php echo $location['address']; ?></span></address><?php endif; ?>
        <?php if($location['phone']!=""):?><li class="ci-phone"><span style="white-space: nowrap"><i class="fas fa-phone" aria-hidden="true"></i> <?php echo $location['phone']; ?></span></li><?php endif; ?>
        <?php if($location['email']!=""):?><li class="ci-email"><span style="white-space: nowrap"><i class="far fa-envelope aria-hidden="true""></i> <?php echo $location['email']; ?></span></li><?php endif; ?>
        <?php if($location['latitude']!=""):?><li class = "ci-geolocation-lat"><?php echo $location['latitude']; ?></li><?php endif; ?>
        <?php if($location['longitude']!=""):?><li class = "ci-geolocation-lng"><?php echo $location['longitude']; ?></li><?php endif; ?>

      </ul>

  <?php endif; endforeach; ?>
  </div><!--#locations-->
<?php endif; ?>

<div class="contact-form">
  <div class="page-headline">
    <h2><?php _e('Ask us a specific question and we will get back to you as soon as possible', 'electrontwo') ?></h2>
  </div>
  <?php echo do_shortcode( '[contact-form-7 id="1234" title="Contact form 1"]' ); ?>
</div>

</div> <!--.main-->

<?php get_footer();?>
