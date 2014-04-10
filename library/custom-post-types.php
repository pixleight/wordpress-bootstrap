<?php
/**
 * Register Front Page Slide custom posts
 */
add_action('init', 'cptui_register_my_cpt_front_page_slide');
function cptui_register_my_cpt_front_page_slide() {
	register_post_type('front_page_slide', array(
		'label' => 'Front Page Slides',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'front_page_slide', 'with_front' => true),
		'query_var' => true,
		'exclude_from_search' => true,
		'supports' => array('title','editor','revisions','thumbnail','page-attributes'),
		'labels' => array (
			'name' => 'Front Page Slides',
			'singular_name' => 'Front Page Slide',
			'menu_name' => 'Front Page Slides',
			'add_new' => 'Add Front Page Slide',
			'add_new_item' => 'Add New Front Page Slide',
			'edit' => 'Edit',
			'edit_item' => 'Edit Front Page Slide',
			'new_item' => 'New Front Page Slide',
			'view' => 'View Front Page Slide',
			'view_item' => 'View Front Page Slide',
			'search_items' => 'Search Front Page Slides',
			'not_found' => 'No Front Page Slides Found',
			'not_found_in_trash' => 'No Front Page Slides Found in Trash',
			'parent' => 'Parent Front Page Slide',
		)
	) 
); }

/**
 * Register Location custom posts
 */
add_action('init', 'cptui_register_my_cpt_location');
function cptui_register_my_cpt_location() {
	register_post_type('location', array(
		'label' => 'Locations',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'location', 'with_front' => true),
		'query_var' => true,
		'has_archive' => true,
		'supports' => array('title','editor','revisions','thumbnail','page-attributes'),
		'labels' => array (
			'name' => 'Locations',
			'singular_name' => 'Location',
			'menu_name' => 'Locations',
			'add_new' => 'Add Location',
			'add_new_item' => 'Add New Location',
			'edit' => 'Edit',
			'edit_item' => 'Edit Location',
			'new_item' => 'New Location',
			'view' => 'View Location',
			'view_item' => 'View Location',
			'search_items' => 'Search Locations',
			'not_found' => 'No Locations Found',
			'not_found_in_trash' => 'No Locations Found in Trash',
			'parent' => 'Parent Location',
		)
	) 
); }

/**
 * Register Provider custom post types
 */
add_action('init', 'cptui_register_my_cpt_provider');
function cptui_register_my_cpt_provider() {
	register_post_type('provider', array(
		'label' => 'Providers',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'provider', 'with_front' => true),
		'query_var' => true,
		'has_archive' => true,
		'supports' => array('title','editor','excerpt','revisions','thumbnail','page-attributes'),
		'labels' => array (
			'name' => 'Providers',
			'singular_name' => 'Provider',
			'menu_name' => 'Providers',
			'add_new' => 'Add Provider',
			'add_new_item' => 'Add New Provider',
			'edit' => 'Edit',
			'edit_item' => 'Edit Provider',
			'new_item' => 'New Provider',
			'view' => 'View Provider',
			'view_item' => 'View Provider',
			'search_items' => 'Search Providers',
			'not_found' => 'No Providers Found',
			'not_found_in_trash' => 'No Providers Found in Trash',
			'parent' => 'Parent Provider',
		)
	) 
); }
?>