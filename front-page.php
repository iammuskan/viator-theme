<?php
/**
 * front-page.php
 * create in 14.03.2022
 *
 */

get_header();

$path         = get_template_directory_uri();
$settings     = get_option( 'viator_settings_options_name' );
$current_lang = pll_current_language();
$lang         = '';

if ( pll_current_language() !== pll_default_language() ) {
	$lang = $current_lang . '/';
}

?>
                 <?php
$featured_product_id = carbon_get_theme_option( 'featured_product_id' );

if ( ! empty( $featured_product_id ) ) {
    echo esc_html( $featured_product_id );
}
?>

    <main class="main-wrapper">
        <div class="main-banner">
            <div class="main-banner__image">
				<?php if ( ! $banner_img = carbon_get_theme_option( 'viator_home_banner_image' ) ) {
					$banner_img = $path . '/assets/img/main-banner.jpg';
				} ?>
                <img src="<?php echo $banner_img; ?>" alt="image">
            </div>
            <div class="main-banner__content">
                <div class="container">
                    <p class="main-banner__subtitle"><?php echo carbon_get_theme_option( 'viator_home_banner_subtitle_' . carbon_lang_prefix() ); ?></p>
                    <h1 class="main-banner__title"><?php echo carbon_get_theme_option( 'viator_home_banner_title_' . carbon_lang_prefix() ); ?></h1>
                    <div style="position: relative;">
       

                        <div class="main-banner__form">
                            <div class="main-banner__form-col main-banner__form-local">
                                <div class="custom-select">
                                    <input type="text" class="select-local" name="destination"
                                           id="searchDestination" data-destinationId=""
                                           placeholder="<?php esc_attr_e( 'Where are you travelling to?', 'viator' ); ?>" autocomplete="off">
                                    <div class="destination-modal-box shadow-lg">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?php esc_html_e( 'Start entering text...',
													'viator' ); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="main-banner__form-col main-banner__form-date">
                                <div class="main-banner__form-datepicker">
                                    <input id="searchTime" class="datepicker" placeholder="<?php esc_attr_e( 'Choose date',
										'viator' ); ?>">
                                </div>
                            </div>

                            <div class="main-banner__form-col main-banner__form-count">
                                <input type="number" name="searchPeople" id="searchPeople" min="1" step="1" placeholder="<?php esc_attr_e( 'For how many?',
									'viator' ); ?>">
                            </div>

                            <button id="searchTourBtn" type="submit" class="il-btn il-btn-icon il-btn-main" title="<?php esc_attr_e( 'Find a tour',
								'viator' ); ?>">
							<span class="icon">
								<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M18.7938 17.7986L13.6856 12.6903C14.8055 11.3475 15.4814 9.622 15.4814 7.74067C15.4814 3.47239 12.009 0 7.74072 0C3.47242 0 0 3.47239 0 7.74067C0 12.0089 3.47242 15.4813 7.74072 15.4813C9.62207 15.4813 11.3475 14.8054 12.6904 13.6855L17.7987 18.7938C17.9361 18.9312 18.1163 19 18.2963 19C18.4762 19 18.6564 18.9312 18.7938 18.7938C19.0687 18.5188 19.0687 18.0734 18.7938 17.7986ZM1.4074 7.74067C1.4074 4.24857 4.24825 1.40739 7.74072 1.40739C11.2332 1.40739 14.074 4.24857 14.074 7.74067C14.074 11.2328 11.2332 14.0739 7.74072 14.0739C4.24825 14.0739 1.4074 11.2328 1.4074 7.74067Z" fill="white" />
								</svg>
							</span>
								<?php esc_html_e( 'Search', 'viator' ); ?>
                            </button>
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
                                                <!--											<div class="ilmio_city_item">-->
                                                <!--												--><?php //echo $destination['destinationName'];
												?>
                                                <!--											</div>-->
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
                    </div>

                    <div class="ilmio_container">
                        <div class="ilmio_icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/banner/1.svg">
							<?php esc_html_e( 'The Best Activities', 'viator' ); ?>
                        </div>
                        <div class="ilmio_icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/banner/2.svg">
							<?php esc_html_e( '24/7 Customer Service', 'viator' ); ?>
                        </div>
                        <div class="ilmio_icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/banner/3.svg">
							<?php esc_html_e( 'Thousands of Opinions', 'viator' ); ?>
                        </div>
                        <div class="ilmio_icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/banner/4.svg">
							<?php esc_html_e( 'No Hidden Fees', 'viator' ); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="destination">

			<?php if ( ( $destinations = carbon_get_theme_option( 'viator_home_dest_' . carbon_lang_prefix() ) ) && ! empty( $destinations ) ): ?>
                <div class="container">
                    <h2 class="destination__title"><?php echo carbon_get_theme_option( 'viator_home_dest_title_' . carbon_lang_prefix() ) ?></h2>
                    <div class="destination__list">
                        <div class="row mx-n2 mx-sm-n3">
							<?php foreach ( $destinations as $index => $dest ) :

								$cover = $path . '/assets/img/destinations.jpg';

								if ( $dest['cover'] &&
								     $cover = wp_get_attachment_image_src( $dest['cover'], 'medium' ) ) {
									$cover = $cover[0];
								}

								?>
                                <div class="col-lg-2 col-6 px-2 px-sm-3">
                                    <a href="<?php echo viator_product_url( $dest['dest'] ); ?>" class="destination__item">
                                        <div class="destination__item-image">
                                            <img src="<?php echo $cover; ?>" alt="image">
                                        </div>
                                        <h4 class="destination__item-title"><?php echo $dest['title'] ?></h4>
                                    </a>
                                </div>
							<?php endforeach; ?>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <a href="<?php echo home_url( $current_language . '/all-destinations' ); ?>"
                               class="il-btn il-btn-border w-100" title="<?php esc_attr_e( 'Show more', 'viator' ); ?>">
								<?php echo carbon_get_theme_option( 'viator_home_dest_btn_name_' . carbon_lang_prefix() ); ?>
                            </a>
                        </div>
                    </div>
                </div>
			<?php endif; ?>

        </div>

        <div class="block-popular">
            <div class="container">
                <h2 class="block-popular__title"><?php echo carbon_get_theme_option( 'viator_home_featured_title_' . carbon_lang_prefix() ); ?></h2>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 mb-md-5 mb-4 skeleton-init">
                        <div class="activities-item">
                            <div class="activities-item__image skeleton-loader"></div>

                            <div class="activities-item__body">
                                <div class="activities-item__title skeleton-loader"></div>

                                <div class="review skeleton-loader"></div>

                                <p class="activities-item__text">
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
                                                style='fill: url("#fill");'
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
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4 col-md-5 col-sm-6 mt-md-0 mt-1">
                        <a href="/<?php echo $lang;
						echo carbon_get_theme_option( 'viator_home_featured_link_' . carbon_lang_prefix() ); ?>"
                           class="il-btn il-btn-border w-100"><?php echo carbon_get_theme_option( 'viator_home_featured_name_' . carbon_lang_prefix() ); ?></a>
                    </div>
                </div>
            </div>
        </div>

		<?php if ( $news_id = carbon_get_theme_option( 'viator_home_news_id_' . carbon_lang_prefix() ) ):
			$news_id = (int) $news_id[0]['id'];
			?>
            <div class="block-news">
                <div class="container">
                    <h2 class="block-news__title"><?php echo carbon_get_theme_option( 'viator_home_news_title_' . carbon_lang_prefix() ); ?></h2>
                    <div class="block-news__wrap">
                        <div class="swiper news-slider">
                            <div class="swiper-wrapper">
								<?php $query = new WP_Query( array(
									'post_type'      => 'post',
									'posts_per_page' => '10',
									'cat'            => $news_id,
								) );
								while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <div class="swiper-slide">
                                        <div class="news-item">
                                            <div class="news-item__header">
												<?php
												if ( has_post_thumbnail() ):
													echo get_the_post_thumbnail();
												else:
													echo '<img src="' . $path . '/assets/img/news-image.jpg" alt="image">';
												endif;
												?>
                                            </div>
                                            <div class="news-item__body">
                                                <a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Dinner Cruise on the Seine',
													'viator' ); ?>" class="news-item__title">
													<?php the_title() ?>
                                                </a>
                                                <div class="news-item__date">
											        <span class="news-item__date-icon">
												        <img src="<?php echo $path; ?>/assets/img/icons/icon-clock.svg" alt="icon">
											        </span>
													<?php echo get_post_time( 'd/m/Y' ) ?>
                                                </div>
                                                <p class="news-item__text"><?php echo get_the_excerpt() ?></p>
                                                <a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Read more',
													'viator' ); ?>" class="news-item__more">
													<?php esc_html_e( 'Read more', 'viator' ); ?></a>
                                            </div>
                                        </div>
                                    </div>
								<?php endwhile;
								wp_reset_query();

								?>
                            </div>
                        </div>
                        <div class="swiper-button-prev news-slider-prev">
                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.966174 11.0935C0.966174 10.8541 1.05649 10.6145 1.23688 10.4318L10.476 1.07262C10.8371 0.706912 11.4217 0.706912 11.7825 1.07262C12.1432 1.43833 12.1435 2.03053 11.7825 2.39601L3.19651 11.0935L11.7825 19.791C12.1435 20.1567 12.1435 20.7489 11.7825 21.1144C11.4214 21.4799 10.8368 21.4801 10.476 21.1144L1.23688 11.7552C1.05649 11.5725 0.966174 11.3329 0.966174 11.0935Z" fill="#C0C0C0" />
                            </svg>
                        </div>
                        <div class="swiper-button-next news-slider-next">
                            <svg width="13" height="22" viewBox="0 0 13 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.0338 11.0935C12.0338 10.8541 11.9435 10.6145 11.7631 10.4318L2.52396 1.07262C2.16294 0.706912 1.57833 0.706912 1.21754 1.07262C0.856753 1.43833 0.856522 2.03053 1.21754 2.39601L9.80349 11.0935L1.21754 19.791C0.856523 20.1567 0.856523 20.7489 1.21754 21.1144C1.57856 21.4799 2.16317 21.4801 2.52396 21.1144L11.7631 11.7552C11.9435 11.5725 12.0338 11.3329 12.0338 11.0935Z" fill="#C0C0C0" />
                            </svg>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <a href="<?php echo get_term_link( $news_id ); ?>" class="il-btn il-btn-border w-100">
								<?php echo carbon_get_theme_option( 'viator_home_news_name_' . carbon_lang_prefix() ); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif; ?>

        <div class="main-video">
            <div class="container">
                <h2 class="main-video__title"><?php echo carbon_get_theme_option( 'viator_home_video_title_' . carbon_lang_prefix() ); ?></h2>
                <div class="main-video__wrap">
                    <div class="main-video__body">

                        <div class="main-video__body-content">
							<?php if ( ! $video_cover = carbon_get_theme_option( 'viator_home_video_cover' ) ) {
								$video_cover = $path . '/assets/img/video.jpg';
							} ?>
                            <img src="<?php echo $video_cover; ?>" alt="image">
                        </div>
                        <div class="main-video__body-play js-modal" data-modal-id="modal-video">
                            <img src="<?php echo $path; ?>/assets/img/btn-play.svg" alt="play">
                        </div>

                    </div>
                </div>
            </div>
        </div>

		<?php if ( $faqs = carbon_get_theme_option( 'viator_home_faqs_' . carbon_lang_prefix() ) ): ?>
            <div class="faq">
                <div class="container">
                    <h2 class="faq__title"><?php echo carbon_get_theme_option( 'viator_home_faqs_title_' . carbon_lang_prefix() ); ?></h2>

					<?php foreach ( $faqs as $index => $faq ) : ?>
                        <div class="faq__item">
                            <div class="faq__item-header">
								<?php echo $faq['title']; ?>
                                <span class="faq__item-icon-arrow">
							<svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.00003 8C7.81403 8 7.62785 7.93483 7.48585 7.80467L0.213136 1.13804C-0.0710453 0.877537 -0.0710453 0.455706 0.213136 0.195374C0.497317 -0.064958 0.957498 -0.0651247 1.2415 0.195374L8.00003 6.39068L14.7586 0.195374C15.0428 -0.0651247 15.5029 -0.0651247 15.7869 0.195374C16.0709 0.455873 16.0711 0.877703 15.7869 1.13804L8.51422 7.80467C8.37222 7.93483 8.18603 8 8.00003 8Z" fill="#0C498A" />
							</svg>
						</span>
                            </div>
                            <div class="faq__item-body">
                                <p><?php echo $faq['text']; ?></p>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
            </div>
		<?php endif; ?>

		<?php if ( $partners = carbon_get_theme_option( 'viator_home_partners_' . carbon_lang_prefix() ) ): ?>
            <div class="partners">
                <div class="container">
                    <h2 class="partners__title"><?php echo carbon_get_theme_option( 'viator_home_partners_title_' . carbon_lang_prefix() ); ?></h2>
                    <div class="d-flex partners__list">
						<?php foreach ( $partners as $partner ) : ?>
                            <a href="<?php echo $partner['link']; ?>" class="partners__item" rel="nofollow">
                                <img src="<?php echo $partner['picture']; ?>" alt="partner">
                            </a>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>

        <div class="promotional">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-11">
                        <div class="d-flex promotional__wrap">
                            <div class="promotional__title">
                                <h4 class="promotional__title-main">
									<?php echo carbon_get_theme_option( 'viator_home_subs_title_' . carbon_lang_prefix() ); ?>
                                </h4>
                                <p class="promotional__title-sub">
									<?php echo carbon_get_theme_option( 'viator_home_subs_subtitle_' . carbon_lang_prefix() ); ?>
                                </p>
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

        <div class="il-modal" id="modal-video">
            <div class="il-modal__content">
                <div class="il-modal__video">
                    <iframe id="il_modal_iframe_video" src="<?php echo carbon_get_theme_option( 'viator_home_video_link_' . carbon_lang_prefix() ); ?>"
                            title="<?php esc_attr_e( 'Video player', 'viator' ); ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </main>

<?php
get_footer();
