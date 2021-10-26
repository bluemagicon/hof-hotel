<?php

function baw_register_my_taxes() {

	/**
	 * Taxonomy: Standorte.
	 */

	$labels = [
		"name" => __( "Standorte", "custom-post-type-ui" ),
		"singular_name" => __( "Standort", "custom-post-type-ui" ),
		"menu_name" => __( "Standorte", "custom-post-type-ui" ),
	];


	$args = [
		"label" => __( "Standorte", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'location', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy( "location", [ "post", "team", "bewertung", "stellenangebot", "erfahrungsbericht", "projekt", "lp", "benefit" ], $args );

	
}
add_action( 'init', 'baw_register_my_taxes' );



?>
