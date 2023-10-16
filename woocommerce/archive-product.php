<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

status_header( 200 );
defined( 'ABSPATH' ) || exit;


get_header( 'shop' );
$path         = get_template_directory_uri();
$settings     = get_option( 'viator_settings_options_name' );
$current_lang = pll_current_language();
$lang         = '';

if ( pll_current_language() !== pll_default_language() ) {
	$lang = $current_lang . '/';
}


$is_404     = true;
$upload_dir = wp_get_upload_dir();

$city_raw = explode( '_', get_queried_object()->name );


$baseurl = $upload_dir['baseurl'] . '/destinations-pics/';

$parentId = 1;
if ( ! empty( $city_raw[1] ) ) {
    // only take parent [0] if it exists.
	$parentId = viator_getDestinationIDByName( $city_raw[0] );
	$city_raw = $city_raw[1];
} else {
	$city_raw  = $city_raw[0];
}

foreach ( json_decode( get_option( '_viator_dest' ), true ) as $index => $item ) {
	if ( strtolower( $item['destinationUrlName'] ) === strtolower( $city_raw ) ) {
		if ( $item['parentId'] === $parentId || $parentId == 1 ) {
			$city   = $item['destinationUrlName'];
			$is_404 = false;
			break;
		}
	}

}

if ( $is_404 && $city_raw !== 'product' ) {
	get_template_part( '404' );
	die();
}


if ( $city_raw[1] === 'product' ) {
	$baseurl = VIATOR_URL . 'assets/img';
	$city    = 'destinations';
}

