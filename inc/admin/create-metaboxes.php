<?php
function references_create_metaboxes(){
  add_meta_box(
    'elt_references_options_mb', //$id
    __('References Options', 'electrontwo'), //$title
    'elt_references_options_mb', //$callback function
    'references', //post-type
    'normal', //$contex
    'high' //$ptiority
  );
}

function slides_create_metaboxes(){
  add_meta_box(
    'elt_slides_options_mb', //$id
    __('Slide Options', 'electrontwo'), //$title
    'elt_slides_options_mb', //$callback function
    'slides', //post-type
    'normal', //$contex
    'high' //$ptiority
  );
}


function logos_create_metaboxes(){
  add_meta_box(
    'elt_logos_options_mb', //$id
    __('Logo Options', 'electrontwo'), //$title
    'elt_logos_options_mb', //$callback function
    'logos', //post-type
    'normal', //$contex
    'high' //$ptiority
  );
}
