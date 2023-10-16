<?php
/**
 * Register the navigation menus. This theme uses wp_nav_menu() in three locations.
 */

// This theme uses wp_nav_menu() in one location.
register_nav_menus(
	array(
		'header-menu' => esc_html__( 'Header Menu', 'viator' ),
	)
);