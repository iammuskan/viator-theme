<?php
/**
 * Loads the theme's javascript
 */


//function viator_admin_js( $hook_suffix ){
//	$path = get_template_directory_uri();
//
//	if ($hook_suffix === 'edit.php'){
//		wp_enqueue_script(
//			'viator-admin',
//			$path . '/assets/js/viator/admin.js',
//			'',
//			VIATORTHEME,
//			true );
//	}
//}
//add_action( 'admin_enqueue_scripts', 'viator_admin_js' );

function wp_enqueue_assets(){
	$path = get_template_directory_uri();

	if ( is_account_page() ) {
		wp_enqueue_script(
			'my-account-scripts',
			$path . '/assets/js/my-account-scripts.js',
			array( 'jquery', 'wp-util' ),
			VIATORTHEME,
			true
		);
	}

}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_assets' );

function create_block_editor_assets() {
	$path = get_template_directory_uri();

	wp_enqueue_script(
		'custom-blocks',
		$path . '/assets/js/add-custom-blocks.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		VIATORTHEME
	);

}

add_action( 'enqueue_block_editor_assets', 'create_block_editor_assets' );