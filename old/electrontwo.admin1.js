
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.elt_tax_media_button').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.id);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });

      $('#elt_tax_media_button-remove').on('click', function(e){
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        var answer = confirm('Are you sure you want to remove Featured Image?');
        if(answer){
          meta_image.val('');
          meta_image_preview.children('img').attr('src',meta_image.val);
        }
          return;
      }); //end of on click #remove-button func

      // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
$(document).ajaxComplete(function(event, xhr, settings) {
  var queryStringArr = settings.data.split('&');
  if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
    var xml = xhr.responseXML;
    $response = $(xml).find('term_id').text();
    if($response!=""){
      // Clear the thumb image
      $('#image-preview').html('');
    }
  }
});
    });
