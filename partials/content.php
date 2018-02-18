
  <article class="post
  <?php
  if(has_post_thumbnail() && !is_singular('references')):?> has-thumbnail
<?php elseif(is_singular('references')):?> references
  <?php endif;?>
  ">

    <div class="post-headline">
      <?php if(is_single()):?>
      <h1><?php the_title(); ?></h1>
      <?php else:?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php endif; ?>
    </div><!--post-headline-->

    <?php if(!is_singular('references')):?>
      <p class="post-info">
        <?php echo elot_post_meta();?>
      </p>

    <div class="post-thumbnail">
      <?php if(is_single()):
        the_post_thumbnail('banner-image'); ?>
      <?php else:?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('banner-image');?></a>
      <?php endif; ?>
    </div><!--post-thumbnail-->

    <?php endif; ?>

    <div class="post-content">
      <?php if(is_search() || is_archive()):?>
        <p>
        <?php echo get_the_excerpt(); ?>
          <a href="the_permalink()">Read more &raquo;</a>
        </p>
        <?php else:?>
          <?php if($post->post_excerpt):?>
            <p>
            <?php echo get_the_excerpt(); ?>
            <a href="the_permalink()">Read more &raquo;</a>
            </p>

          <?php
            else: the_content('Continue reading &raquo;');
          endif;
        endif;
      ?>
  </div> <!--post-content-->
<?php if(is_singular('references')): ?>
<div class="post-widget">


    <?php
    $terms = get_the_terms( $post->ID, 'reference-category' );
    if ( !empty( $terms ) ):
        // get the first term
        $term = array_shift( $terms );


    $args = array(
      'post_type' => 'references',
      'post__not_in' => array( $post->ID ),
      'tax_query' => array(
          array(
              'taxonomy' => 'reference-category',
              'field'    => 'slug',
              'terms'    => $term->slug,
          ),
      ),
  );

  $query = new WP_Query( $args );

    if( $query->have_posts() ): ?>
    <div class="post-headline">
      <h2><?php echo __('Othere references for: ') . $term->name; ?></h2>
    </div>
      <div class="references-layout">

<?php
      while( $query->have_posts() ):
        $query->the_post();
          get_template_part('partials/content', 'taxonomy');
      endwhile;
    endif;
    wp_reset_postdata(); ?>

  </div><!--references-layout-->
  </div>
<?php endif; endif; ?>




</article>
