<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */


status_header( 200 );
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
$path = get_template_directory_uri();

?>

    <main class="main-wrapper">

        <div class="excursion">
            <div class="container">

                <div class="d-flex excursion__wrap skeleton-init">
                    <div class="d-flex excursion__slider">
                        <div class="excursion__slider-main skeleton-loader"></div>
                        <div class="excursion__slider-second skeleton-loader"></div>
                    </div>

                    <div class="excursion__content">
                        <div class="d-flex tags">
                            <div class="tags__item skeleton-loader"></div>
                            <div class="tags__item skeleton-loader"></div>
                            <div class="tags__item skeleton-loader"></div>
                        </div>

                        <h2 class="excursion__title skeleton-loader"></h2>

                        <div class="row align-items-center excursion__info">
                            <div class="col-xl-5 col-sm-6">
                                <div class="review skeleton-loader"></div>
                            </div>

                            
                        </div>

                        <div class="row align-items-center excursion__info">
                            <div class="col-xl-5 col-sm-6">
                                <div class="d-flex align-items-center excursion__duration skeleton-loader"></div>
                            </div>

                            <div class="col-xl-5 col-sm-6">
                                <div class="d-flex align-items-center excursion__info_item skeleton-loader"></div>
                            </div>
                        </div>

                        <div class="excursion__description">
                            <svg
                                    role="img"
                                    width="680"
                                    height="320"
                                    aria-labelledby="loading-aria"
                                    viewBox="0 50 476 320"
                                    preserveAspectRatio="none"
                            >
                                <rect
                                        x="0"
                                        y="0"
                                        width="100%"
                                        height="100%"
                                        clip-path="url(#clip-path)"
                                        style='fill: url("#fill");'
                                ></rect>
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect x="0" y="50" rx="0" ry="0" width="476" height="20" />
                                        <rect x="0" y="74" rx="0" ry="0" width="440" height="20" />
                                        <rect x="0" y="98" rx="0" ry="0" width="308" height="20" />
                                        <rect x="0" y="122" rx="0" ry="0" width="320" height="20" />
                                        <rect x="0" y="146" rx="0" ry="0" width="420" height="20" />
                                        <rect x="0" y="170" rx="0" ry="0" width="280" height="20" />
                                        <rect x="0" y="194" rx="0" ry="0" width="220" height="20" />
                                        <rect x="0" y="218" rx="0" ry="0" width="290" height="20" />
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
                        </div>
                    </div>

                    <div class="excursion__aside">
                        <div class="aside-date-loaded skeleton-init skeleton-loader"></div>

                        <div class="aside-date d-none">
                            <div class="close-date-btn">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 30 30" width="60px" height="60px">    <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"/></svg>
                            </div>

                            <div class="aside-date__fix">
                                <div class="aside-date__fix-btn js-choose-date"><?php esc_html_e( 'Choose date & booking', 'viator' ); ?></div>
                            </div>

                            <div class="aside-date__header"><?php esc_html_e( 'Choose date & book', 'viator' ); ?></div>

                            <div class="aside-date__body">
                                <div class="aside-date__calendar">
                                    <input class="aside-datepicker">
                                </div>

                                <div class="aside-date__select-people"></div>

<!--                                <div class="aside-date__form">-->
<!--                                    <div class="row mx-n2">-->
<!---->
<!--                                        <div class="col-6 px-2">-->
<!--                                            <div class="aside-date__form-datepicker active">-->
<!--                                                <button type="button" class="btn form-btn-tab" role="button">-->
<!--													--><?php //esc_html_e( 'Choose date', 'viator' ); ?>
<!--                                                </button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="col-6 px-2">-->
<!--                                            <div class="aside-date__form-people">-->
<!--                                                <button type="button" class="btn form-btn-tab" role="button">-->
<!--													--><?php //esc_html_e( 'For how many?', 'viator' ); ?>
<!--                                                </button>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="d-flex aside-date__footer">
                                    <div class="aside-date__total">
                                        <span class="aside-date__total-from"><?php esc_html_e( 'From', 'viator' ); ?></span>
                                        <span class="aside-date__total-price"></span>
                                    </div>
                                    <a class="il-btn il-btn-main"><?php esc_html_e( 'Booking', 'viator' ); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Similar events -->
        <div class="block-popular">
            <div class="container">
                <h2 class="block-popular__title"><?php esc_html_e( 'Similar events', 'viator' ); ?></h2>
                <div class="new-row"></div>

                <div class="row"></div>
            </div>
        </div>
        <!-- Similar events -->

        <!-- Subscribe -->
        <div class="promotional">
            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-xl-11">
                        <div class="d-flex promotional__wrap">
                            <div class="promotional__title">
                                <h4 class="promotional__title-main">
									<?php _e( 'Do you want to receive <br> current promotional offers?', 'viator' ); ?>
                                </h4>
                                <p class="promotional__title-sub"><?php esc_html_e( 'Subscribe to our newsletter!', 'viator' ); ?></p>
                            </div>
                            <form class="promotional__form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6">
                                        <div class="custom-form-group">
                                            <input type="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'viator' ); ?>">
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
        <!-- Subscribe -->

        <div class="il-modal" id="modal-booking">
            <div class="il-modal__content" style="text-align: center;">
                <p><?php esc_html_e( 'Sorry, this date is sold out.', 'viator' ); ?></p>
            </div>
        </div>

    </main>

<?php
get_footer( 'shop' );
