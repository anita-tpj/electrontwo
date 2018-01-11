<?php
function elt_slides_options_mb($post){
  $slides_data = get_post_meta($post->ID, 'slides_data', true);

  if(!$slides_data){
    $slides_data = array(
      'slideUrl'  => ''
    );
  }

?>
<div class="form-item">
  <label for="slide_inputSlideURL">Slide URL</label>
  <input type="url" class="form-item-input" id="slide_inputSlideURL" name = "slide_inputURL" value = "<?php echo $slides_data['slideUrl']; ?>">
</div>
<?php
}
