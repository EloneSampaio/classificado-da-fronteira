//RFRESSH BACKDROP
$(document).ready(function () {
    $('.refresh').on('click',function(){
        $('body').addClass('refresh-page');
    });
});
//JQUERY UI TOOLTIP
$.widget.bridge('uibutton', $.ui.button);
$.widget.bridge('uitooltip', $.ui.tooltip);
$(document).ready(function () {
    $("#footer img").uitooltip({
        track:true
    });
});
//DROPDOWN
$(document).ready(function () {
     // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
    $('.dropdown').on('show.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // ADD SLIDEUP ANIMATION TO DROPDOWN //
    $('.dropdown').on('hide.bs.dropdown', function(e){
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    //Hide elements on click event
    $('.ico-close').click(function(){
        $(this).parent().remove().slideUp();
    });
    
    //Make sure when select loads after input, span wrap is correctly filled
    $('.form-select').on('change','select',function(){
      $(this).parent().find('span').text($(this).find("option:selected" ).text());
    });
    $('.amount').on('change','select',function(){
      $(this).parent().find('span').text($(this).find("option:selected" ).text());
    });
    //Accordions
    $(function () { 
       var $active = $('#accordion .panel-collapse').prev();
        $active.find('a').prepend('<i class="fa fa-plus"></i>');
        $('#accordion .panel-collapse').on('shown.bs.collapse', function (e) {
            $active.find('.fa').toggleClass('fa-plus fa-minus');
            $(e.target).find('.fa').toggleClass('fa-plus fa-minus');
        })
        $('#accordion .panel-collapse').on('hidden.bs.collapse', function (e) {
            $active.find('.fa').toggleClass('fa-minus fa-plus');
            $(e.target).find('.fa').toggleClass('fa-minus fa-plus');
        })
    });
    // if you want to use the 'fire' or 'disable' fn,
    // you need to save OuiBounce to an object
    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
        aggressive: true,
        timer: 0,
        callback: function() { console.log('ouibounce fired!'); }
    });

    $('body').on('click', function() {
        $('#ouibounce-modal').hide();
    });

    $('#ouibounce-modal .close').on('click', function() {
        $('#ouibounce-modal').hide();
    });

    $('#ouibounce-modal .modal').on('click', function(e) {
        e.stopPropagation();
    });
            
})
//on page pop up
$(window).load(function(){
   $('#on-Load').modal('show');
});
//show info bar
$(window).load(function(){
    $('.info-bar-top').addClass('slide-in');
    $('.info-bar-bottom').addClass('slide-in');
});
//hide info bar
$('.info-bar-top.info-bar .hide-bar').click(function(){
    $('.info-bar-top').removeClass('slide-in');
});
$('.info-bar-bottom.info-bar .hide-bar').click(function(){
    $('.info-bar-bottom').removeClass('slide-in');
});
//SHOW WHATSAPP SHARE
$(function(){
    if($(document).width() > 768){
        $('.whatsapp-share').remove();
    }
});
//PREMIUM CAROUSEL
var owl_1 = $("#premium_carousel");
    owl_1.owlCarousel({
        stopOnHover: true,
        pagination: false,
        autoPlay: true,
        navigation : true,
        navigationText: ["",""],
        items: 3, //10 items above 1000px browser width
        itemsDesktop: [1000, 2], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 501px
        itemsTablet: [500, 1], //2 items between 600 and 0
        itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
    });
    var owl_2 = $("#premium_search_carousel");
    owl_2.owlCarousel({
        stopOnHover: true,
        pagination: false,
        autoPlay: true,
        navigation : true,
        navigationText: ["",""],
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1000, 1], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 1], // betweem 900px and 501px
        itemsTablet: [500, 1], //2 items between 600 and 0
        itemsMobile: [0, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

    // Custom Navigation Events
    $(".next").click(function() {
        owl.trigger('owl.next');
    })
    $(".prev").click(function() {
        owl.trigger('owl.prev');
    })

$(document).ready(function(ev) {
    //Related
    var owl_3 = $("#carousel-search_related");
    owl_3.owlCarousel({
        stopOnHover: true,
        pagination: false,
        navigation : true,
        navigationText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
        autoPlay: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 3], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 2], // betweem 900px and 501px
        itemsTablet: [400, 1], //2 items between 600 and 0
        itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
    });

    // Custom Navigation Events
    $(".next").click(function() {
        owl.trigger('owl.next');
    })
    $(".prev").click(function() {
        owl.trigger('owl.prev');
    })
});
//LOCATION
$('#setLocation input').on('click', function(event) {
   event.stopPropagation();
   var menu = $('#setLocation ul.location-menu');
   if(menu.hasClass('open')){
      menu.removeClass('open').first().stop(true, true).slideUp();
   }else{
     menu.addClass('open').first().stop(true, true).slideDown();
   }
});
$('#setLocation li').on('click', function(event) {
   event.stopPropagation();
});
$('.location-list li').click(function(){
    $('#setLocation').removeClass('open');
});
$('.location-list li').click(function() {
    var text = $(this).text();
    $('input#u_Location').val(text);
});
(function($){
    $(document).ready(function(){

    $('#setLocation li.active').addClass('open').children('ul').show();
        $('#setLocation li.has-sub>a').on('click', function(){
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp();
            }
            else {
                element.addClass('open');
                element.children('ul').slideDown();
                element.siblings('li').children('ul').slideUp();
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp();
            }
            $('#setLocation li.active').removeClass('active');
            $(this).parent('li.has-sub').addClass('active');
        });

    });
})(jQuery);
//PANEL DROPDOWN
$('.DropdwonToggle').on('click', function(event) {
   var menu =$(this).parent().find('ul.panel-menu');
   if(menu.hasClass('open')){
      menu.removeClass('open').slideUp('slow');
   }else{
     menu.addClass('open').slideDown('slow');
   }
});
//LISTED SECTION ITEMS
$(document).ready(function() {
    $('#list').click(function(event) {
        event.preventDefault();
        if ($('#list .glyphicon').hasClass('glyphicon-th-list')) {
            $('#list .glyphicon').removeClass('glyphicon-th-list');
            $('#list .glyphicon').addClass('glyphicon-th');
            $('#list span').text("Grid");
            $('#products .listed-item-wrap').addClass('media');
        } else {
            $('#list .glyphicon').addClass('glyphicon-th-list');
            $('#list .glyphicon').removeClass('glyphicon-th');
            $('#list span').text("List");
            $('#products .listed-item-wrap').removeClass('media');
        };
    });

});
//MAGNIFIC POPUP GALLERY
$('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tClose: 'Fechar (Esc)',
    tLoading: '',
    gallery: {
        enabled: true,
        tPrev: 'Anterior (Seta esquerda)',
        tNext: 'Próximo (Seta direita',
        tCounter: '%curr% de %total%'
    },
    gallery: {
        enabled: true, // set to true to enable gallery
        preload: [0, 2], // read about this option in next Lazy-loading section

        navigateByImgClick: true,

        arrowMarkup: '<i title="%title%" type="button" class="mfp-nav fa fa-angle-%dir%" style="color:#eee; font-size:40px; cursor:pointer; padding:10px;"></i>', // markup of an arrow button

        tPrev: 'Previous', // title for left button
        tNext: 'Next', // title for right button
    },
    image: {
        tError: 'A imagem não pode ser carregada.'
    },
    mainClass: 'mfp-zoom-in',
    removalDelay: 300, //delay removal by X to allow out-animation
    callbacks: {
        beforeOpen: function() {
            $('.gallery a').each(function() {
                $(this).attr('title', $(this).find('img').attr('alt'));
            });
        },
        open: function() {
            //overwrite default prev + next function. Add timeout for css3 crossfade animation
            $.magnificPopup.instance.next = function() {
                var self = this;
                self.wrap.removeClass('mfp-image-loaded');
                setTimeout(function() {
                    $.magnificPopup.proto.next.call(self);
                }, 120);
            }
            $.magnificPopup.instance.prev = function() {
                var self = this;
                self.wrap.removeClass('mfp-image-loaded');
                setTimeout(function() {
                    $.magnificPopup.proto.prev.call(self);
                }, 120);
            }
        },
        imageLoadComplete: function() {
            var self = this;
            setTimeout(function() {
                self.wrap.addClass('mfp-image-loaded');
            }, 16);
        }
    }
});
frclassifieds.photoUploader = function(selector,options) {
    defaults = {'max':4};
    options = $.extend(defaults, options);
    frclassifieds.photoUploaderActions($(selector),options);
}
frclassifieds.addPhotoUploader = function(max) {
    if(max < $('input[name="'+$(this).attr('name')+'"]').length+$('.photos_div').length){
        var $image = $('<input type="file" name="photos[]">');
            frclassifieds.photoUploaderActions(image);
        $('#post-photos').append($image);
    }
}
frclassifieds.removePhotoUploader = function() {
    //removeAndAdd
},
frclassifieds.photoUploaderActions = function($element,options) {
    $element.on('change',function(){
        var input  = $(this)[0];
        $(this).next('img').remove();
        $image = $('<img />');
        $image.insertAfter($element);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $image.attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $image.remove();
        }
    });
}

