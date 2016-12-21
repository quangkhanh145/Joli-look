window.matchMedia = window.matchMedia || (function( doc, undefined ){
    "use strict";
    var bool;
    var docElem = doc.documentElement;
    var refNode = docElem.firstElementChild || docElem.firstChild;
    // fakeBody required for <FF4 when executed in <head>
    var fakeBody = doc.createElement( "body" );
    var div = doc.createElement( "div" );
    div.id = "mq-test-1";
    div.style.cssText = "position:absolute;top:-100em";
    fakeBody.style.background = "none";
    fakeBody.appendChild(div);
    return function(q){
        div.innerHTML = "&shy;<style media=\"" + q + "\"> #mq-test-1 { width: 42px; }</style>";
        docElem.insertBefore( fakeBody, refNode );
        bool = div.offsetWidth === 42;
        docElem.removeChild( fakeBody );
        return {
            matches: bool,
            media: q
        };
    };
}(document));
var is_mobile_width = function(){
    if (window.matchMedia("(max-width : 1024px)").matches){
        return true;
    }
    return false;
}
$(function (){
    'use strict';
    /*
    Important: we use the style attribute because using '.css()'
    would change the way the stylesheet works
    */
    var adapt_width = function(){
        if ( !is_mobile_width() ){
            $('.slideout').attr('style', '');
            $('body').css('padding-top','');
        }
        else{
            $('.slideout').attr('style', 'top: '+ $('.nav-header').outerHeight() +'px');
            $('body').css('padding-top', $('.header-holder').outerHeight() +'px');
        }
       $('#catalog-nav').find('.selected').removeClass('selected').end().find('#catalog-menu').removeClass('show').addClass('hide');
       if(b_is_mobile != is_mobile_width()){
            $('#catalog-nav a[data-gridtype]').eq(0).trigger('click');
       }
    };
    var sticky_header = function(){
        var scroll_position = $(window).scrollTop();
        if (scroll_position < 50){
            $('header').removeClass('sticky');
        }
        else{
            $('header').addClass('sticky');
        }
    };
    $.fn.openMenu = function(){
        var $current, $root, $parents, $menuheader, backurl;
        $current = $(this);
        $root = $current.parents('.menu-holder');
        $parents = $current.parents('.slideout');
        $menuheader = $root.find('.nav-header');
        // hide all open menus
        $('.open').each(function(){
            if($(this).is($current) || $(this).is($root) || $(this).is($parents))
                return;
            $(this).removeClass('open');
        });
        $('#search .js-close').trigger('click');
        /* Show menu */
        $('html').addClass('nooverflow');
        $root.addClass('open').find('.nav-header').addClass('open'); // open nav header
        $current.addClass('open').parents('.slideout').addClass('open'); // open current menu and all its parents
        if ( is_mobile_width() ) {

            /* Display back button (or not) */
            if( $parents.length ) {
                backurl = '#'+$($parents[0]).attr('id');
                $menuheader.find('.back-icon').css('display','block').attr('href',backurl);
            } else {
                $menuheader.find('.back-icon').css('display','none').attr('href', '#');
            };

            // adjust position
            var pos_h = $menuheader.outerHeight();
            $current.css('top', pos_h);

            // set menu title
            $menuheader.find('.menu-title').text($current.data('menutitle'));
        }
    };
    $( window ).resize(function() {
        $("#main-nav").removeClass("open");
        $("#slideout-header").removeClass("open");
    });
    $('header .back-icon').hide();
    $('.submenu').addClass('hide');
    // open menu
    $('.js-slide').on('click', function(e){
        $($(this).attr('href')).openMenu();
        if($(this).attr('href') != '#subscribe') e.preventDefault();
    });
    // mobile open menu
    $('.mobile-only.js-slide, .mobile-only .js-slide').on('click', function(e){
        var $help = $("#help-li");
        var $tryon = $("#tryon-li");
        var $men = $("#men-li");
        var $women = $("#women-li");
        var $collab = $("#collab-li");
        $help.parent().prepend($help);
        $tryon.parent().prepend($tryon);
        $collab.parent().prepend($collab);
        $men.parent().prepend($men);
        $women.parent().prepend($women);
        if ($(this).hasClass('bag-icon')) {
            $('.newsletter-mobile-only').css('display', 'none');
            $('.need-help-mobile').removeClass('hide');
        }
    });
    // open submenu
    $('.js-submenu').on('click', function(e){
        var target, is_root, $current, $root, $parents, $menuheader, backurl;
        target = $(this).attr('href');
        $current = $(target);
        $parents = $current.parents('.submenu');
        if (! $parents.length ) {
            $parents = $current;
            $root = $current;
            is_root = true;
        } else {
            $root = $($parents[$parents.length -1]);
            is_root = false;
        }
        $menuheader = $root.find('.submenu-header');
        // end of variables declaration, starting logic
        $root.find('.hide').removeClass('hide').addClass('show');
        // MOBILE MENU
        if ( is_mobile_width() ){
            $root.find('.submenu, li').removeClass('show').addClass('hide'); // hide all submenus
            $(target+ ', ' +target+ ' li').removeClass('hide').addClass('show'); // show the right one
            $current.parents('.submenu, .submenu li').removeClass('hide').addClass('show'); // and show its ancestors
            $root.find('ul a').removeClass('selected hide').addClass('show'); // unhide all links
            if (! is_root ) {
                // hide path
                $current.closest('.submenu').prev('a').removeClass('show').addClass('hide');
                $current.parents('.submenu').prev('a').removeClass('show').addClass('hide');
                // setup back link and menu title
                backurl = '#'+$($parents[0]).attr('id');
                $menuheader.show().find('.menu-title').text($current.data('menutitle')).end().find('.back-icon').attr('href', backurl);
            }
            else{
                $('.submenu-header').hide();
            }
        } else{
            $root.find('.submenu').removeClass('show').addClass('hide'); // hide all submenus

            $current.removeClass('hide').addClass('show'); // show the right one
            // and show its ancestors
            $current.parents('.submenu')
            .removeClass('hide').addClass('show')
            .find('li, a')
            .removeClass('hide').addClass('show');
        }
        e.preventDefault();
    });
    $('#catalog-nav .nav-filters, #catalog-menu, .view-as').on('click', 'a', function(e){
        // layout change
        if( $(this).data('gridtype') ){
            $($(this).attr('href')).removeClass(function (index, css){
                return (css.match (/(^|\s)grid-\S+/g) || []).join(' ');
            }).addClass($(this).data('gridtype'));
            $(this).siblings('.grayed-out').removeClass('selected').end().addClass('selected');
            window.products.initListingImgs();
        } else if( $(this).is('.more-icon.selected') || ! $(this).is('.js-submenu') ) {
            $('#catalog-menu, #catalog-menu-desktop').removeClass('show').addClass('hide');
            $('#catalog-nav .nav-filters, #catalog-menu').find('a:not(.grayed-out)').removeClass('selected');
        // open menu otherwise
        } else {
            $(this).parents('ul').find('a').removeClass('selected');
            $(this).addClass('selected');
        }
        e.preventDefault();
    });
    // open element
    $('.toggle-close').hide();
    $('body').on('click', '.js-toggle', function(e) {
        var $target = $($(this).attr('href'));
        $target.slideToggle();
        $(this).toggleClass('is-close');
        e.preventDefault();
    });
    // open element
    $('body').on('click', '.js-open', function(e)
        {
            var $target = $($(this).attr('href'));
            $target.show();
            $target.on('click', '.js-close', function(e)
                {
                    $target.hide();
                    e.preventDefault();
                });
            e.preventDefault();
        });
    $('.menu-holder').on('click', '.js-close', function(e)
        {
            $('.open').removeClass('open');
            $('html').removeClass('nooverflow');
            e.preventDefault();
        });
    // dropdowns
    $('.dropdown').on('click', '.select-icon', function(e){
        var shown = ($(this).next('ul').css('display') == 'block');
        $('.dropdown ul').hide();
        if(shown) $(this).next('ul').hide();
        else $(this).next('ul').show();
        e.preventDefault();
    });
    $('#search-kwd').on('focus', function(e) {
        $(this).data('old', $(this).attr('placeholder')).attr('placeholder','');
        $('#search-suggest').css('display','block');

        e.preventDefault();
    });
    $('#search-kwd').on('blur', function(e) {
        $('#search-suggest').css('display','none');
        $(this).val('').attr('placeholder',$(this).data('old'));

        e.preventDefault();
    });
    $('#search-kwd').keypress(function() {
      $('#search-suggest').css('display','none');
    });
    //set on focus
    $("a[href='#search, #search-field']").on('click', function(){
        setTimeout(function(){
            $("#search-kwd").focus();
        },0);
    });
    $('.sc-link').click(function(){
        window.ODY.push(['openModal', 'Main']);
    });
    $('.cute-checkbox').on('click', function(e) {
      var $el = $(this);
      var $input = $el.siblings('input[type="checkbox"]');

      $el.toggleClass('checked');
      ($el.hasClass('checked')) ? $input.attr('checked','checked') : $input.removeAttr('checked');

      e.preventDefault();
  });
    $('.selectbox select').customSelect();
    adapt_width();
    var b_is_mobile = is_mobile_width();
    // on resize, reposition menu if needed
    $(window).on('resize', adapt_width);
    $(window).on('scroll', sticky_header);
})