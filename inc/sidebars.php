<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function viator_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'viator' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'viator' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu', 'viator' ),
			'id'            => 'footer__menu',
			'description'   => esc_html__( 'Add widgets here.', 'viator' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-4 col-sm-12 footer__menu-col">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="footer__title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Info', 'viator' ),
			'id'            => 'footer__info',
			'description'   => esc_html__( 'Add widgets here.', 'viator' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'viator_widgets_init' );