<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
$lang = pll_current_language() ?? 'en';

?>
    <p>
		<?php
		printf(
		/* translators: 1: order number 2: order date 3: order status */
			esc_html__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
			'<mark class="order-number">' . $order->get_order_number() . '</mark>',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
		?>
    </p>

<?php if ( $notes ) : ?>
    <h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>
    <ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
            <li class="woocommerce-OrderUpdate comment note">
                <div class="woocommerce-OrderUpdate-inner comment_container">
                    <div class="woocommerce-OrderUpdate-text comment-text">
                        <p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia',
								'woocommerce' ),
								strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                        <div class="woocommerce-OrderUpdate-description description">
							<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </li>
		<?php endforeach; ?>
    </ol>
<?php endif; ?>
<?php

/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();
$total                 = 0;

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}

?>

    <section class="woocommerce-order-details">
		<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

        <div style="display: flex; justify-content:space-between; align-items:center;">
            <h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h2>

			<?php if ( $order->get_status() !== 'refunded' ): ?>
                <button class="btn btn-light js-modal" type="button" title="<?php esc_html_e( 'Cancel order', 'woocommerce' ); ?>" data-modal-id="modal-cancel">
	                <?php esc_html_e( 'cancel', 'viator' ); ?>
                </button>
			<?php endif; ?>
        </div>

        <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

            <thead>
            <tr>
                <th class="woocommerce-table__product-name product-name"><?php esc_html_e( 'Product',
						'woocommerce' ); ?></th>
                <th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Total',
						'woocommerce' ); ?></th>
            </tr>
            </thead>

            <tbody>
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();

                if ($item_data = $item->get_data()){
                    $total = $item_data['total'] ?: 0;
                }

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order'              => $order,
						'item_id'            => $item_id,
						'item'               => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'      => $product ? $product->get_purchase_note() : '',
						'product'            => $product,
					)
				);
			}

			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
            </tbody>

            <tfoot>
			<?php
			foreach ( $order->get_order_item_totals() as $key => $order_total ) { ?>
                <tr>
                    <th scope="row"><?php echo esc_html( $order_total['label'] ); ?></th>
                    <td><?php echo ( 'payment_method' === $key ) ? esc_html( $order_total['value'] ) : wp_kses_post( $order_total['value'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
                </tr>
				<?php
			}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
                <tr>
                    <th><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
                    <td><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></td>
                </tr>
			<?php endif; ?>
            </tfoot>
        </table>

		<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
    </section>

    <div class="il-modal il-modal__cancel" id="modal-cancel">
        <div class="il-modal__content">
            <h2 class="text-center mb-1">
                <?php esc_html_e( get_option( '_modal_title_' . $lang ) ? : 'Are you sure?', 'viator' ); ?>
            </h2>

            <div class="col-12 mb-1"><?php esc_html_e( get_option( '_modal_txt_' . $lang  ) ? : '', 'viator' ); ?></div>

            <div class="col cancel-btn-group active">
                <button id="close_cancel_modal" class="btn btn-success mr-2" type="button" aria-label="Close">
					<?php esc_html_e( get_option( '_modal_btn_no_' .  $lang ) ? : 'No', 'viator' ); ?>
                </button>
                <button id="btn_cancel_booking" class="btn btn-warning" type="button"
                        data-bookingRef="<?php echo get_post_meta( $order_id, '_bookingRef', true ); ?>"
                        data-orderid="<?php echo $order_id; ?>">
					<?php esc_html_e( get_option( '_modal_btn_yes_' .  $lang ) ? : 'Yes', 'viator' ); ?>
                </button>
            </div>

        </div>

        <template id="modal_cancel_texts">
            <sntong class="modal_cancel_txt_error">
                <?php esc_html_e( get_option( '_modal_txt_error_'. $lang  ) ? : 'Sorry an error occurred', 'viator' ); ?>
            </sntong>

            <p class="modal_cancel_status_accepted">
                <?php echo __( get_option( '_modal_txt_accepted_' . $lang  ) ? : 'The cancellation was <b>successful</b>, you will receive a refund soon.', 'viator' ); ?>
            </p>

            <p class="modal_cancel_status_declined">
                <?php esc_html_e( get_option( '_modal_txt_declined_' . $lang  ) ? : 'The cancellation was <b>failed</b>.', 'viator' ); ?>
            </p>

            <p class="modal_txt_declined_already">
                <?php esc_html_e( get_option( '_modal_txt_declined_already_' . $lang  ) ? : 'The booking has already been cancelled', 'viator' ); ?>
            </p>

            <p class="modal_txt_declined_not">
                <?php esc_html_e( get_option( '_modal_txt_declined_not_'. $lang  ) ? : 'The booking cannot be canceled because the product start time was in the past', 'viator' ); ?>
            </p>
        </template>
    </div>

    <script type="text/html" id="tmpl-cancelQuoteWoo">
        <p><?php echo __( 'This product requires manual administrator cancellation.', 'viator' )?></p>

        <# if ( data.send_mail == true ) { #>
        <p style="padding: 0 10%;"><?php echo __( 'The letter has been sent to the administrator, please wait for confirmation.', 'viator' )?></p>
        <# } #>

        <# if ( data.send_mail == false ) { #>
        <p style="padding: 0 10%;"><?php echo __( 'The letter was not sent, try again later or send a request to this address yourself.', 'viator' )?></p>
        <# } #>
    </script>


    <script type="text/html" id="tmpl-cancelQuote">
        <# if ( data.status == 'CANCELLABLE' ) { #>
        <strong>
            <?php esc_html_e( get_option( '_modal_txt_canceled_'. $lang  ) ? : 'This booking is available to be cancelled', 'viator' ); ?>
        </strong>
        <# } #>

        <# if ( data.status == 'CANCELLED' ) { #>
        <strong>
            <?php esc_html_e( get_option( '_modal_txt_been_canceled_'. $lang  ) ? : 'This booking has already been cancelled', 'viator' ); ?>
        </strong>
        <# } #>

        <# if ( data.status == 'NOT_CANCELLABLE' ) { #>
        <strong>
            <?php esc_html_e( get_option( '_modal_txt_not_canceled_'. $lang  ) ? : 'This booking cannot be cancelled (because the product\'s start time was in the past)', 'viator' ); ?>
        </strong>
        <# } #>

        <# if ( data.refundDetails ) { #>
        <p class="mb-0 "><!--refund-total-->
            <?php esc_html_e( get_option( '_modal_txt_amount_'. $lang  ) ? : 'The amount that will be returned to you', 'viator' ); ?>
            <b><?php echo "{$order->get_total()} {$order->get_currency()}"?></b>
        </p>

        <label class="col-12 text-center">
            <span class="d-block mb-1">
                <?php esc_html_e( get_option( '_modal_txt_reason_'. $lang  ) ? : 'You need to choose the reason for refusal', 'viator' ); ?>
            </span>
            <select name="cancel_reasons" class="select-cancel-reasons">
				<?php


				if ( ! $json_cancel_reasons = get_option( '_viator_cancel_reasons_' . $lang ) ) {
					$json_cancel_reasons = get_option( '_viator_cancel_reasons_en' );
					$cancel_reasons      = json_decode( $json_cancel_reasons, true );
				}

				$cancel_reasons = json_decode( $json_cancel_reasons, true );

				foreach ( $cancel_reasons['reasons'] as $index => $reason ) {
					echo '<option value="' . $reason['cancellationReasonCode'] . '">' . $reason['cancellationReasonText'] . '</option>';
				}
				?>
            </select>
        </label>

        <div style="text-align:center;">
            <button class="btn btn-success btn_booking_cancel"><?php esc_html_e( get_option( '_modal_btn_agree_' .  $lang ) ? : 'I agree',
					'viator' ); ?></button>
        </div>
        <# } #>
    </script>


<?php
/**
 * Action hook fired after the order details.
 *
 * @param  WC_Order  $order  Order data.
 *
 * @since 4.4.0
 */
do_action( 'woocommerce_after_order_details', $order );

if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
