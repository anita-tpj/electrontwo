<?php
/*Add Widgets Location*/
function elt_widget_init(){
  register_sidebar( array(
    'id'          => 'left-sidebar-1',
    'name'        => __( 'Left Sidebar 1', 'electrontwo' ),
    'description' => __( 'This sidebar is located at left.', 'electrontwo' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget'  => '</div>',
  	'before_title'  => '<h4 class="widgettitle widget-title"><span>',
  	'after_title'   => '</span></h4>'
) );

register_sidebar( array(
  'id'          => 'left-sidebar-2',
  'name'        => __( 'Left Sidebar 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at left.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle widget-title"><span>',
  'after_title'   => '</span></h4>'
) );

register_sidebar( array(
  'id'          => 'footer1',
  'name'        => __( 'Footer 1', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );


register_sidebar( array(
  'id'          => 'footer2',
  'name'        => __( 'Footer 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'footer3',
  'name'        => __( 'Footer 3', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'footer4',
  'name'        => __( 'Footer 4', 'electrontwo' ),
  'description' => __( 'This sidebar is located at footer.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h4 class="widgettitle">',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'id'          => 'service1',
  'name'        => __( 'Service 1', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service2',
  'name'        => __( 'Service 2', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service3',
  'name'        => __( 'Service 3', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );

register_sidebar( array(
  'id'          => 'service4',
  'name'        => __( 'Service 4', 'electrontwo' ),
  'description' => __( 'This sidebar is located at homepage.', 'electrontwo' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',
  'before_title'  => '<h3 class="widgettitle styled-line">',
  'after_title'   => '</h3>'
) );
}


/*Add Widget Class: ElectronTwo_Reference_Categories_Widget*/

class ElectronTwo_Reference_Categories_Widget extends WP_Widget{
  //Creating the widget - Setup the widget name, description, etc...
  public function __construct(){
    $widget_options = array(
      'classname'   => 'widget_elt_reference_categories',
      'description' => __('Reference Categories Widget', 'electrontwo')
    );
    parent::__construct('widget_elt_reference_categories', __('Reference Categories', 'electrontwo'), $widget_options);
  }

  // Creating widget front-end
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );



// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
$output_args = array(
  'taxonomy'     => 'reference-category',
  'orderby'      => 'name',
  'hide_empty'    => true,
  /*'show_option_all' => 'View All References',*/
  'show_count'   => false,
  'pad_counts'   => false,
  'hierarchical' => false,
  /*'hide_title_if_empty' =>true,*/
  /*'use_desc_for_title' => 1,*/
  'title_li'     => '',
  'echo'         => false
);
?>
  <ul><?php echo wp_list_categories( $output_args ); ?></ul>
<?php
echo $args['after_widget'];
}

  // Widget Backend
  public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) ) {
  $title = $instance[ 'title' ];
  /*$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;*/
  }
  else {
  $title = __( 'Widget Title', 'electrontwo' );
  }
  // Widget admin form
  ?>
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  //$instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;
  return $instance;
  }
} // Class ElectronTwo_Reference_Categories_Widget ends here

// Register and load the widget
  function elt_load_widget() {
      register_widget('ElectronTwo_Reference_Categories_Widget');
}