$baseurl .= $city;
?>

    <main class="main-wrapper">
        <div class="top-head">
            <div class="top-head__image">
                <img src="<?php echo $baseurl . '/' . $city . '.jpg' ?>" alt="<?php echo $city . ' city'; ?>"
                     onerror="this.src='<?php echo VIATOR_URL . 'assets/img/destinations.jpg' ?>';">
            </div>

            <div class="container">
                <div class="top-head__wrap">
                    <h1 class="top-head__title"><?php echo viator_get_destination( $city, false, carbon_lang_prefix(), 'destinationName' ); ?></h1>

                    <div class="main-banner__form">
        <div class="main-banner__form-col main-banner__form-local">
            <div class="custom-select">
                <input type="text" class="select-local" name="destination"
                       id="searchProducts" data-destinationId=""
                       placeholder="<?php esc_attr_e( 'Search Attractions', 'viator' ); ?>" autocomplete="off">
            </div>
                            <div class="destination-modal-box shadow-lg">
                    <ul id="suggestions" class="list-group list-group-flush">
                        <li class="list-group-item sugges"><?php esc_html_e( 'Start entering text...',
                                'viator' ); ?></li>
                    </ul>
                </div>

        </div>

        <button id="seacrtours" type="submit" class="il-btn il-btn-icon il-btn-main" title="<?php esc_attr_e( 'Find a tour',
            'viator' ); ?>">
            <span class="icon">
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.7938 17.7986L13.6856 12.6903C14.8055 11.3475 15.4814 9.622 15.4814 7.74067C15.4814 3.47239 12.009 0 7.74072 0C3.47242 0 0 3.47239 0 7.74067C0 12.0089 3.47242 15.4813 7.74072 15.4813C9.62207 15.4813 11.3475 14.8054 12.6904 13.6855L17.7987 18.7938C17.9361 18.9312 18.1163 19 18.2963 19C18.4762 19 18.6564 18.9312 18.7938 18.7938C19.0687 18.5188 19.0687 18.0734 18.7938 17.7986ZM1.4074 7.74067C1.4074 4.24857 4.24825 1.40739 7.74072 1.40739C11.2332 1.40739 14.074 4.24857 14.074 7.74067C14.074 11.2328 11.2332 14.0739 7.74072 14.0739C4.24825 14.0739 1.4074 11.2328 1.4074 7.74067Z" fill="white" />
                </svg>
            </span>
            <?php esc_html_e( 'Search', 'viator' ); ?>
        </button>
    </div>



                    <!--                    <div class="d-flex tags">-->
                    <!--                        <a href="#" class="tags__item" title="The United States"><?php esc_html_e( 'The United States',
						'viator' ); ?></a>-->
                    <!--                        <a href="#" class="tags__item" title="The East Coast"><?php esc_html_e( 'The East Coast',
						'viator' ); ?></a>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    <div class="ilmio_container modal_destinations" id="modal_destinations">
        <div class="ilmio_content">
            <div class="ilmio_top_city"><?php esc_html_e( 'Top destinations', 'viator' ); ?></div>

            <div class="ilmio_city_wrap">
                <?php
                $current_language    = pll_current_language();
                $search_destinations = carbon_get_theme_option( 'search_destinations_' . $current_language );
                if ( ! empty( $search_destinations ) ):
                    foreach ( $search_destinations as $key => $destination ):
                        $destination = explode( '|', $destination );
                        ?>
                        <div class="ilmio_city_countent">
                            <div class="ilmio_city">
                                <a href="<?php echo viator_product_url( $destination[0] ); ?>">
                                    <?php echo $destination[1]; ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <div class="ilmio_button_top">
                <a href="<?php echo home_url( $current_language . '/all-destinations' ); ?>">
                    <?php esc_html_e( 'Show all destinations', 'viator' ); ?>
                </a>
            </div>
        </div>
    </div>

        <div class="catalog">
            <div class="container">
                <div class="d-flex catalog__wrap">

                    <div class="catalog__filter">
                        <div class="d-flex d-xl-none il-btn il-btn-border filter-btn js-filter">
							<span class="text-icon">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M15.3751 0H0.625033C0.2798 0 0 0.279786 0 0.625001C0 2.36548 0.746134 4.02711 2.04711 5.18348L4.78444 7.61635C5.25907 8.03823 5.5313 8.64443 5.5313 9.27956V15.3743C5.5313 15.8724 6.08797 16.1709 6.50291 15.8942L10.1905 13.4361C10.3643 13.3201 10.4688 13.125 10.4688 12.916V9.27956C10.4688 8.64443 10.7411 8.03823 11.2157 7.61635L13.9529 5.18348C15.2539 4.02711 16 2.36548 16 0.625001C16 0.279786 15.7202 0 15.3751 0ZM13.1224 4.24916L10.3852 6.68214C9.64395 7.34108 9.21875 8.28774 9.21875 9.27944V12.5816L6.78125 14.2065V9.27956C6.78125 8.28774 6.35605 7.34108 5.6148 6.68214L2.87759 4.24928C2.00035 3.46937 1.44038 2.40076 1.29047 1.24988H14.7095C14.5596 2.40076 13.9998 3.46937 13.1224 4.24916Z" fill="white" />
								</svg>
							</span>
							<?php esc_html_e( 'Filter', 'viator' ); ?>
                        </div>


                                
                        <div class="filter">
                                                       <form name="filterProducts" class="filter__wrap">
                                <div class="d-flex filter__header">
									<span class="filter__header-icon">
										<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M8.00003 8C7.81403 8 7.62785 7.93483 7.48585 7.80467L0.213136 1.13804C-0.0710453 0.877537 -0.0710453 0.455706 0.213136 0.195374C0.497317 -0.064958 0.957498 -0.0651247 1.2415 0.195374L8.00003 6.39068L14.7586 0.195374C15.0428 -0.0651247 15.5029 -0.0651247 15.7869 0.195374C16.0709 0.455873 16.0711 0.877703 15.7869 1.13804L8.51422 7.80467C8.37222 7.93483 8.18603 8 8.00003 8Z" fill="#0C498A" />
										</svg>
									</span>
                                    <div class="d-flex filter__header-text">
										<span class="text-icon">
											<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M15.3751 0H0.625033C0.2798 0 0 0.279786 0 0.625001C0 2.36548 0.746134 4.02711 2.04711 5.18348L4.78444 7.61635C5.25907 8.03823 5.5313 8.64443 5.5313 9.27956V15.3743C5.5313 15.8724 6.08797 16.1709 6.50291 15.8942L10.1905 13.4361C10.3643 13.3201 10.4688 13.125 10.4688 12.916V9.27956C10.4688 8.64443 10.7411 8.03823 11.2157 7.61635L13.9529 5.18348C15.2539 4.02711 16 2.36548 16 0.625001C16 0.279786 15.7202 0 15.3751 0ZM13.1224 4.24916L10.3852 6.68214C9.64395 7.34108 9.21875 8.28774 9.21875 9.27944V12.5816L6.78125 14.2065V9.27956C6.78125 8.28774 6.35605 7.34108 5.6148 6.68214L2.87759 4.24928C2.00035 3.46937 1.44038 2.40076 1.29047 1.24988H14.7095C14.5596 2.40076 13.9998 3.46937 13.1224 4.24916Z" fill="white" />
											</svg>
										</span>
										<?php esc_html_e( 'Filter', 'viator' ); ?>
                                    </div>
                                    <span class="filter__header-icon">
										<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M8.00003 8C7.81403 8 7.62785 7.93483 7.48585 7.80467L0.213136 1.13804C-0.0710453 0.877537 -0.0710453 0.455706 0.213136 0.195374C0.497317 -0.064958 0.957498 -0.0651247 1.2415 0.195374L8.00003 6.39068L14.7586 0.195374C15.0428 -0.0651247 15.5029 -0.0651247 15.7869 0.195374C16.0709 0.455873 16.0711 0.877703 15.7869 1.13804L8.51422 7.80467C8.37222 7.93483 8.18603 8 8.00003 8Z" fill="#0C498A" />
										</svg>
									</span>
                                </div>

                                <div class="filter__body">
                                 
                                    <div class="filter__block">
                                        <h6 class="filter__block-title"><?php esc_html_e( 'Availability',
												'viator' ); ?></h6>

                                        <div class="d-flex flex-wrap filter__availability">
                                            <div class="check-btn">
                                                <input type="radio" class="filter-field-date fieldDateToday" name="filterFieldDate"
                                                       id="fieldDateToday" value="<?php esc_html_e( 'today',
													'viator' ); ?> autocomplete=" off">
                                                <label for="fieldDateToday"><?php esc_html_e( 'Today',
														'viator' ); ?></label>
                                            </div>
                                            <div class="check-btn">
                                                <input type="radio" class="filter-field-date fieldDateTomorrow" name="filterFieldDate"
                                                       id="fieldDateTomorrow" value="<?php esc_html_e( 'tomorrow',
													'viator' ); ?> autocomplete=" off">
                                                <label for="fieldDateTomorrow"><?php esc_html_e( 'Tomorrow',
														'viator' ); ?></label>
                                            </div>
                                            <div class="check-btn">
                                                <input type="radio" class="filter-field-date fieldDateCustom" name="filterFieldDate"
                                                       id="fieldDateCustom" autocomplete="off">
                                                <label for="fieldDateCustom"><?php esc_html_e( 'Dates',
														'viator' ); ?></label>
                                            </div>

                                            <div class="d-none form-date-range">
                                                <input id="fieldDateRange" class="d-none" name="fieldDateRange" autocomplete="off" placeholder="<?php esc_attr_e( 'Choose date',
													'viator' ); ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="filter__block">
                                        <h6 class="filter__block-title"><?php esc_html_e( 'Categories', 'viator' ); ?></h6>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldTag" id="check1" value="11901" autocomplete="off">
                                            <label class="form-check__label" for="check1"><?php esc_html_e( 'Museum Tickets & Passes', 'viator' ); ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldTag" id="check2" value="21516" autocomplete="off">
                                            <label class="form-check__label" for="check2"><?php esc_html_e( 'Shows & Performances', 'viator' ); ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldTag" id="check3" value="12041" autocomplete="off">
                                            <label class="form-check__label" for="check3"><?php esc_html_e( 'Self-guided Tours & Rentals', 'viator' ); ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldTag" id="check4" value="11163" autocomplete="off">
                                            <label class="form-check__label" for="check4"><?php esc_html_e( 'Boat Tours', 'viator' ); ?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldTag" id="check5" value="11235" autocomplete="off">
                                            <label class="form-check__label" for="check5"><?php esc_html_e( 'Zipline & Aerial Adventure Parks', 'viator' ); ?></label>
                                        </div>
                                    </div>

                                    <div class="filter__block">
                                        <h6 class="filter__block-title"><?php esc_html_e( 'Features', 'viator' ); ?></h6>
                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldFlag" value="FREE_CANCELLATION" id="check11" autocomplete="off">
                                            <label class="form-check__label" for="check11"><?php esc_html_e( 'Free cancellation', 'viator' ); ?></label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldFlag" value="SKIP_THE_LINE" id="check12" autocomplete="off">
                                            <label class="form-check__label" for="check12"><?php esc_html_e( 'Skip the line', 'viator' ); ?></label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldFlag" value="PRIVATE_TOUR" id="check13" autocomplete="off">
                                            <label class="form-check__label" for="check13"><?php esc_html_e( 'Private tour', 'viator' ); ?></label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldFlag" value="SPECIAL_OFFER" id="check14" autocomplete="off">
                                            <label class="form-check__label" for="check14"><?php esc_html_e( 'Special offer', 'viator' ); ?></label>
                                        </div>

                                        <div class="form-check">
                                            <input type="checkbox" name="filterFieldFlag" value="LIKELY_TO_SELL_OUT" id="check15" autocomplete="off">
                                            <label class="form-check__label" for="check15"><?php esc_html_e( 'Likely to sell out', 'viator' ); ?></label>
                                        </div>
                                    </div>

                                    <div class="filter__block">
                                        <h6 class="filter__block-title"><?php esc_html_e( 'Price', 'viator' ); ?></h6>
                                        <div class="custom-range-slider">
                                            <input id="range-price" name="filterFieldPrice" type="text" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="filter__footer">
                                    <button id="btnFilterReset" type="reset" class="il-btn il-btn-gray js-cancel-filter" title="<?php esc_attr_e( 'Cancel',
										'viator' ); ?>">
										<?php esc_html_e( 'Cancel', 'viator' ); ?>
                                    </button>
                                    <button id="btnFilterSubmit" type="submit" class="il-btn il-btn-main js-cancel-filter" title="<?php esc_attr_e( 'Apply',
										'viator' ); ?>">
										<?php esc_html_e( 'Apply', 'viator' ); ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="catalog__content" data-destId="">
                        <div class="d-flex catalog__content-top">
                            <p id="newss"><?php esc_html_e( 'We found __ results', 'viator' ); ?></p>

                            <div class="d-flex align-items-center catalog__content-top-btns">
                                <!--                                <a href="#" class="il-btn il-btn-icon il-btn-border js-modal" data-modal-id="modal-map" title="<?php esc_attr_e( 'Map',
									'viator' ); ?>">-->
                                <!--									<span class="icon">-->
                                <!--										<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                <!--											<path d="M16.7238 0.0986367C16.639 0.0434553 16.5417 0.0103309 16.4409 0.00227272C16.3401 -0.00578545 16.2388 0.0114781 16.1464 0.0524948L11.3068 2.20356L5.90689 0.043388C5.83155 0.0132636 5.75092 -0.00145138 5.66979 0.00011282C5.58866 0.00167702 5.50867 0.0194886 5.43454 0.0524948L0.360643 2.30738C0.253289 2.35507 0.162076 2.43288 0.0980624 2.53138C0.0340492 2.62987 -1.49046e-05 2.74482 4.89221e-09 2.86229V16.3928C-1.28345e-05 16.4939 0.0252486 16.5935 0.0734894 16.6824C0.12173 16.7713 0.191421 16.8468 0.276232 16.9019C0.361042 16.957 0.458283 16.9901 0.559122 16.9981C0.65996 17.0061 0.7612 16.9888 0.853643 16.9477L5.69318 14.7966L11.0931 16.9568C11.1685 16.9866 11.2491 17.0012 11.3302 16.9996C11.4113 16.9981 11.4913 16.9804 11.5655 16.9477L16.6394 14.6928C16.7467 14.6451 16.8379 14.5673 16.9019 14.4688C16.966 14.3703 17 14.2554 17 14.1379V0.607412C17 0.506313 16.9747 0.406825 16.9264 0.317978C16.8782 0.22913 16.8085 0.153736 16.7238 0.0986367ZM6.28818 1.50414L10.7118 3.27393V15.4961L6.28818 13.7263V1.50414ZM1.21429 3.25693L5.07389 1.54178V13.7451L1.21429 15.4584V3.25693ZM15.7857 13.7433L11.9261 15.4584V3.25693L15.7857 1.54178V13.7433Z" fill="#0C498A" />-->
                                <!--										</svg>-->
                                <!--									</span>-->
                                <!--                                    Map-->
                                <!--                                </a>-->

                                <div class="catalog__sort">
                                    <select class="select2-sort" data-placeholder="<?php esc_attr_e( 'Sort',
										'viator' ); ?>" autocomplete="off" style="width: 100%">
                                        <option value=""></option>
                                        <option value="default"><?php esc_html_e( 'Default', 'viator' ); ?></option>
                                        <option value="price_low"><?php esc_html_e( 'Price to low',
												'viator' ); ?></option>
                                        <option value="price_up"><?php esc_html_e( 'Price to up',
												'viator' ); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

						<?php //print_r($GLOBALS['wp_the_query']);?>
