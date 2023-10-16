'use strict';
(function () {

  let $bookingref      = '',
      $order_id        = '',
      $body            = document.querySelector('body'),
      $modal_cancel    = document.querySelector('#modal-cancel'),
      $close_modal_btn = document.querySelector('#close_cancel_modal'),
      $cancel_btn      = document.querySelector('#btn_cancel_booking');

  if (!$modal_cancel) return;

  let $temp            = document.querySelector('#modal_cancel_texts'),
      $cancelTxtError  = $temp.content.querySelector('.modal_cancel_txt_error').cloneNode(true),
      $statusAccepted  = $temp.content.querySelector('.modal_cancel_status_accepted').cloneNode(true),
      $statusDeclined  = $temp.content.querySelector('.modal_cancel_status_declined').cloneNode(true),
      $declinedAlready = $temp.content.querySelector('.modal_txt_declined_already').cloneNode(true),
      $declinedNot     = $temp.content.querySelector('.modal_txt_declined_not').cloneNode(true);

  if ($close_modal_btn) {
    $close_modal_btn.addEventListener('click', function (evt) {
      $body.classList.remove('modal-open');
      this.closest('.il-modal').classList.remove('active');
    });
  }

  if ($cancel_btn) {
    $cancel_btn.addEventListener('click', function (evt) {
      let $loading_block = document.createElement('div'),
          $main_block    = this.closest('.il-modal__content');

      $bookingref = this.dataset.bookingref;
      $order_id   = this.dataset.orderid;

      $loading_block.classList.add('blockUI');
      $loading_block.classList.add('loading');

      $main_block.innerHTML = '';

      $main_block.insertAdjacentElement('beforeend', $loading_block);

      wp.ajax.send('cancel_quote', {
        data: {
          'nonce': window.viatorCoreNonce,
          'bookingref': $bookingref,
          'order_id': $order_id,
        },
        success: function (data) {
          console.log('success');
          console.log(data);

          let $template = wp.template('cancelQuote');

          if (data?.type && 'woo' === data?.type) {
            $main_block.style.alignContent = 'center'
            $template = wp.template('cancelQuoteWoo');
          }

          $main_block.innerHTML = '';
          $main_block.insertAdjacentHTML('beforeend', $template(data));
        },
        error: function (data) {
          $main_block.innerHTML = '';
          $main_block.insertAdjacentElement('beforeend', $cancelTxtError);

        },
      });

    });
  }

  $modal_cancel.addEventListener('click', function (evt) {
    for (let target = evt.target; target && target !== this; target = target.parentNode) {
      if (target.matches('.btn_booking_cancel')) {
        let $loading_block = document.createElement('div'),
            $main_block    = this.querySelector('.il-modal__content'),
            $cancelReasons = $main_block.querySelector('.select-cancel-reasons');

        $loading_block.classList.add('blockUI');
        $loading_block.classList.add('loading');

        this.querySelector('.btn_booking_cancel').classList.add('d-none');
        $main_block.insertAdjacentElement('beforeend', $loading_block);

        wp.ajax.send('booking_cancel', {
          data: {
            'nonce': window.viatorCoreNonce,
            'reasonCode': $cancelReasons.value,
            'order_id': $order_id,
            'bookingref': $bookingref,
            'language': sessionStorage.getItem('viatorLang'),
            'init': 'in_my_account',
          },
          success: function (data) {
            console.log('success');
            console.log(data);

            $main_block.innerHTML = '';

            if (data['status'] === 'ACCEPTED') {
              $main_block.insertAdjacentElement('beforeend', $statusAccepted);
            }

            if (data['status'] === 'DECLINED') {
              $main_block.insertAdjacentElement('beforeend', $statusDeclined);

              if (data['reason'] === 'ALREADY_CANCELLED') {
                $main_block.insertAdjacentElement('beforeend', $declinedAlready);
              }
              if (data['reason'] === 'NOT_CANCELLABLE') {
                $main_block.insertAdjacentElement('beforeend', $declinedNot);
              }

              $main_block.innerHTML = $htmlError;
            }

          },
          error: function (data) {
            $main_block.innerHTML = '';
            $main_block.insertAdjacentElement('beforeend', $cancelTxtError);
          },
        });

      }
    }

  });

}());