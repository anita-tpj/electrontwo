<?php
//Includes
include('enqueue.php');
include('create-metaboxes.php');

function references_admin_init(){
  include('references-options.php');

  add_action('add_meta_boxes_references', 'references_create_metaboxes');
  add_action('admin_enqueue_scripts', 'elt_admin_resources');
}

function slides_admin_init(){
  include('slides-options.php');

  add_action('add_meta_boxes_slides', 'slides_create_metaboxes');
  add_action('admin_enqueue_scripts', 'elt_admin_resources');
}

function logos_admin_init(){
  include('logos-options.php');

  add_action('add_meta_boxes_logos', 'logos_create_metaboxes');
  add_action('admin_enqueue_scripts', 'elt_admin_resources');
}
