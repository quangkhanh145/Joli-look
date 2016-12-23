var slickedOnce = null;
var slickedOnceRecentlyViewed = null;
var review_language_switched_once = false;
window.products = {
    init: function(){
        $(function(){
            $(".scroll").click(function(){
                $("html,body").animate({
                    scrollTop: $("#all-reviews").offset().top
                }, "500");
                return false;
            });
        });
        /*window.products.adjustSectionBlock();*/
        /*$('#product_details_block').on('click', '#addtocart', function(e)
            {
                window.products.doAddToCart();
            });*/
        // show
        $('#product_details_block').on('click', '#buyfrom', function(e) {
            e.preventDefault();
            $('#choose-lenses').removeClass('hide');
            if( $('#choose-lenses input[type="radio"]:checked').length ){
                $('#addtocart').show();
                $('#buyfrom').hide();
                var choose_lenses_option_selected = $('#choose-lenses input[type="radio"]:checked');
                if ($(choose_lenses_option_selected).val() == 'NORX'){
                    if (!$('.polarized-lenses').hasClass('stocked_plano_sun')) {
                        $('.polarized-lenses-active').remove();
                        $(choose_lenses_option_selected).closest('li').append("<div class='space-before text-left polarized-lenses-active'><p class='text-left'>"+ $('.polarized-lenses').html() +"</p></div>");
                    }
                }
            }
        });
        $('#product_details_block').on('click', '#choose-lenses .icon-remove', function(e) {
            $('#choose-lenses').addClass('hide');
            $('#addtocart').hide();
            $('#buyfrom').show();
        });
        $('#product_details_block').on('change', '#choose-lenses input[type="radio"]', function(){
            $('#addtocart').show();
            $('#buyfrom').hide();

            if ($('.polarized-lenses').length) {
                var rxvalue = $("input[name='rx_type']:checked").attr('value');
                if (rxvalue != 'NORX' || !$('.polarized-lenses').hasClass('stocked_plano_sun')) {
                    $('.polarized-lenses-active').remove();
                    $(this).closest('li').append("<div class='space-before text-left polarized-lenses-active' style='display:none;'><p class='text-left'>"+ $('.polarized-lenses').html() +"</p></div>");
                    $('.polarized-lenses-active').slideDown();
                } else {
                    $('.polarized-lenses-active').slideUp();
                }
            }
        });
        /*$('.swatches.nobullet li a').click(function() {
            var number = $(this).parent().index($(this).parent());
        });*/
        $('body').on('click', '.preventDef', function(event) {
            event.preventDefault();
        });
        /*$('#product_details_block').on('click', '.wl-link', function(e){
            window.products.onWishlistLinkClick();
        });*/
        /*$('#product_details_block').on('click', '#wait_signup', function(e) {
            var is_logged_in = $(this).attr('data-loggedin');
            if (is_logged_in == false) {
                $('p.out-of-stock-text').slideDown();
                $('#wait_signup').slideUp();
            } else if (is_logged_in == "false") {
                $('p.out-of-stock-text').slideDown();
                $('#wait_signup').slideUp();
            } else {
                var url = '/bl_ajax/waiting_list/' + BL_FAMILY_INFO.selectedProduct.id;
                if (BL_FAMILY_INFO.is_sunglasses == true) {
                    url += '/1';
                } else {
                    url += '/0';
                }
                $.getJSON(url, function(returnData) {
                    $('p.out-of-stock-text').slideDown();
                    $('#wait_signup').slideUp();
                });
            }
        });*/
        // catalog product images
        // Called in menu.js to set proper sizing
        // always called so no need to have it here
        window.products.initListingImgs();
        // product details images
        window.products.initImgs();
        /*$('.imageGenderClicked').click(function() {
            $(this).children('.chooseMyGender').css('display', 'block');
            $(this).parent().parent().parent().parent().parent().children('.infos').children('li').children('.displayGenderOptions').fadeIn(500);
        });*/
        var location = window.location.href;
        if(location.indexOf("accessories") == -1){
            window.products.ensureInitDoneRight();
            $(window).click(function(){
                if ($('.font-image').attr('aria-hidden') == 'false'){
                    $('.measurements-overlay').css('display', 'block');
                    var image = $('.font-image img');
                    window.products.initMeasurmentsOverlay(image);
                } else if($('.side-view-image').eq(1).attr('aria-hidden') == 'false'){
                     $('.measurements-overlay').css('display', 'block');
                     var image = $('.side-view-image img');
                     window.products.initMeasurmentsOverlaySide(image);
                }
                else{
                    $('.measurements-overlay').css('display', 'none');
                }
            });
            window.setInterval(function(){
                if ($('.font-image').attr('aria-hidden') == 'false'){
                    var image = $('.font-image img');
                    window.products.initMeasurmentsOverlay(image);
                } else if($('.side-view-image').eq(1).attr('aria-hidden') == 'false'){
                    var image = $('.side-view-image img');
                    window.products.initMeasurmentsOverlaySide(image);
                }
            }, 1000);
        } else {
            $('.measurements-overlay').css('display', 'none');
        }
        // manage prescription call block
        /*$("#prescription-callToAction").on('click', function(e) {
            if ($(".prescription-call-content").css("display", "none")) {
                $(".prescription-call-content").css("display", "block");
                $("#prescription-call-caller").css("display", "none");
            }
        });
        $("#prescription-call-content-title").on('click', function(e) {
            $(".prescription-call-content").css("display", "none");
            $("#prescription-call-caller").css("display", "block");
        });*/
        // manage mobile sections block
        $("#mobile_product_info_list li").each(function(index) {
            $(this).on('click', function(e) {
                if ($(this).context.children[1].className.indexOf("open") > -1) {
                    $($(this).context.children[1]).removeClass('open');
                    $($(this).context.children[1]).addClass('close');
                } else {
                    $($(this).context.children[1]).removeClass('close');
                    $($(this).context.children[1]).addClass('open');
                }
            });
        });
    },
    ensureInitDoneRight : function() {
        // measurements
        var image = $('.font-image img');
        if(image.length) {
            if(image[0].complete === false){
                window.setTimeout(function() {
                    window.products.ensureInitDoneRight();
                }, 100);
            }
            else {
                window.products.initMeasurmentsOverlay(image);
            }
        }
    },
    doTheSlick: function(listingElems){
        if($(listingElems).hasClass('slick-initialized')){
            $(listingElems).slick('refresh');
        } else{
            $(listingElems).on('init', function(){
                window.products.setupSlickDots(this);
            });
            $(listingElems).on('reInit', function(){
                window.products.setupSlickDots(this);
            });
            $(listingElems).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                adaptiveHeight: true
            });
        }
    },
    setupSlickDots: function(slickedElem){
        $(slickedElem).find('.slick-dots li button').click(function(){
            var itemPath = $(this).parent().parent().parent().children('div').children().children('.slick-active').children().attr('href'); //Pretty ugly, don't do this at home
        });
    },
    initListingImgs: function() {
        $('#catalog-listing .grid-item').each(function(){
            $(this).removeClass('bl-slicked');
        });
    },
    initImgs: function() {

        $('.product-img .img-holder').slick({
            prevArrow: '.product-img .icon-prev',
            nextArrow: '.product-img .icon-next',
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            asNavFor: '.product-img .thumbnails'
        });

        $('.product-img .thumbnails').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product-img .img-holder',
            dots: false,
            focusOnSelect: true,
            variableWidth: true
        });
    },
    clearArray: function(arr) {
        while (arr.length > 0) {
            arr.pop();
        }
    },
    initMeasurmentsOverlay: function(image) {
        var img_height = image.height();
        var img_width = image.width();

        $('.measurements-overlay').css('height', img_height);

        $('.overlay-bridgeWidth').css('display', 'block');
        $('.overlay-templeLength').css('display', 'none');
        $('.overlay-lensDepth').css('display', 'block');
        $('.overlay-lensDiameter').css('display', 'block');
        $('.overlay-frameWidth').css('display', 'block');

        $('.overlay-item').each(function() {
            var that = $(this),
                multiplier = 3.81,
                measurement = parseInt(that.find('span').html()),
                adjusted = measurement * multiplier,
                widthBelow = img_width / 3.96,
                widthSecondUp = img_width / 9.81,
                widthFirstUp = img_width / 1.39, //not true value
                heightVertical = img_height / 2.30;

            if (that.hasClass('horizontal')) {
                if (that.hasClass('below')) {
                    that.css({
                        'width': widthBelow + 'px',
                        'margin-left': '0',
                        'margin-left': '-' + (widthBelow / 3) + 'px'
                    });
                } else if (that.hasClass('first')) {
                    that.css({
                        'width': widthFirstUp + 'px',
                        'margin-top': '15%',
                        'margin-left': '-' + (widthFirstUp / 2) + 'px'
                    });
                } else {
                    that.css({
                        'width': widthSecondUp + 'px',
                        'margin-top': '15%',
                        'margin-left': '-' + (widthSecondUp / 2) + 'px'
                    });
                }
            } else if (that.hasClass('vertical')) {
                that.css({
                    'height': heightVertical + 'px',
                    'margin-top': '-' + (heightVertical / 4) + 'px'
                });
            }
        });
    },
    initMeasurmentsOverlaySide: function(image) {
        var img_height = image.height();
        var img_width = image.width();

        $('.measurements-overlay').css('height', img_height);

        $('.overlay-bridgeWidth').css('display', 'none');
        $('.overlay-templeLength').css('display', 'block');
        $('.overlay-lensDepth').css('display', 'none');
        $('.overlay-lensDiameter').css('display', 'none');
        $('.overlay-frameWidth').css('display', 'none');

        $('.overlay-item').each(function() {
            var that = $(this),
                multiplier = 3.81,
                measurement = parseInt(that.find('span').html()),
                adjusted = measurement * multiplier,
                widthSide = img_width / 1.4;

            if (that.hasClass('horizontal')) {
                if (that.hasClass('temple')) {
                    that.css({
                        'width': widthSide + 'px',
                        'margin-left': '-' + (img_width / 3) + 'px'
                    });
                }
            }
        });
    },
    /*doAddToCart: function() {
        var id = ;
        var lensOPT = 'VT';

        if ($("input[name='rx_type']:checked").length > 0) {

            // User has selected an option
            var rxOPT = $("input[name='rx_type']:checked").attr('value');
            var sunOPT = 'NA';
            if (rxOPT == "NORX") {
                sunOPT = 'POL';
            } else if (BL_FAMILY_INFO.is_sunglasses == true ) {
                sunOPT = 'TINT';
                if($("input[name='sun_type']:checked").length) {
                    sunOPT = $("input[name='sun_type']:checked").attr('value');
                }
            }

            window.cart.addToCart(id, lensOPT, rxOPT, sunOPT, genericLensTypeIdentifier);
        }

    },*/
};
$(document).ready(function(){
    window.products.init();
});
