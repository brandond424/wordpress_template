"use strict";

jQuery(document).ready(function() {

    jQuery(".nolink").click(function(e) {
        e.preventDefault();
    });

    jQuery('body').css("opacity", "1");

    jQuery(".modal .modal-close").click(function(e) {
        modalClose();
    });

    jQuery(".hamburger").click(function() {
        jQuery(this).toggleClass('open');
        jQuery("body").toggleClass('fixed');
        jQuery(".mobile-menu .menu-main-menu-container").toggleClass('show');
    });

    jQuery("#menu-main-menu-1 .menu-item-has-children").click(function(e) {
        if(!jQuery(this).hasClass('open')) {
            e.preventDefault();
            jQuery(".sub-menu").removeClass('open');
            jQuery("#menu-mobile-menu .menu-item-has-children").removeClass('open');
            jQuery(this).find(".sub-menu").toggleClass('open');
            jQuery(this).toggleClass('open');
        }
    });

    // jQuery("").click(function(e) {
    //     e.preventDefault();
    //     showModal();
    // });

    // jQuery(".home-banners").slick({
    //     dots: false,
    //     autoplay: false,
    //     autoplaySpeed: 3000,
    //     speed:1500,
    //     slide:'.banner',
    // });

    // hiConfig1 = {
    //     sensitivity: 3,
    //     interval: 0,
    //     timeout: 200,
    //     over: function() {
    //     },
    //     out: function() {
    //     }
    // }
    // jQuery("").hoverIntent(hiConfig1);

});


function showModal(modalID) {
    jQuery(".modal#" + modalID).show();
}

function modalClose() {
    jQuery(".modal").hide();
}





