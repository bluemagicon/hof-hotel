/*
data-effect="<?= $slider_effect ?>"
data-speed="<?= $slider_speed ?>"
data-autoplay="<?= $slider_autoplay ?>"
data-slides-per-view="<?= $slider_slidesperview ?>"
data-centered-slides="<?= $slider_centeredslides ?>"
data-loop="<?= $slider_loop ?>"
data-free-scroll="<?= $slider_freescroll ?>"
data-show-arrows="<?= $slider_showarrows ?>"
data-show-bullets="<?= $slider_showbullets ?>"
data-dynamic-bullets="<?= $slider_dynamicbullets ?>"
data-space-between="<?= $slider_spacebetween ?>">
*/

jQuery(document).ready(function () {
    'use strict';

    jQuery('.slider.swiper-container').each( function() {

        var id = '#' + jQuery(this).attr('id');
        var slider = jQuery(this);
        var settings = {
            autoHeight: true,
            speed: slider.data('speed'),
            spaceBetween: slider.data('space-between'),
            centeredSlides: slider.data('centered-slides'),
            freeMode: slider.data('free-scroll'),
            loop: slider.data('loop'),
            autoplay: 0 !== slider.data('autoplay') && {
                delay: slider.data('autoplay')
            },
            navigation: true === slider.data('show-arrows') && {
                nextEl: id+" .slider-arrow-next",
                prevEl: id+" .slider-arrow-prev",
            },
            pagination: true === slider.data('show-bullets') && {
                el: id+" .slider-bullets",
                clickable: true,
                dynamicBullets: true === slider.data('dynamic-bullets'),
            },
            slidesPerView: slider.data('spw-default'),
            breakpoints: {
                640: {
                    slidesPerView: slider.data('spw-mobile'),
                },
                960: {
                    slidesPerView: slider.data('spw-tablet'),
                },
                1200: {
                    slidesPerView: slider.data('spw-desktop'),
                }
            }
        }

        //console.log(settings);
        const swiper = new Swiper(id, settings);
    });
});
