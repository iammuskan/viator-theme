<?php
/**
 * viator functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package viator
 */

if ( ! defined( 'VIATORTHEME' ) ) {
	// Replace the version number of the theme on each release.
	define( 'VIATORTHEME', '1.7.8' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function viator_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on viator, use a find and replace
		* to change 'viator' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'viator', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'viator_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'viator_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viator_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viator_content_width', 640 );
}

add_action( 'after_setup_theme', 'viator_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Register the navigation menus.
 */
require TEMPLATEPATH . '/inc/menus.php';
require TEMPLATEPATH . '/inc/wp_bootstrap_navwalker.php';

/**
 * Register sidebars
 */
require TEMPLATEPATH . '/inc/sidebars.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load the CSS
 */
require TEMPLATEPATH . '/inc/stylesheets.php';

/**
 * Load scripts
 */
require TEMPLATEPATH . '/inc/scripts.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_action( 'woocommerce_applied_coupon', 'change_woocommerce_applied_coupon_action' );
function change_woocommerce_applied_coupon_action( $coupon_code ) {
	$cart_hash = $_COOKIE['user_custom_hash'];
	set_transient( "_woo_coupon_{$cart_hash}", $coupon_code, DAY_IN_SECONDS );
}

add_action( 'woocommerce_removed_coupon', 'change_woocommerce_removed_coupon' );
function change_woocommerce_removed_coupon() {
	$cart_hash = $_COOKIE['user_custom_hash'];
	delete_transient( "_woo_coupon_{$cart_hash}" );
}

#---CART---
//function woocommerce_checkout_coupon_form() {
//	$cart_hash = $_COOKIE['user_custom_hash'];
//
//	if ( get_transient( "_woo_price_{$cart_hash}" ) ) {
//		if ( is_user_logged_in() || WC()->checkout()->is_registration_enabled() || ! WC()->checkout()->is_registration_required() ) {
//			wc_get_template(
//				'checkout/form-coupon.php',
//				array(
//					'checkout' => WC()->checkout(),
//				)
//			);
//		}
//	}
//
//}

add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );

//add_action( 'woocommerce_cart_calculate_fees', 'change_woocommerce_cart_calculate_fees' );
//function change_woocommerce_cart_calculate_fees( $cart ) {
//	$coupons = array();
//	if ( $cart->applied_coupons ) {
//		$hash      = $_COOKIE['user_custom_hash'];
//		$woo_price = get_transient( "_woo_price_{$hash}" );
//
//		foreach ( $cart->applied_coupons as $applied_coupon ) {
//			$the_coupon = new WC_Coupon( $applied_coupon );
//
//			if ( $the_coupon->get_discount_type() === 'percent' ) {
//				$woo_price *= ( $the_coupon->get_amount() / 100 );
//			}
//
//			if ( $the_coupon->get_discount_type() === 'fixed_cart' || $the_coupon->get_discount_type() === 'fixed_product' ) {
//				$woo_price -= $the_coupon->get_amount();
//			}
//
//			$coupons[ $applied_coupon ] = $woo_price;
//		}
//
//		$cart->set_coupon_discount_totals( $coupons );
//	}
//}

//add_filter( 'woocommerce_cart_get_cart_contents_total', 'change_coupon_woocommerce_cart_function' );
//function change_coupon_woocommerce_cart_function( $totals_var ) {
//	$hash = $_COOKIE['user_custom_hash'];
//
//	if ( ( $coupon_code = get_transient( "_woo_coupon_{$hash}" ) ) && ( $woo_price = (int) get_transient( "_woo_price_{$hash}" ) ) ) {
//
//		$the_coupon = new WC_Coupon( $coupon_code );
//
//		if ( $the_coupon->get_discount_type() === 'percent' ) {
//			$woo_price *= ( $the_coupon->get_amount() / 100 );
//		}
//
//		if ( $the_coupon->get_discount_type() === 'fixed_cart' || $the_coupon->get_discount_type() === 'fixed_product' ) {
//			$woo_price -= $the_coupon->get_amount();
//		}
//
//		return $woo_price;
//	}
//
//	return $totals_var;
//}

add_action( 'woocommerce_before_calculate_totals', 'woo_before_calculate_totals_hook' );
function woo_before_calculate_totals_hook( $cart ) {
	foreach ( $cart->get_cart() as $cart_item ) {
		$product_id   = $cart_item['data']->get_id();
		$type_product = get_post_meta( $product_id, '_temp_product', true ) ? 'viator' : 'woo';

		if ( 'woo' == $type_product ) {
			$cart_hash = $_COOKIE['user_custom_hash'];
			$cart_item['data']->set_price( get_transient( "_woo_price_{$cart_hash}" ) );
		}
	}
}


#---ORDER---
add_filter( 'woocommerce_order_amount_line_subtotal', 'change_woocommerce_order_amount_line_subtotal', 1, 2 );
function change_woocommerce_order_amount_line_subtotal( $subtotal, $that ) {
	$order_id = $that->id;

	if ( $woo_price = get_post_meta( $order_id, '_woo_price', true ) ) {
		return $woo_price;
	}

	return $subtotal;
}

//add_filter( 'woocommerce_order_subtotal_to_display', 'change_woocommerce_order_subtotal_to_display' );
//function change_woocommerce_order_subtotal_to_display( $subtotal ) {
//	$hash = $_COOKIE['user_custom_hash'];
//
//	if ( $woo_price = (int) get_transient( "_woo_price_{$hash}" ) ) {
//		return '<span class="woocommerce-Price-amount test-func-in-woo amount"><span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>' . $woo_price . '.00</span>';
//	}
//
//	return $subtotal;
//}

add_filter( 'woocommerce_order_amount_item_subtotal', 'change_woocommerce_order_amount_item_subtotal', 10, 3 );
function change_woocommerce_order_amount_item_subtotal( $subtotal, $that, $item ) {
	$order_id = get_the_ID();

	if ( $woo_price = get_post_meta( $order_id, '_woo_price', true ) ) {
		return $woo_price;
	}

	return $subtotal;
}

add_filter( 'woocommerce_order_get_subtotal', 'change_woocommerce_order_get_subtotal' );
function change_woocommerce_order_get_subtotal( $NumberUtil ) {
	$hash = $_COOKIE['user_custom_hash'];

	if ( $woo_price = (int) get_transient( "_woo_price_{$hash}" ) ) {
		return $woo_price;
	}

	return $NumberUtil;
}

add_action( 'woocommerce_before_order_item_line_item_html', 'viator_woocommerce_before_order_item_itemtype_html_action',
	10, 3 );
function viator_woocommerce_before_order_item_itemtype_html_action( $item_id, $item, $order ) {
	$order_id = get_the_ID();

	if ( $woo_price = get_post_meta( $order_id, '_woo_price', true ) ) {
		$item->set_subtotal( (string) $woo_price );

		if ( $coupon_code = get_post_meta( $order_id, '_woo_coupon', true ) ) {
			$the_coupon = new WC_Coupon( $coupon_code );

			if ( $the_coupon->get_discount_type() === 'percent' ) {
				$woo_price -= $woo_price * ( $the_coupon->get_amount() / 100 );
			}

			if ( $the_coupon->get_discount_type() === 'fixed_cart' || $the_coupon->get_discount_type() === 'fixed_product' ) {
				$woo_price = - $the_coupon->get_amount();
			}
		}

		$item->set_total( (string) $woo_price );
	}
}

function viator_register_js_strings() {
	$js_strings = array(
		'Up to 24 hours in advance.'                                      => 'Up to 24 hours in advance.',
		'Free cancellation'                                               => 'Free cancellation',
		'Pickup offered'                                                  => 'Pickup offered',
		'Description'                                                     => 'Description',
		'Prices'                                                          => 'Prices',
		'Details'                                                         => 'Details',
		'What\'s Included'                                                => 'What\'s Included',
		'Additional Info'                                                 => 'Additional Info',
		'Cancellations'                                                   => 'Cancellations',
		'Meeting point'                                                   => 'Meeting point',
		'Reviews'                                                         => 'Reviews',
		'Schedules'                                                       => 'Schedules',
		'Itinerary'                                                       => 'Itinerary',
		'Admission Ticket Included'                                       => 'Admission Ticket Included',
		'Admission Ticket Not Included'                                   => 'Admission Ticket Not Included',
		'Pickup Time'                                                     => 'Pickup Time',
		'After booking, the operator will contact you about pickup time.' => 'After booking, the operator will contact you about pickup time.',
		'Please Note'                                                     => 'Please Note',
	);

	foreach ( $js_strings as $key => $value ) {
		pll_register_string( $key, $value, 'viator' );
	}

}

add_action( 'init', 'viator_register_js_strings' );

function viator_manual_sync_rates() {
	if ( ! empty( $_GET['sync_currency'] ) ) {
		$exchange_rates = get_option( '_viator_exchange_rates' );

		if ( ! empty( $exchange_rates ) ) {
			$rates = json_decode( $exchange_rates, true );
			if ( isset( $rates['rates'] ) && ! empty( $rates['rates'] ) && is_array( $rates['rates'] ) ) {
				foreach ( $rates['rates'] as $rateData ) {
					if ( $rateData['sourceCurrency'] === 'USD' ) {
						$rate           = $rateData['rate'];
						$targetCurrency = sanitize_key( strtolower( $rateData['targetCurrency'] ) );
						update_option( 'wcpay_multi_currency_manual_rate_' . $targetCurrency, (float) $rate );
					}
				}
			}
		}

	}
}

add_action( 'init', 'viator_manual_sync_rates' );

function viator_getDestinationIDByName( $name ) {
	$data = json_decode( get_option( '_viator_dest' ), true );
	foreach ( $data as $item ) {
		if ( $item['destinationUrlName'] == $name ) {
			return $item['destinationId'];
		}
	}

	return null;
}

function viator_get_destination( $val = '', $parent = false, $language = 'en', $key = 'destinationUrlName' ) {

	$language = !empty($_POST['language']) ? $_POST['language'] : $language;
	$language = trim( $language, '_' );

	$destinations = json_decode( get_option( '_viator_dest_' . $language ), true );

	foreach ( $destinations as $item ) {

		if ( ! empty( $parent ) && is_numeric( $parent ) && $parent === $item['destinationId'] ) {
			return $item[ $key ];
		}

		if ( strtolower( (string) $item['destinationUrlName'] ) === strtolower( (string) $val ) ) {

			if ( ! empty( $parent ) && ! is_numeric( $parent ) ) {

				return viator_get_destination( '', $item['parentId'], $language ); //  loop

			}

			return $item[ $key ]; // return child
		}

	}

	return null;


}

function viator_product_url( $destination ) {

	$parent = viator_get_destination( $destination, true, carbon_lang_prefix() );

	if ( ! empty( $parent ) ) {
		$parent = $parent . '_';
	}

	return home_url( trim( carbon_lang_prefix(), '_' ) . '/product-category/' . $parent . $destination );

}

function custom_wp_title($title, $sep) {
	global $paged, $page;

	if (is_archive()) {
		return $title;
	}


	// Get the queried object's name and process it with the provided code
	$city_raw = explode('_', get_queried_object()->name);
	$new_title = viator_get_destination($city_raw[1], false, carbon_lang_prefix(), 'destinationName');

	// Add the new title to the existing title
	$title = $new_title . " $sep " . $title;

	// Add a page number if necessary
	if ($paged >= 2 || $page >= 2) {
		$title = "$title $sep " . sprintf(__('Page %s', 'twentyfourteen'), max($paged, $page));
	}

	return $title;
}
//add_filter('wp_title', 'custom_wp_title', 10, 2);

add_action('wp',function (){
	$order_id = '1701';


	$order    = wc_get_order( $order_id );

	if ( false === $order ) {
		return new WP_Error( 'wcpay_missing_order', __( 'Order not found', 'woocommerce-payments' ), [ 'status' => 404 ] );
	}

	$intent_id = $order->get_transaction_id();

	//print_r( $order);

	// Update the order status
	//$order->update_status( 'completed' );

	// /wc/v3/payments/orders/"+ored_id+"/capture_authorization

	//print_r(  $intent_id );

	//print_r( do_action('woocommerce_order_action_capture_charge', $order));
});