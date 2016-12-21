window.lazy_img_loader = {

    init : function() {
        //console.log('starting lazy loader');
        window.setTimeout(window.lazy_img_loader.processImageLazyLoad, 300);
    },

    processImageLazyLoad : function() {
        window.lazy_img_loader.checkImagesToLoad();
        window.lazy_img_loader.checkListingToSlick();
        window.lazy_img_loader.registerTimeoutIfNeeded();
    },

    checkListingToSlick : function() {
        var slick_count = 0;
        $('#catalog-listing .grid-item').not('.bl-slicked').each(function(){
            if(window.lazy_img_loader.isElementAboveFold(this)){
                slick_count++;
                window.lazy_img_loader.performSlick(this);
            }
        });

        if(slick_count < 2) {
            $('#catalog-listing .grid-item').not('.bl-slicked').each(function(){
                slick_count++;
                window.lazy_img_loader.performSlick(this);
                if(slick_count == 2){
                    return false;
                }
            });
        }
    },

    performSlick : function(element){
        var images = $(element).find('.main-img');
        if(images.length > 0) {
            window.products.doTheSlick(images);
            $(element).addClass('bl-slicked');
        }
    },

    isElementAboveFold: function(element){
        var aboveFold = false;
        if($(window).scrollTop() + $(window).height() > $(element).offset().top ) {
            aboveFold = true;
        }
        return aboveFold;
    },

    checkImagesToLoad : function() {
        $('#catalog-listing div.img').each(function() {
            // Check if current div is visible
            if( $(window).scrollTop() + $(window).height() > $(this).offset().top ) {
                // element is in view
                // Element is visible. Download the picture
                $(this).find('img.unloaded').each(function(){
                    var image_url = $(this).attr('data-src');
                    //console.log('Loading ' + image_url);
                    var img_elem = $(this);
                    var img_obj = new Image();
                    img_obj.onload = function() {
                        img_elem.removeClass('unloaded');
                        img_elem.attr('src', image_url);
                    };
                    img_obj.src = image_url;
                });
            }

        });
    },

    registerTimeoutIfNeeded : function() {
       window.setTimeout(window.lazy_img_loader.processImageLazyLoad, 300);
    },

};

$(document).ready(function() {
    window.lazy_img_loader.init();
});