<div style='display:none;' class='newblock'>

<?php
// Assuming these fields are saved as theme options
$city =  carbon_get_theme_option('voator_category_destination');
$product_id_1 = carbon_get_theme_option('product_id_1');
$product_id_2 = carbon_get_theme_option('product_id_2');
$product_id_3 = carbon_get_theme_option('product_id_3');
$product_id_4 = carbon_get_theme_option('product_id_4');
$product_id_5 = carbon_get_theme_option('product_id_5');
$product_id_6 = carbon_get_theme_option('product_id_6');
$product_id_7 = carbon_get_theme_option('product_id_7');
$product_id_8 = carbon_get_theme_option('product_id_8');

$options = carbon_get_theme_option('crb_slides'); // Replace 'your_option_name' with the actual name of your option

foreach ($options as $slide) {
$ct = $slide['voator_category_destination'];
    $product1 = $slide['product_id_1'];
    $product2 = $slide['product_id_2'];
    $product3 = $slide['product_id_3'];
    $product4 = $slide['product_id_4'];
    $product5 = $slide['product_id_5'];
    $product6 = $slide['product_id_6'];
    $product7 = $slide['product_id_7'];
    $product8 = $slide['product_id_8'];
    echo '<div class="main-categor">';
  echo'<h1 class="main-new">';
    echo $ct;
    echo '</h1>';
    echo '<ul class="listofclass">';
    echo '<li>';
    echo  $product1;
    echo '</li>';
    echo '<li>';
    echo  $product2;
    echo '</li>';
    echo '<li>';
    echo  $product3;
    echo '</li>';
    echo '<li>';
    echo  $product4;
    echo '</li>';
    echo '<li>';
    echo  $product5;
    echo '</li>';
    echo '<li>';
    echo  $product6;
    echo '</li>';
    echo '<li>';
    echo  $product7;
    echo '</li>';
    echo '<li>';
    echo  $product8;
    echo '</li>';
    echo '</ul>';
    echo'</div>';
}

