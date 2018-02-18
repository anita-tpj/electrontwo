
/* Uploading custom image to category and references tag pages*/

  jQuery(document).ready(function($){

  var mediaUploader;

  $('#elt_tax_media_button').click(function(e) {
    e.preventDefault();
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Featured Imge',
      button: {
      text: 'Set featured image'
    }, multiple: false });

    // When a file is selected, grab the URL and set it as the text field's value
    mediaUploader.on('select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#featured-image-id').val(attachment.id);
      $('#featured-image-preview').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
      $('#featured-image-preview .custom_media_image').attr('src',attachment.url).css('display','block');

    });
    // Open the uploader dialog
    mediaUploader.open();
  });

  // DELETE IMAGE LINK
  $('#elt_tax_media_remove').on( 'click', function(e){

    e.preventDefault();
    $('#featured-image-id').val('');
    $('#featured-image-preview').html('');
    $('input#elt_tax_media_remove').html('');

  });
});//jQuery(document).ready
