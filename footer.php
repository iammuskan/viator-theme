<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viator
 */

$path = get_template_directory_uri();
?>

<footer class="footer">
    <div class="container">

        <div class="footer__main">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="row">
						<?php if ( is_active_sidebar( 'footer__menu' ) ) {
							dynamic_sidebar( 'footer__menu' );
						} ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer__info">
            <div class="row">
				<?php if ( is_active_sidebar( 'footer__info' ) ) {
					dynamic_sidebar( 'footer__info' );
				} ?>
            </div>
        </div>

        <div class="footer__bottom">
           <!-- <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'informativa-sulla-privacy-e-cookies' )->ID));?>" title="<?php esc_attr_e( 'Privacy policy', 'viator' ); ?>">
                <?php esc_html_e( 'Privacy policy', 'viator' ); ?>
            </a> -->

            <p>&copy; <?php esc_attr_e( 'Copyright', 'viator' ); ?> <?php echo date( 'Y' ); ?>, Il Mio Viaggio Inc. | Coded with Love by <a href="https://cocoandjay.com/">Coco &amp; Jay</a></p>
        </div>

    </div>
</footer>
<script src="<?php echo get_template_directory() .'/js/filter.js' ?>"></script>
<?php
wp_footer();
?>


</body>
</html>
