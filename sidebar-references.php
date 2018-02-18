<aside class="site-sidebar">
  <?php
    $args = array(
      'before_widget' => '<div id="%1$s" class="widget %1$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widgettitle widget-title"><span>',
      'after_title'   => '</span></h4>'
        );
    $instance = array(
        'title'       => 'References List',
        'count'       => 0,
        'hierarchical'=> 0,
        'dropdown'    => 0,
        );

    the_widget( 'ElectronTwo_Reference_Categories_Widget', $instance, $args );
  ?>
</aside>
