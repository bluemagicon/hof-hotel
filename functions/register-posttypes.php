<?php

function baw_register_my_cpts() {

	/**
	 * Post Type: Unser Team.
	 */

	$labels = [
		"name" => __( "Unser Team", "baw" ),
		"singular_name" => __( "Mitarbeiter", "baw" ),
		"menu_name" => __( "Team", "baw" ),
		"all_items" => __( "Alle Mitarbeiter", "baw" ),
		"add_new" => __( "neuer Mitarbeiter", "baw" ),
		"add_new_item" => __( "neuer Mitarbeiter", "baw" ),
		"edit_item" => __( "Mitarbeiter bearbeiten", "baw" ),
		"new_item" => __( "neuer Mitarbeiter", "baw" ),
		"view_item" => __( "Mitarbeiter ansehen", "baw" ),
		"view_items" => __( "Team ansehen", "baw" ),
	];

	$args = [
		"label" => __( "Unser Team", "baw" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "team", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-groups",
		"supports" => [ "title", "thumbnail", "revisions" ],
		"show_in_graphql" => false,
	];

	register_post_type( "team", $args );

	/**
	 * Post Type: Adressen
	 */

	$labels = [
		"name" => __( "Adressen", "baw" ),
		"singular_name" => __( "Adresse", "baw" ),
		"menu_name" => __( "Adressen", "baw" ),
		"all_items" => __( "Alle Adressen", "baw" ),
		"add_new" => __( "Neue Adresse ", "baw" ),
		"add_new_item" => __( "Neue Adresse", "baw" ),
		"edit_item" => __( "Adresse bearbeiten", "baw" ),
		"new_item" => __( "Neue Adresse", "baw" ),
		"view_item" => __( "Adresse ansehen", "baw" ),
		"view_items" => __( "Adresse ansehen", "baw" ),
	];

	$args = [
		"label" => __( "Adressen", "baw" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "adresse", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 21,
		"menu_icon" => "dashicons-location-alt",
		"supports" => [ "title", "thumbnail"],
		"show_in_graphql" => false,
	];

	register_post_type( "adressen", $args );

	/**
	 * Post Type: Bewertungen.
	 */

	$labels = [
		"name" => __( "Bewertungen", "baw" ),
		"singular_name" => __( "Bewertung", "baw" ),
		"menu_name" => __( "Bewertungen", "baw" ),
		"all_items" => __( "Alle Bewertungen", "baw" ),
		"add_new" => __( "neue Bewertung", "baw" ),
		"add_new_item" => __( "neue Bewertung", "baw" ),
		"edit_item" => __( "Bewertung bearbeiten", "baw" ),
		"new_item" => __( "neue Bewertung", "baw" ),
		"view_item" => __( "Bewertung ansehen", "baw" ),
		"view_items" => __( "Bewertungen ansehen", "baw" ),
	];

	$args = [
		"label" => __( "Bewertungen", "baw" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "bewertung", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 24,
		"menu_icon" => "dashicons-star-filled",
		"supports" => [ "title", "thumbnail", "editor" ],
		"show_in_graphql" => false,
	];

	register_post_type( "bewertung", $args );

}

add_action( 'init', 'baw_register_my_cpts' );


?>