?>

</div>
                  
  

                   <div class="row">
                           <?php for ($i = 0; $i < 100; $i++) {
    echo '<div class="col-sm-6 mb-md-5 mb-4 skeleton-init">
                                <a class="activities-item">
                                    <div class="activities-item__image skeleton-loader"></div>

                                    <div class="activities-item__body">
                                        <div class="activities-item__title skeleton-loader"></div>

                                        <div class="review skeleton-loader"></div>

                                        <p class="activities-item__text skeleton-loader">
                                            <svg
                                                    role="img"
                                                    width="320"
                                                    height="115"
                                                    aria-labelledby="loading-aria"
                                                    viewBox="0 50 476 124"
                                                    preserveAspectRatio="none"
                                            >
                                                <rect
                                                        x="0"
                                                        y="0"
                                                        width="100%"
                                                        height="100%"
                                                        clip-path="url(#clip-path)"
                                                        style="fill: url("#fill");"
                                                ></rect>
                                                <defs>
                                                    <clipPath id="clip-path">
                                                        <rect x="0" y="56" rx="0" ry="0" width="476" height="16" />
                                                        <rect x="0" y="74" rx="0" ry="0" width="440" height="16" />
                                                        <rect x="0" y="92" rx="0" ry="0" width="208" height="16" />
                                                        <rect x="0" y="110" rx="0" ry="0" width="320" height="16" />
                                                    </clipPath>
                                                    <linearGradient id="fill">
                                                        <stop
                                                                offset="0.599964"
                                                                stop-color="#dddbdd"
                                                                stop-opacity="1"
                                                        >
                                                            <animate
                                                                    attributeName="offset"
                                                                    values="-2; -2; 1"
                                                                    keyTimes="0; 0.25; 1"
                                                                    dur="2s"
                                                                    repeatCount="indefinite"
                                                            ></animate>
                                                        </stop>
                                                        <stop
                                                                offset="1.59996"
                                                                stop-color="#ecebeb"
                                                                stop-opacity="1"
                                                        >
                                                            <animate
                                                                    attributeName="offset"
                                                                    values="-1; -1; 2"
                                                                    keyTimes="0; 0.25; 1"
                                                                    dur="2s"
                                                                    repeatCount="indefinite"
                                                            ></animate>
                                                        </stop>
                                                        <stop
                                                                offset="2.59996"
                                                                stop-color="#dddbdd"
                                                                stop-opacity="1"
                                                        >
                                                            <animate
                                                                    attributeName="offset"
                                                                    values="0; 0; 3"
                                                                    keyTimes="0; 0.25; 1"
                                                                    dur="2s"
                                                                    repeatCount="indefinite"
                                                            ></animate>
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </p>
                                    </div>
                                </a>
                            </div>';
                           }
                           ?>

                            

                        </div>
               <div class="pagination"></div>
                    </div>



                </div>
            </div>
        </div>


        <div class="promotional">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-11">
                        <div class="d-flex promotional__wrap">
                            <div class="promotional__title">
                                <h4 class="promotional__title-main">
									<?php _e( ' Do you want to receive <br> current promotional offers?', 'viator' ); ?>
                                </h4>
                                <p class="promotional__title-sub"><?php esc_html_e( 'Subscribe to our newsletter!',
										'viator' ); ?></p>
                            </div>
                            <form class="promotional__form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6">
                                        <div class="custom-form-group">
                                            <input type="email" placeholder="<?php esc_attr_e( 'Enter your Email',
												'viator' ); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-6">
                                        <button type="submit" class="il-bnt w-100 il-btn-white il-btn-icon">
											<span class="icon"><svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M8.02085 16.0805V20.3152C8.02085 20.611 8.21151 20.8731 8.49385 20.9662C8.56443 20.989 8.63685 21 8.70835 21C8.92285 21 9.13001 20.8996 9.26201 20.7206L11.7489 17.3497L8.02085 16.0805Z" fill="#0C498A" />
													<path d="M21.7112 0.126993C21.5004 -0.0218321 21.2236 -0.0419189 20.9944 0.0776893L0.369456 10.8059C0.125624 10.9328 -0.0182925 11.1921 0.0018741 11.4651C0.0229574 11.739 0.205373 11.9728 0.464789 12.0613L6.19852 14.0134L18.4094 3.61389L8.96043 14.9529L18.5698 18.2244C18.6413 18.2481 18.7165 18.2609 18.7916 18.2609C18.9163 18.2609 19.0401 18.2271 19.1491 18.1614C19.3233 18.0554 19.4416 17.8774 19.4718 17.6774L21.9926 0.786208C22.0302 0.530557 21.9221 0.276732 21.7112 0.126993Z" fill="#0C498A" />
												</svg>
											</span>
											<?php esc_html_e( 'Subscribe', 'viator' ); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="il-modal" id="modal-map">
            <div class="il-modal__content">
                <iframe width="100%" height="500" style="display: block; background-color: red; margin: 0;"></iframe>
            </div>
        </div>

    </main>
