<?php

//add_filter('show_admin_bar', '__return_false');


get_template_part('functions/register-taxonomies');
get_template_part('functions/register-posttypes');
get_template_part('functions/register-acf-options');
get_template_part('functions/gutenberg-color-palette');
get_template_part('functions/gutenberg-custom-blocks');
get_template_part('functions/gutenberg-extend-blocks');
get_template_part('functions/ghostkit-enqueue');
get_template_part('functions/ghostkit-custom-icons');




// Table of Contents:
// --------------------
// 1. Theme Setup (Basis-Einstellung für das Theme, aber keine inhaltsbezogenen Einstellungen!)
// 2. Init Hook (Weitergehende, inhaltsbezogene Basis-Einstellung für das Theme, die beim bei jedem Seitenaufruf nach Initialisierung des Themes ausgeführt werden)
// 3. Admin Init (Einstellungen, die immer initialisiert werden, wenn eine Admin-Seite geladen wird)q
// 4. Styles & Scripts
// 5. Tricks & Hacks


/* ============================================================
 * 1. THEME SETUP
 *
 * Wird bei jedem Seitenaufruf ausgeführt, nachdem das Theme intialisiert wurde
 *
 * Da zu diesem Zeitpunkt der Initialisierung der Seite noch keine Authentifizierung
 * des Nutzers statt fand, sollten hier keine inhaltlichen Einstellungen geladen werden.
 * Hier sollten nur Theme-Funktionen aktiviert und technische Basis-Einstellungen version
 * Wordpress vorgenommen werden.
 *
 * ============================================================ */

add_action('after_setup_theme', 'baw_after_setup_theme');
function baw_after_setup_theme()
{

    //
    // WordPress-Einstellungen überschreiben
    //

    @ini_set('max_execution_time', '300');
    @ini_set('upload_max_size', '64M');
    @ini_set('post_max_size', '64M');


    //
    // Theme-Funktionen aktivieren
    //

    add_theme_support('html5', ['search-form', 'gallery', 'caption', ]);
    add_theme_support('post-thumbnails');
    add_theme_support('editor-style');
    add_theme_support('align-wide');
    add_theme_support('title-tag');
    add_theme_support('menus');


    //
    // Posttype-Funktionen aktivieren
    //

    add_post_type_support('page', 'excerpt');


    //
    // Überflüssiges aus dem Header löschen
    //

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'print_emoji_detection_script', 7 );
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);


    //
    // Disable Emoji's
    //

    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
        return array();
        }
    }
    function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
        if ( 'dns-prefetch' == $relation_type ) {
            $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
            $urls = array_diff( $urls, array( $emoji_svg_url ) );
        }
        return $urls;
    }


    //
    // Custom Excerpt Length
    //

    function baw_custom_excerpt_length( $length ) {
        return 20;
    }
    add_filter( 'excerpt_length', 'baw_custom_excerpt_length', 999 );


    //
    // Custom Excerpt Ending
    //

    function new_excerpt_more( $more ) {
    	return ' ...';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

}




/* ============================================================
 * 2. INIT
 *
 *	Wird immer ausgeführt, bevor die Admin-
 * Seiten geladen werden.
 *
 * In dieser Hook sollten alle Basis-Einstellungen für Wordpress gemacht werden,
 * die sich auf Inhalte beziehen (z.B. Registrierung der Menüs, Custom Post Types, etc)
 *
 * ============================================================ */

add_action('init', 'baw_init');
function baw_init()
{

    //
    // Eigene Bild-Größen
    //

    // 1/4 Grid
    add_image_size('baw-xs', 375, 375, false);
    add_image_size('baw-xs-fix', 375, 375, array( 'center', 'center' ));
    //add_image_size('baw-xs-quad', 375, 375, array( 'center', 'center' ));

    // 1/3 Grid
    add_image_size('baw-s', 500, 500, false);
    add_image_size('baw-s-fix', 500, 500, array( 'center', 'center' ));
    //add_image_size('baw-s-quad', 500, 500, array( 'center', 'center' ));

    // 1/2 Grid
    add_image_size('baw-m', 750, 750, false);
    add_image_size('baw-m-fix', 750, 750, array( 'center', 'center' ));
    //add_image_size('baw-m-quad', 750, 750, array( 'center', 'center' ));

    // 2/3 Grid
    add_image_size('baw-l', 1000, 1000, false);
    add_image_size('baw-l-fix', 1000, 1000, array( 'center', 'center' ));
    //add_image_size('baw-l-quad', 1000, 1000, array( 'center', 'center' ));

    // 1/1 Grid
    add_image_size('baw-xl', 1500, 1500, false);
    add_image_size('baw-xl-fix', 1500, 1500, array( 'center', 'center' ));


    //
    // Menü-Setup
    //

    register_nav_menus(array(
        'primary' => 'Hauptmenü',
        'footer' => 'Footer',
    ));

}


//
// Gutenberg Bildformate
//

