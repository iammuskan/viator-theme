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
<div class="child" style="display:none;"></div>
<script src="<?php echo get_template_directory() .'/js/filter.js' ?>"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script async>
    	jQuery('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			autoplay: true,
			autoplaySpeed: 10000,
			asNavFor: '.slider-nav',
		});
		jQuery('.slider-nav').slick({
			slidesToShow: 2,
			slidesToScroll: 1,
			asNavFor: '.slider-for',
			dots: true,
			dotsClass: 'pagination pagination_min pagination_slick',
			centerMode: true,
			vertical: true,
			centerPadding: '0',
				appendArrows: '.banner-section .excursion__slider-arrows-new',
			appendDots: '.banner-section .excursion__slider-arrows-new',
			prevArrow: '<button type="button" class="slick-prev"></button>',
			nextArrow: '<button type="button" class="slick-next"></button>',
			responsive: [
				{
					breakpoint: 991,
					settings: {
						vertical: false,
						slidesToShow: 5,
						centerPadding: '50px',
					}
				},
				{
					breakpoint: 767,
					settings: {
						vertical: false,
						slidesToShow: 4,
						centerPadding: '35px',
					}
				},

			]
		});
	
var bannerSection = document.querySelector('.banner-section');
    if (!bannerSection) {
                     document.querySelector('.excursion__slider').classList.add("d-flex");

     document.querySelector('.excursion__slider').classList.remove("hide-real");
    }else{
             document.querySelector('.excursion__slider').classList.remove("d-flex");

            document.querySelector('.excursion__slider').classList.add("hide-real");

    }
if (jQuery('.single .block-popular .rowed').length > 0) {
    jQuery('.single .block-popular .row').hide();
} else {
    jQuery('.single .block-popular .row').show();
}

</script>
<?php
wp_footer();
?>


</body>
</html>