<script>
//     'use strict';
// import {
// 	getHomeUrl,
// 	updateStorage,
// 	getDestinations,
// 	insertCardProducts,
// } from './functions.js';

// const {__, _x, _n, _nx} = wp.i18n;

// (async function () {
// 	let $dataForSend = {
// 			action: 'get_products_search',
// 			target: 'home',
// 		},
// 		$viatorLang = sessionStorage.getItem('viatorLang'),
// 		$viatorCurrency = localStorage.getItem('viatorCurrency') ?? viatorParameters?.default_currency;

// 	if (!localStorage.getItem('viatorDest') || Date.now() > localStorage.getItem('viatorDestLastUp')) {
// 		$dataForSend['get_destinations'] = true;
// 	}

// 	if (!localStorage.getItem('viatorTags') || Date.now() > localStorage.getItem('viatorTagsLastUp')) {
// 		$dataForSend['get_tags'] = true;
// 	}

// 	if ($viatorLang) {
// 		$dataForSend['language'] = $viatorLang;
// 	}
// 	if ($viatorCurrency) {
// 		$dataForSend['currency'] = $viatorCurrency;
// 	}

// 	try {
// 		let $result = await axios({
// 			method: 'POST',
// 			data: new URLSearchParams($dataForSend),
// 			url: '/wp-admin/admin-ajax.php',
// 		});