add_filter('image_size_names_choose', 'create_custom_image_size');
function create_custom_image_size($sizes){
    $custom_sizes = array(
        'baw-xs' => '1/4',
        'baw-xs-fix' => '1/4 fix',
        //'baw-xs-quad' => '1/4 quadrat',
        'baw-s' => '1/3',
        'baw-s-fix' => '1/3 fix',
        //'baw-s-quad' => '1/3 quadrat',
        'baw-m' => '1/2',
        'baw-m-fix' => '1/2 fix',
        //'baw-m-quad' => '1/2 quadrat',
        'baw-l' => '2/3',
        'baw-l-fix' => '2/3 fix',
        //'baw-l-quad' => '2/3 quadrat',
        'baw-xl' => '1/1',
        'baw-xl-fix' => '1/1 fix',
        //'baw-xl-quad' => '1/1 quadrat',
    );
    return array_merge( $sizes, $custom_sizes );
}




/* ============================================================
 * 3. ADMIN INIT
 *
 *	Wird immer ausgeführt, bevor die Admin-
 * Seiten geladen werden
 * ============================================================ */


add_action('admin_init', 'dwbaw_admin_color_scheme');
function dwbaw_admin_color_scheme() {
    $theme_dir = get_template_directory_uri();

    wp_admin_css_color( 'dwbaw', __( 'deux + braveandwray' ),
        $theme_dir . '/dist/css/backend.css',
        array( '#e5e5e5', '#333', '#e40e54' , '#e40e54')
    );

	remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	add_filter( 'get_user_option_admin_color', function() {
		return 'dwbaw';
	});
}

add_action('user_register', 'set_default_admin_color');
function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'dwbaw'
    );
    wp_update_user( $args );
}






/* ============================================================
 * 4. STYLES & SKRIPTE
 *
 *	Einbindung von CSS, JS, etc.
 * ============================================================ */


//
// BACKEND FILES
//

add_action( 'enqueue_block_editor_assets', 'baw_gutenberg_assets' );
function baw_gutenberg_assets() {
    wp_enqueue_style( 'baw-gutenberg', get_theme_file_uri( '/dist/css/editor.css' ), false );
}
add_action( 'login_enqueue_scripts', 'baw_login_stylesheet' );
function baw_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/dist/css/login.css' );
}



//
// FRONTEND FILES
//

add_action('wp_enqueue_scripts', 'baw_enqueue_scripts', 30);
function baw_enqueue_scripts()
{
    if ( ! is_admin() ) {
        // jQuery in den Footer
        wp_deregister_script('jquery');
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), false, NULL, true );
        wp_enqueue_script( 'jquery' );
    }

    // Unser Custom JavaScript
    wp_register_script('baw-scripts', get_template_directory_uri() . '/dist/js/script.js', false, false, true);
    wp_enqueue_script('baw-scripts');
}


add_action('wp_enqueue_scripts', 'baw_enqueue_styles', 10);
function baw_enqueue_styles()
{
    wp_register_style('baw-style', get_template_directory_uri() . '/dist/css/style.css');
    wp_enqueue_style('baw-style');
}


add_action('wp_default_scripts', 'baw_remove_jquery_migrate');
function baw_remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) {
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}




/* ============================================================
 * 5. Hacks & Tricks
 *
 * Hier werden nützliche Hacks und Tricks geladen,
 * die in keinen anderen Hook passen
 * ============================================================ */


 add_filter( 'get_the_archive_title', function ($title) {
     if ( is_category() ) {
         $title = single_cat_title( '', false );
     } elseif ( is_tag() ) {
         $title = single_tag_title( '', false );
     } elseif ( is_author() ) {
         $title = '<span class="vcard">' . get_the_author() . '</span>' ;
     } elseif ( is_tax() ) { //for custom post types
         $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
     } elseif (is_post_type_archive()) {
         $title = post_type_archive_title( '', false );
     }
     return $title;
 });


//
// ZUGRIFFSRECHTE UND WEITERLEITUNGEN
//

add_action('template_redirect', 'baw_redirect_post');
function baw_redirect_post()
{
    $queried_post_type = get_query_var('post_type');
    if (array_search($queried_post_type, array('attachment')))
    {
        wp_redirect(home_url() , 301);
        exit;
    }
}


//
// HOLT SVG-CODE AUS THEME-DATEIEN
//

function baw_svg($path) {
    if($path) {
        $path = str_replace('.svg', '', $path);
        $path_full = get_template_directory().'/dist/svg/'.$path.'.svg';

        if(@file_get_contents($path_full)) {
            $svg = file_get_contents($path_full);
            $svg = preg_replace('/<!--(.|\s)*?-->/', '', $svg);

            $svg = str_replace('<svg', '<svg class="w-svg" width="24" width="24"', $svg);

            return $svg;
        }
    }
}


//
// print_r with pre around
//

function pre_print_r($print)
{
    echo '<pre>';
    print_r($print);
    echo '</pre>';
}
