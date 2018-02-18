<?php

//Metaboxes Option
function elt_contact_informations_mb(){
  global $post; // Get the current post data
  $contact_data = get_post_meta( $post->ID, 'contact_data', true ); // Get the saved values

  if(empty($contact_data)){//setup initial value if there is no data value yet
    $contact_data = array();
    $contact_data[] = array(
      'company'     => '',
      'location'    => '',
      'address'     => '',
      'phone'       => '',
      'email'       => '',
      'longitude'   => '',
      'latitude'    => ''
    );
  }

  wp_nonce_field( 'contact_data_form_metabox_nonce', 'contact_data_form_metabox_process' );?>
  <div>
    <input type="button" class="button repeatable-add" value="<?php _e('Add New Location', 'electrontwo'); ?>" />
  </div>
  <?php if(count($contact_data) <= 1):?>
    <p class= "_cinone-hide"><?php e_('No location information yet.', 'electrontwo'); ?></p>
  <?php endif;?>

  <div id="repeatable-fieldset">
    <?php
    $i = 0;
    foreach($contact_data as $location):?>
      <!--Show metabox's metafields with initial or saved value-->

      <fieldset class="location-custom-metabox <?php if($i == 0):?>empty-fieldset screen-reader-text<?php endif;?>">
      <hr />
      <legend class="location-number">
        <h3><?php _e('Location for: ', 'electrontwo')?></h3>
      </legend>


      <div class ="form-item">
        <label for="_cilocation[<?php echo $i; ?>][company]"><?php _e( 'Company', 'electrontwo' );?></label>
        <input
          class ="form-item-input"
          type="text"
          name="_cilocation[<?php echo $i; ?>][company]"
          id="_cilocation[<?php echo $i; ?>][company]"
          value="<?php echo esc_attr( $location['company'] ); ?>"
        >
       </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][location]"><?php _e( 'Location', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="text"
            name="_cilocation[<?php echo $i; ?>][location]"
            id="_cilocation[<?php echo $i; ?>][location]"
            value="<?php echo esc_attr( $location['location'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][address]"><?php _e( 'Address', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="text"
            name="_cilocation[<?php echo $i; ?>][address]"
            id="_cilocation[<?php echo $i; ?>][address]"
            value="<?php echo esc_attr( $location['address'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][phone]"><?php _e( 'Phone', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="tel"
            pattern="^[0-9\-\+\s\(\)]*$"
            title="A phone number should only contain numbers&#10;and following special characters: +, -, ),( ""
            name="_cilocation[<?php echo $i; ?>][phone]"
            id="_cilocation[<?php echo $i; ?>][phone]"
            value="<?php echo esc_attr( $location['phone'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][email]"><?php _e( 'Email', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="email"
            name="_cilocation[<?php echo $i; ?>][email]"
            id="_cilocation[<?php echo $i; ?>][email]"
            value="<?php echo esc_attr( $location['email'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][latitude]"><?php _e( 'Latitude', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="number"
            step="any"
            min="-90"
            max="90"
            title="Latitude must be between -85 and 85 degrees inclusive"
            name="_cilocation[<?php echo $i; ?>][latitude]"
            id="_cilocation[<?php echo $i; ?>][latitude]"
            value="<?php echo esc_attr( $location['latitude'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <label for="_cilocation[<?php echo $i; ?>][longitude]"><?php _e( 'Longitude', 'electrontwo' );?></label>
          <input
            class ="form-item-input"
            type="number"
            step="any"
            min="-180"
            max="180"
            title="Latitude must be between -180 and 180 degrees inclusive"
            name="_cilocation[<?php echo $i; ?>][longitude]"
            id="_cilocation[<?php echo $i; ?>][longitude]"
            value="<?php echo esc_attr( $location['longitude'] ); ?>"
          >
        </div>

        <div class ="form-item">
          <input type="button" class="button repeatable-remove" value="<?php _e('Remove Location', 'electrontwo'); ?>" />
        </div>

      </fieldset>


  <?php $i++; endforeach;?>
 </div> <!--- #repeatable-fieldset -->

  <?php

}//elt_contact_informations_mb func


function elt_contact_informations_save_mb( $post_id, $post, $update ){ //Update and Save data

	// Verify that our security field exists. If not, bail.
	if(!isset($_POST['contact_data_form_metabox_process'])) return;

	// Verify data came from edit/dashboard screen
	if(!wp_verify_nonce($_POST['contact_data_form_metabox_process'], 'contact_data_form_metabox_nonce')){
		return $post->ID;
	}
  //If this is an autosave, our form has not been submitted, so we don't want to do anything
  if (defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE){
    return $post_id;
  }
	// Verify user has permission to edit post
	if (!current_user_can('edit_post', $post->ID)){
		return $post->ID;
	}

  if(!$update){
      return;
  }

  $contact_data = array();

  if (isset($_POST['_cilocation']) && is_array($_POST['_cilocation'])) :

    foreach($_POST['_cilocation'] as $i => $location): // Save our submissions to the database

    $contact_data[] = array(
          'company' => isset( $location['company'] ) ? sanitize_text_field( $location['company'] ) : null,
          'location' => isset( $location['location'] ) ? sanitize_text_field( $location['location'] ) : null,
          'address' => isset( $location['address'] ) ? sanitize_text_field( $location['address'] ) : null,
          'phone' => isset( $location['phone'] ) ? sanitize_text_field( $location['phone'] ) : null,
          'email' => isset( $location['email'] ) ? sanitize_text_field( $location['email'] ) : null,
          'longitude' => isset( $location['longitude'] ) ? sanitize_text_field( $location['longitude'] ) : null,
          'latitude' => isset( $location['latitude'] ) ? sanitize_text_field( $location['latitude'] ) : null,
          );

    endforeach;

  endif;


  foreach($contact_data as $key=>$new_fieldset) :

    if($key>0) :
      foreach($new_fieldset as $field) :
        $values = array_filter($new_fieldset);
      endforeach;

      if(empty($values)):
        unset($contact_data[$key]);
      endif;

    endif;

  endforeach;

  if (isset( $contact_data)){
    update_post_meta($post_id, 'contact_data', $contact_data);
  }else{
    delete_post_meta($post_id, 'contact_data' );
  }

}//elt_contact_informations_save_mb func

add_action( 'save_post', 'elt_contact_informations_save_mb', 1, 3 );