// 		$result = $result['data'];
// 		console.log($result, `featured_source: ${viatorParameters?.featured_source}` );

// 		if ($result?.data) {
// 			if ($result?.dest) {
// 				updateStorage($result['dest'], 'Dest');
// 			}
// 			if ($result?.tags) {
// 				updateStorage($result['tags'], 'Tags');
// 			}

// 			insertCardProducts(
// 				document.querySelector('.block-popular .row'),
// 				viatorParameters?.featured_source === 'prod' ? $result?.data : $result?.data?.products,
// 			);
// 		}

// 	} catch (e) {
// 		console.log(e)
// 	}
// }());

// //START main-banner
// (function () {
// 	let $inputDest = document.querySelector('#searchDestination'),
// 		$searchTourBtn = document.querySelector('#searchTourBtn'),
// 		$modal_destinations = document.querySelector('#modal_destinations');

// 	if ($inputDest) {
// 		let $dropdownBox = document.querySelector('.custom-select .destination-modal-box');

// 		$inputDest.addEventListener('click', function (event) {
// 			event.stopPropagation();
// 			$dropdownBox.classList.toggle('active');
// 			$modal_destinations.classList.toggle('active');
// 		});

// 		document.addEventListener("click", function (event) {
// 			if (!$modal_destinations.contains(event.target)) {
// 				$modal_destinations.classList.remove("active");
// 			}
// 		});


