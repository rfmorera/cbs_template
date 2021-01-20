// Adds a class 'js_on' to the <html> tag if JavaScript is enabled,

// also helps remove flickering...

document.documentElement.className += ' js_on ';

var $window = jQuery(window);

var $body = jQuery('body');

var $document =jQuery(document);

var imgselector = ".slogan_picture picture img, .squote picture img, .serviceInfo picture img";



var pictureImgs = jQuery(imgselector);

pictureImgs.on('load', function () {

    autoMargin(jQuery(this));

});



function modifyImgSelector() {

    var width = $window.width();

    var img = jQuery(".slogan_text picture img");

    img.attr("style","");

    if (width <= 767) {

        autoMargin(jQuery(".slogan_text picture img"));

    }

}



function autoMargin(img) {

    var parentCtnrWidth = img.parent().parent().width();

    var imgWith = img.width();

    var margin = (parentCtnrWidth - imgWith) / 2;

    img.css('margin-left', margin + "px");

    img.css('margin-right', margin + "px");

}



function marginAutoPictureContent() {

    jQuery.each(pictureImgs, function () {

        autoMargin(jQuery(this));

    });

}


jQuery(document).ready(function () {

    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.floating-social-icons > .inicio-social').fadeIn();
            
            } else {
            jQuery('.floating-social-icons > .inicio-social').fadeOut();
            
        }
    });

    (function(){
        var total = jQuery("#totalreviws").text();
        var average = 5.0;
        average = average.toString();

        if(average.charAt(average.length-1) == '0'){
            average = average.substring(0, average.length-2);
        }

        jQuery(".sr-value").prepend(average);
        jQuery(".sr-statistics").prepend(total);
    })();
    

    // Initiate BX Slider for main feature slider

    jQuery('.bxslider').bxSlider({

        auto: true,

        mode: 'fade',

        autoControls: false

    });



    // Initiate BX Slider for testimonils slider

    jQuery('.testi').bxSlider({

        auto: true,

        //mode: 'fade',

        autoControls: false

    });



    // Initiate lightbox Jquery

    jQuery("a[rel^='prettyPhoto']").prettyPhoto();





    // Scroll to Top

    jQuery('a[href=#top]').click(function () {

        jQuery('html, body').animate({scrollTop: 0}, 'slow');

        return false;

    });


/*
    $body.click(function(event) {

        // only do this if navigation is visible, otherwise you see jump in navigation while collapse() is called

        if (jQuery(".navbar-collapse").is(":visible") && jQuery(".navbar-toggle").is(":visible") ) {

            jQuery('.navbar-collapse').collapse('toggle');

        }

    });
*/




    // Parallax

    (function () {

        var parallax = document.querySelectorAll(".patternify"),

            speed = 1;

        window.onscroll = function () {

            [].slice.call(parallax).forEach(function (el, i) {

                var windowYOffset = window.pageYOffset,

                    elBackgrounPos = "0 " + (windowYOffset * speed) + "px";

                el.style.backgroundPosition = elBackgrounPos;

            });

        };



    })();



    modifyImgSelector();



})



window.scrollReveal = new scrollReveal();





var navHeight = jQuery('.home .navbar').outerHeight(true) + 50



$body.scrollspy({

    target: '.home .navbar.navbar-default.navbar-fixed-top',

    offset: navHeight

});



$window.on('load', function () {

    $body.scrollspy('refresh')

});



smoothScroll.init({

    speed: 200,

    easing: 'easeInOutCubic',

    offset: 60

});



var formPrice = jQuery("#priceForm");

var contactForm = jQuery("#contactForm");
var contactFormHumanitarios = jQuery("#contactFormHumanitarios");
var contactFormInversionistas = jQuery("#contactFormInversionistas");

var careersForm = jQuery("#careersForm");

var marriedContactusForm = jQuery("#married-contactus-form");





jQuery("#priceConsult").on("click", function() {

    jQuery(this).toggleClass("activo");

    (jQuery("#priceForm:visible").length > 0) ? formPrice.slideUp() : formPrice.slideDown();

});



jQuery("#married-contactus").on("click", function() {

    jQuery(this).toggleClass("activo");

    (jQuery("#married-contactus-form:visible").length > 0) ? marriedContactusForm.slideUp() : marriedContactusForm.slideDown();

});









formPrice.find('.close-btn').click(function(){formPrice.slideUp();jQuery("#priceConsult").toggleClass("activo");});

marriedContactusForm.find('.close-btn').click(function(){marriedContactusForm.slideUp();jQuery("#married-contactus").toggleClass("activo");});

contactForm.find('.close-btn').click(function(){contactForm.slideUp();});
contactFormHumanitarios.find('.close-btn').click(function(){contactFormHumanitarios.slideUp();});
contactFormInversionistas.find('.close-btn').click(function(){contactFormInversionistas.slideUp();});

careersForm.find('.close-btn').click(function(){

    jQuery("#agentBtn").toggleClass("showing");

    careersForm.slideUp();

});



jQuery("#writeDown").on("click", function () {

    (jQuery("#contactForm:visible").length > 0) ? contactForm.slideUp() : contactForm.slideDown();

})
jQuery("#writeDownHumanitarios").on("click", function () {
    
        (jQuery("#contactFormHumanitarios:visible").length > 0) ? contactFormHumanitarios.slideUp() : contactFormHumanitarios.slideDown();
    
})
jQuery("#writeDownInversionistas").on("click", function () {
    
        (jQuery("#contactFormInversionistas:visible").length > 0) ? contactFormInversionistas.slideUp() : contactFormInversionistas.slideDown();
    
})



jQuery("#agentBtn").on("click", function () {

    jQuery(this).toggleClass("showing");

    (jQuery("#careersForm:visible").length > 0) ? careersForm.slideUp() : careersForm.slideDown();

})


$window.on("load resize", function () {

    modifyImgSelector();

    marginAutoPictureContent();

});



