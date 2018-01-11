//Hide and Show Tabs With Jquery
jQuery(document).ready(function() {
	jQuery('a.nav-tab').on('click', function(e){
      	//remove active class
         jQuery('.active').removeClass('active');
         //add active class
         jQuery(this).addClass('active').hasClass('active');
	});
    jQuery('.tabs a.nav-tab').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).slideDown().siblings().slideUp();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
        e.preventDefault();
    });
});
//FILE UPLOAD

$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);

});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        if (typeof (FileReader) != "undefined") {

            var image_holder = $(this).parents('.generate-preview').find(".image-preview");
            var db_image_holder = $(this).parents('.hide-preview').find(".image-preview") ;
            var hideImg = $(this).parents('.generate-preview').find("img.preview");
            var flashMessage = $(this).parents('.generate-preview').find(".flashmessage");
            var triggerHolder = $(this).parents('.generate-preview').find(".file-input span");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                }).appendTo(image_holder);

            }
            
            hideImg.hide();
            image_holder.show();
            db_image_holder.show();
            triggerHolder.text('Change');
            flashMessage.hide();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
        
    });
  
});

$(document).ready(function(){
  jQuery(function() {
         setHeight();

        jQuery(window).resize(function() {
            setHeight();
        });
    });

    function setHeight() {
        windowHeight = jQuery(window).innerHeight()-110;
        jQuery('.nav-tab-wrapper').css('min-height', windowHeight);
    };
    
});