// 		$dropdownBox.addEventListener('click', function (evt) {
// 			$inputDest.value = evt.target.textContent;
// 			$inputDest.setAttribute('data-destinationId', evt.target.getAttribute('data-destId'));
// 			$inputDest.setAttribute('data-destinationUrlName', evt.target.getAttribute('data-destinationUrlName'));
// 			$inputDest.setAttribute('data-parent', evt.target.getAttribute('data-parent'));
// 		});

// 		document.querySelector('body').addEventListener('click', function (evt) {
// 			if (evt.target !== $inputDest && $dropdownBox.classList.contains('active')) {
// 				$dropdownBox.classList.remove('active');
// 			}
// 		});

// 		let getDestinationNameByParentId = (data, parentId) => {
// 			for (let i = 0; i < data.length; i++) {
// 				if (data[i]?.destinationId === parentId) {
// 					return {
// 						name : data[i]?.destinationName,
// 						url : data[i]?.destinationUrlName
// 					};
// 				}
// 			}
// 			return '';
// 		}

// 		$inputDest.addEventListener('keyup', function (evt) {
// 			evt.preventDefault();
// 			let $listGroup = $dropdownBox.querySelector('.list-group');

// 			$inputDest.parentNode.classList.remove('error');
// 			$listGroup.innerHTML = '';

