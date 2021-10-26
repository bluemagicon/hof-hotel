<?php

/*
Available filters:
gkt_enqueue_plugin_object_fit_images
gkt_enqueue_plugin_jarallax
gkt_enqueue_plugin_swiper
gkt_enqueue_plugin_gist_simple
gkt_enqueue_plugin_scrollreveal
gkt_enqueue_plugin_parsley
gkt_enqueue_google_recaptcha
*/

add_filter( 'gkt_enqueue_plugin_swiper', '__return_false' );
add_filter( 'gkt_enqueue_plugin_scrollreveal', '__return_false' );
//add_filter( 'gkt_enqueue_plugin_jarallax', '__return_false' );