function createPlaceHolder($element){
  var $wrapper = $('<div class="has-placeholder '+$element.attr('class')+'" />');
  $element.wrap($wrapper);
  var $label = $('<label/>');
      $label.append($element.attr('placeholder').replace(/^\s*/gm, ''));
      $element.removeAttr('placeholder');

  $element.before($label);
  $element.bind('remove', function() {
        $wrapper.remove();
    });
}

function selectUi(thatSelect){
    var uiSelect = $('<a href="#" class="select-box-trigger"></a>');
    var uiSelectIcon = $('<span class="select-box-icon">0</span>');
    var uiSelected = $('<span class="select-box-label">'+thatSelect.find("option:selected").text().replace(/^\s*/gm, '')+'</span>');
    var uiWrap = $('<div class="select-box '+thatSelect.attr('class')+'" />');

    thatSelect.css('filter', 'alpha(opacity=40)').css('opacity', '0');
    thatSelect.wrap(uiWrap);


    uiSelect.append(uiSelected).append(uiSelectIcon);
    thatSelect.parent().append(uiSelect);
    uiSelect.click(function(){
        return false;
    });
    thatSelect.on('focus',function(){
        thatSelect.parent().addClass('select-box-focus');
    });
    thatSelect.on('blur',function(){
        thatSelect.parent().removeClass('select-box-focus');
    });
    thatSelect.change(function(){
        str = thatSelect.find('option:selected').text().replace(/^\s*/gm, '');
        uiSelected.text(str);
    });
    thatSelect.bind('removed', function() {
        thatSelect.parent().remove();
    });
}
/*$(document).ready(function(){
  jQuery(function() {
         setHeight();

        jQuery(window).resize(function() {
            setHeight();
        });
    });

    function setHeight() {
        windowHeight = jQuery(window).innerHeight();
        jQuery('.profile-box').css('min-height', windowHeight);
    };
});*/
//SOSCIAL MEDIA SHARING
$(document).ready(function() {
    $('.social-share li').click(function(){
        //getting the url
        $(location).attr('href');

        //descritption 
        var text = $.trim($("meta[name=description]").attr("content") || $("title").text());
        //store url in a variable
        var url = window.location.href;
        //var url = 'http://www.joshuawinn.com/facebooks-sharer-php-longer-deprecated-2014/';
        var clickedbtn = $(this).find('a');
        if(clickedbtn.is($(this).find('a.facebook_share'))){
            window.open('https://www.facebook.com/sharer/sharer.php?u='+url);
        }else if(clickedbtn.is($(this).find('a.twitter_share'))){
             window.open("https://twitter.com/share?url="+url);
        }else if(clickedbtn.is($(this).find('a.google_share'))){
             window.open("https://plus.google.com/share?url="+url);
        }else if(clickedbtn.is($(this).find('a.linkedin_share'))){
             window.open("https://www.linkedin.com/shareArticle?mini=true&url="+url);
        }else if(clickedbtn.is($(this).find('a.pinterest_share'))){
             window.open("https://pinterest.com/pin/create/button/?url="+url+"&media="+ $("img.group").attr('src')+"&description="+$("p.group").text());
        }else if(clickedbtn.is($(this).find('a.tumblr_share'))){
             window.open("https://www.tumblr.com/share/photo?source="+ $("img.group").attr('src'));
        }else if(clickedbtn.is($(this).find('a.stumbleupon_share'))){
             window.open("http://www.stumbleupon.com/submit?url="+url);
        }else if(clickedbtn.is($(this).find('a.email_share'))){
             window.location = "mailto:?subject=nice time&body="+url;
        }
    });
});
//PROFILE NAV
//$(document).ready(function() {
    //$('.profile-box ul li').click(function(){
      // $('.profile-box ul li').removeClass('active');
       //$(this).addClass('active'); 
    //});
//});
//user avatar preview
$(document).on('change', '.uploadPhoto :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);

});
$(document).ready( function() {
    $('.uploadPhoto :file').on('fileselect', function(event, numFiles, label) {
        
        if (typeof (FileReader) != "undefined") {

            var image_holder = $('.custom-input-file');

            var reader = new FileReader();
            reader.onload = function (e) {

                image_holder.attr("style", "background: #eee url('" + e.target.result +"') no-repeat scroll 50% 50%;");

                /*$("<img />", {
                    "style": "background: #eee url('" + e.target.result +"') no-repeat scroll 50% 50%;",
                    "class": "thumb-image"
                }).appendTo(image_holder);*/

            }
            
            reader.readAsDataURL($(this)[0].files[0]);
        }
        
    });
  
});




