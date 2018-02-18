(function($){

  $(document).ready( function($) {
    init_repetableLocationsMetaBox();
  });//$(document).ready func

  /* Adding/Removing metaboxes/metafields for Google Map multiple location API */
  function init_repetableLocationsMetaBox(){

      $( '.repeatable-add').on('click', function() {
          $('p._cinone-hide').hide();
          var fieldCount = $('#repeatable-fieldset').find('.location-custom-metabox').not(':last-child').size();
          var newFieldCount = fieldCount + 1;
          var field = $( '.empty-fieldset.screen-reader-text.location-custom-metabox' ).clone(true);
          // Loop through all inputs
          field.find('input, label').each(function(){

              if ( !! $(this).attr('id') )
                  $(this).attr('id',  $(this).attr('id').replace('[0]', '[' + newFieldCount + ']') );  // Replace for

              if ( !! $(this).attr('name') )
                  $(this).attr('name',  $(this).attr('name').replace('[0]', '[' + newFieldCount + ']') );  // Replace for

              if ( !! $(this).attr('for') )
                  $(this).attr('for',  $(this).attr('for').replace('[0]', '[' + newFieldCount + ']') );  // Replace for

          });//end each loop

          field.removeClass( 'empty-fieldset screen-reader-text' );
          field.insertAfter( '.empty-fieldset.screen-reader-text.location-custom-metabox' );


          return false;
    });//end on-click function

    $(".repeatable-remove").on('click', function() {
               $(this).parent().parent().remove();
    });//end on-click function

  } //init_repetableFieldsForLocations func

  /*Live adjustment of the meta box visibility*/
    /*$('#page_template').change(function() {
        $('#elt_contact_informations_mb').toggle($(this).val() == 'contact.php');
    }).change();
    */

})(jQuery)// jQuery IIFE func
