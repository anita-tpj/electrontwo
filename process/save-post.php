<?php
function references_save_post_admin($post_id, $post, $update){
  if(!$update){
    return;
  }

  $references_data = array();
  $references_data['client'] = sanitize_text_field($_POST['ref_inputClient']);
  $references_data['clientUrl'] = sanitize_text_field($_POST['ref_inputURL']);
  $references_data['projectType'] = sanitize_text_field($_POST['ref_inputType']);
  $references_data['projectDescription'] = sanitize_text_field($_POST['ref_inputDescription']);
  $references_data['projectDuration'] = sanitize_text_field($_POST['ref_inputDuration']);

  update_post_meta($post_id, 'references_data', $references_data);
}


function slides_save_post_admin($post_id, $post, $update){
  if(!$update){
    return;
  }

  $slides_data = array();
  $slides_data['slideUrl'] = sanitize_text_field($_POST['slide_inputURL']);

  update_post_meta($post_id, 'slides_data', $slides_data);
}

function logos_save_post_admin($post_id, $post, $update){
  if(!$update){
    return;
  }

  $logos_data = array();
  $logos_data['logoUrl'] = sanitize_text_field($_POST['logo_inputURL']);

  update_post_meta($post_id, 'logos_data', $logos_data);
}