// 			if (evt.code === 'Backspace') {
// 				let $li = document.createElement('li');

// 				$li.classList.add('list-group-item');
// 				$li.textContent = __('Start entering text...', 'viator');
// 				$listGroup.insertAdjacentElement('beforeend', $li);
// 				return;
// 			}

// 			let $count = 0,
// 				$q = this.value.toLowerCase(),
// 				$destAll = getDestinations();



// 			for (let $dest of $destAll) {

// 				if ($dest['destinationName'].substring(0, $q.length).toLowerCase() === $q && $count <= 9) {
// 					console.log($dest);

// 					let parent = getDestinationNameByParentId(getDestinations(), $dest['parentId']);

// 					let $li = document.createElement('li');

// 					$li.classList.add('list-group-item');
// 					$li.textContent = parent ? $dest?.destinationName + ', ' + parent.name : $dest?.destinationName;
// 					$li.setAttribute('data-destId', $dest?.destinationId);
// 					$li.setAttribute('data-destinationUrlName', $dest?.destinationUrlName);
// 					$li.setAttribute('data-parent', parent.url);

// 					$listGroup.insertAdjacentElement('beforeend', $li);
// 					$count++;
// 				}

// 				if ($count === 9) {
// 					break;
// 				}
// 			}
// 		});

// 	}

// 	if ($searchTourBtn) {
// 		$searchTourBtn.addEventListener('click', function () {
// 			let $searchTime = document.querySelector('#searchTime').value,
// 				$searchPeople = document.querySelector('#searchPeople').value || '2';

// 			if ($inputDest.value) {
// 				let $lang = '',
// 					//$destName = $inputDest.value.replaceAll(' ', '-');

// 					$destName = $inputDest.getAttribute('data-destinationUrlName'),
// 					$parent = $inputDest.getAttribute('data-parent');

// 				if ($searchTime) {
// 					sessionStorage.setItem('dataFromHome', $searchTime);
// 				}

// 				if (viatorSingleObj?.lang !== viatorSingleObj?.default_lang) {
// 					$lang = viatorSingleObj['lang'] + '/';
// 				}

// 				sessionStorage.setItem('dataCountPeople', $searchPeople);

// 				if ($parent == 'undefined'){
// 					$parent = '';
// 				} else {
// 					$parent = $parent + '_';
// 				}

// 				window.location = `${getHomeUrl()}/${$lang}product-category/${$parent}${$destName}/`;
// 			} else {
// 				$inputDest.parentNode.classList.add('error');
// 			}
// 		});
// 	}

// }());
// //END main-banner

</script>
<?php
get_footer( 'shop' );