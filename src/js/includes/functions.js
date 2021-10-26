// -----------------------------------------------
// -----------------------------------------------
// Header onScroll

window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("header--scrolled");
  } else {
    header.classList.remove("header--scrolled");
  }
}


// -----------------------------------------------
// -----------------------------------------------
// Off-Canvas
// https://github.com/appleple/hiraku2

var offcanvas = new Hiraku(".offcanvas", {
    btn: "#offcanvas-trigger",
    fixedHeader: "#header",
    width: '75%',
    direction: "right"
});
offcanvas.on('open', function(){
    offcanvas.btn.classList.add('is-active');
});
offcanvas.on('close', function(){
    offcanvas.btn.classList.remove('is-active');
});


// -----------------------------------------------
// -----------------------------------------------
// jQuery Functions

jQuery(document).ready(function () {
    'use strict';

    if (window.location.hash) {
        setTimeout(function() {
            scrollTo(window.location.hash);
        }, 1);
    }


    //MODAL
    jQuery('.open-dyn-modal').click(function() {
        var title = decodeURIComponent(jQuery(this).data('title').replace(/\+/g, ' '));
        var subtitle = jQuery(this).data('subtitle');
        var content = decodeURIComponent(jQuery(this).data('content').replace(/\+/g, ' '));

        jQuery('#dyn-modal-title').empty().append(title);
        jQuery('#dyn-modal-subtitle').empty().append(subtitle);
        jQuery('#dyn-modal-content p').empty().append(content);
    });


    //SCROLL-TOP BTN
    jQuery(".scroll-top-btn").click(function () {
        jQuery("html, body").animate({scrollTop: 0}, 2000);
    });

    // -----------------------------------------------
    // -----------------------------------------------
    // ANCHOR LINKS
    jQuery('main a[href*="#"]:not([class*=accordion]):not(._brlbs-btn), header a[href*="#"]:not([class*=accordion]), .offcanvas a[href*="#"]:not([class*=accordion]), .w-scrollto').stop().click(function(e) {
        var target = jQuery(this).attr("href");
        var current_url = window.location.origin + window.location.pathname;

        if(target !== "#") {

            if(target.charAt(0) == '#') {
                e.preventDefault();
                scrollTo(target);
                //UIkit.offcanvas('#offcanvas').hide();
                offcanvas.close();


            } else if(target.indexOf(current_url) !== -1) {
                e.preventDefault();
                target = target.replace(current_url, '');
                scrollTo(target);
                //UIkit.offcanvas('#offcanvas').hide();
                offcanvas.close();

            }
        }
    });

    // -----------------------------------------------
    // -----------------------------------------------

});

function scrollTo(target)
{
    var distance = jQuery(target).offset().top;
    var navHeight = jQuery('#header').outerHeight() + 40;

    jQuery('html, body').animate({
        scrollTop: (distance - navHeight)
    }, 600);

}