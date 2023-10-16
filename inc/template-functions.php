<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package viator
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function viator_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'viator_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function viator_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'viator_pingback_header' );

function nav_css_filter( $classes, $item, $args ){
	if ($args->theme_location !== 'header-menu'){
		$classes[] = "footer__menu-item";
	}
	if ($args->theme_location === 'header-menu'){
		$classes[] = "header__menu-item";
	}


	return $classes;
}
add_filter( 'nav_menu_css_class', 'nav_css_filter', 10, 3);


function filter_nav_menu_item( $args, $item ){
	if ($args->theme_location !== 'header-menu'){
		$args->menu_class = 'footer__menu';
	}

	return $args;
}
add_filter( 'nav_menu_item_args', 'filter_nav_menu_item', 10, 2 );

function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
		array_push(
			$block_categories,
			array(
				'slug'  => 'viator-blocks',
				'title' => esc_html__( 'viator Blocks', 'viator' ),
				'icon'  => null,
			)
		);
	}
	return $block_categories;
}

add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2);
