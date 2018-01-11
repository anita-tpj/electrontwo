<?php
function elt_references_options_mb($post){
  $references_data = get_post_meta($post->ID, 'references_data', true);

  if(!$references_data){
    $references_data = array(
      'client'              => '',
      'clientUrl'           => '',
      'projectType'         => '',
      'projectDescription'  => '',
      'projectDuration'     => ''

    );
  }

?>

<div class="form-item">
  <label for="ref_inputClient">Client</label>
  <input type="text" class="form-item-input" id="ref_inputClient" name = "ref_inputClient" value = "<?php echo $references_data['client']; ?>">
</div>

<div class="form-item">
  <label for="ref_inputClientURL">Client Web Site</label>
  <input type="url" class="form-item-input" id="ref_inputClientURL" name = "ref_inputURL" value = "<?php echo $references_data['clientUrl']; ?>">
</div>

<div class="form-item">
  <label for="ref_inputType">Project Type</label>
  <input type="text" class="form-item-input" id="ref_inputType" name = "ref_inputType" value = "<?php echo $references_data['projectType']; ?>">
</div>

<div class="form-item">
  <label for="ref_inputDescription">Project Description</label>
  <input type="text" class="form-item-input" id="ref_inputDescription" name = "ref_inputDescription" value = "<?php echo $references_data['projectDescription']; ?>">
</div>

<div class="form-item">
  <label for="ref_inputDuration">Project Duration</label>
  <input type="text" class="form-item-input" id="ref_inputDuration" name = "ref_inputDuration" value = "<?php echo $references_data['projectDuration']; ?>">
</div>

<?php
}
