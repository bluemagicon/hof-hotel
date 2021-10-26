<?php

// ===============================================
// ===============================================
// Enqueue Extended Block-Stuff


function baw_gutenberg_scripts() {
	wp_enqueue_script( 'baw-gb-editor', get_stylesheet_directory_uri() . '/dist/js/gutenberg-extend-blocks.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/dist/js/gutenberg-extend-blocks.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'baw_gutenberg_scripts' );
