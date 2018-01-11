<?php
function references_content($content){

  if(!is_singular('references')){
  return $content;
  }

  $references_html =  file_get_contents('references_template.php', true);

  global $post;

  $references_data = get_post_meta($post->ID, 'references_data', true);

  $references_html = str_replace('CLIENT_PH', $references_data['client'], $references_html );
  $references_html = str_replace('CLIENT_WEB_SITE_PH', $references_data['clientUrl'], $references_html );
  $references_html = str_replace('PROJECT_TYPE_PH', $references_data['projectType'], $references_html );
  $references_html = str_replace('PROJECT_DESCRIPTION_PH', $references_data['projectDescription'], $references_html );
  $references_html = str_replace('PROJECT_DURATION_PH', $references_data['projectDuration'], $references_html );

  $references_html = str_replace('CLIENT_I18N', __('Client', 'electrontwo'), $references_html);
  $references_html = str_replace('CLIENT_WEB_SITE_I18N', __('Client Web Site', 'electrontwo'), $references_html);
  $references_html = str_replace('PROJECT_TYPE_I18N', __('Project Type', 'electrontwo'), $references_html);
  $references_html = str_replace('PROJECT_DESCRIPTION_I18N', __('Project Description', 'electrontwo'), $references_html);
  $references_html = str_replace('PROJECT_DURATION_I18N', __('Project Duration', 'electrontwo'), $references_html);


  return $references_html . $content;
}
