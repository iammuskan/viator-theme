<?php
/**
 * Register and enqueue the CSS
 */
function viator_styles() {
	wp_enqueue_style(
		'viator',
		get_stylesheet_uri(),
		'',
		VIATORTHEME );

	include_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( ! is_plugin_active( 'viator/viator.php' ) ) {
		wp_enqueue_style(
			'viator-library',
			get_template_directory_uri() . '/assets/css/library.min.css',
			'',
			VIATORTHEME
		);

		wp_enqueue_style(
			'viator-grid',
			get_template_directory_uri() . '/assets/css/grid.min.css',
			'',
			VIATORTHEME
		);

		wp_enqueue_style(
			'viator-bootstrap',
			get_template_directory_uri() . '/assets/css/bootstrap.min.css',
			'',
			VIATORTHEME
		);
	}

	wp_enqueue_style(
		'viator-woo-icon',
		get_template_directory_uri() . '/assets/css/woocommerce/icons.css',
		'',
		VIATORTHEME
	);

	wp_enqueue_style(
		'viator-woocommerce',
		get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css',
		array( 'viator-woo-icon' ),
		VIATORTHEME
	);

	wp_enqueue_style(
		'viator-woo-style',
		get_template_directory_uri() . '/assets/css/woocommerce/woo.css',
		'',
		VIATORTHEME
	);

	wp_style_add_data( 'viator-woo-style', 'rtl', 'replace' );

	wp_enqueue_style(
		'viator-header',
		get_template_directory_uri() . '/assets/css/header.min.css',
		'',
		VIATORTHEME
	);

	wp_enqueue_style(
		'viator-footer',
		get_template_directory_uri() . '/assets/css/footer.min.css',
		'',
		VIATORTHEME
	);

	if ( is_account_page() ) {
		wp_enqueue_style(
			'my-account-style',
			get_template_directory_uri() . '/assets/css/my-account-style.css',
			'',
			VIATORTHEME
		);
	}
}

add_action( 'wp_enqueue_scripts', 'viator_styles' );