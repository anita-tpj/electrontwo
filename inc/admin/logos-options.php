<?php
function elt_logos_options_mb($post){
  $logos_data = get_post_meta($post->ID, 'logos_data', true);

  if(!$logos_data){
    $logos_data = array(
      'logoUrl'  => ''
    );
  }

?>
<div class="form-item">
  <label for="logo_inputLogoURL">Logo URL</label>
  <input type="url" class="form-item-input" id="logo_inputLogoURL" name = "logo_inputURL" value = "<?php echo $logos_data['logoUrl']; ?>">
</div>
<?php
}
