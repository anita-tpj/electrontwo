
/* Uploading custom image to category and references tag pages*/
   function ct_media_upload(button_class){
     var _custom_media = true,
     _orig_send_attachment = wp.media.editor.send.attachment;

     $('body').on('click', button_class, function(e) {
       var button_id = '#'+$(this).attr('id');
       var send_attachment_bkp = wp.media.editor.send.attachment;
       var button = $(button_id);
       _custom_media = true;

       wp.media.editor.send.attachment = function(props, attachment){
         if ( _custom_media ) {
           $('#featured-image-id').val(attachment.id);
           $('#featured-image-preview').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
           $('#featured-image-preview .custom_media_image').attr('src',attachment.url).css('display','block');
         } else {
           return _orig_send_attachment.apply( button_id, [props, attachment] );
         }
        }
        wp.media.editor.open(button);
        return false;
      });
  }// ct_media_upload func

  ct_media_upload('.elt_tax_media_button.button');

   $('body').on('click','.elt_tax_media_remove',function(){
     $('#featured-image-id').val('');
     $('#featured-image-preview').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     $('input#elt_tax_media_remove').html('');
   });//$('body').on-click func

   // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
   $(document).ajaxComplete(function(event, xhr, settings) {
     var queryStringArr = settings.data.split('&');
     if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
       var xml = xhr.responseXML;
       $response = $(xml).find('term_id').text();
       if($response!=""){
         // Clear the thumb image
         $('#featured-image-preview').html('');
         $('input#elt_tax_media_remove').html('');
       }
     }
   });// $(document).ajaxComplete func
