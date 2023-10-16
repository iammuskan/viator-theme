/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blocks/payment/index.js":
/*!*************************************!*\
  !*** ./src/blocks/payment/index.js ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Payment Block
 */
const {
  __
} = wp.i18n;
const {
  registerBlockType
} = wp.blocks;
const {
  Fragment
} = wp.element;
const {
  RichText,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
  MediaPlaceholder,
  ColorPaletteControl
} = wp.blockEditor;
const {
  Placeholder,
  TextControl,
  RangeControl,
  ToggleControl,
  TextareaControl,
  PanelBody,
  PanelRow,
  Button,
  ResponsiveWrapper,
  SelectControl,
  CheckboxControl,
  ColorPicker,
  ColorPalette,
  Modal,
  Icon,
  IconButton,
  Tooltip,
  FontSizePicker,
  FormTokenField
} = wp.components;
registerBlockType('creationgutenbergs/payment', {
  title: __('Payment', 'creationgutenbergs'),
  description: __('Display a card with heading and description', 'creationgutenbergs'),
  icon: 'money-alt',
  category: 'viator-blocks',
  attributes: {
    headTitle: {
      type: 'string',
      default: 'Payment methods'
    },
    description: {
      type: 'string',
      source: 'html',
      selector: '.demo-card__content'
    }
  },
  edit: props => {
    const {
      attributes,
      setAttributes,
      className
    } = props;
    const $linkSite = window.location.origin;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('General', 'creationgutenbergs'),
      initialOpen: true
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: "An id or another selector",
      help: "You can use an id, lass or another css selector.",
      value: attributes.headTitle,
      onChange: value => setAttributes({
        headTitle: value
      })
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "col-lg-7 footer__info-col"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
      className: "footer__info-title"
    }, attributes.headTitle), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "d-flex payment"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/visa-icon.svg',
      alt: "test"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/master-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/paypal-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/diners-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/discover-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/applepay-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/googlepay-icon.svg',
      alt: "logo"
    })))));
  },
  save: props => {
    const {
      attributes,
      className
    } = props;
    const $linkSite = window.location.origin;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "col-lg-7 footer__info-col"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
      className: "footer__info-title"
    }, attributes.headTitle), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "d-flex payment"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/visa-icon.svg',
      alt: "test"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/master-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/paypal-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/diners-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/discover-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/applepay-icon.svg',
      alt: "logo"
    })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "payment__item"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: $linkSite + '/wp-content/themes/viator/assets/img/googlepay-icon.svg',
      alt: "logo"
    })))));
  }
});

/***/ }),

/***/ "./src/blocks/social/index.js":
/*!************************************!*\
  !*** ./src/blocks/social/index.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Social Follow Block
 */
const {
  __
} = wp.i18n;
const {
  registerBlockType
} = wp.blocks;
const {
  Fragment
} = wp.element;
const {
  RichText,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
  MediaPlaceholder,
  ColorPaletteControl
} = wp.blockEditor;
const {
  Placeholder,
  TextControl,
  RangeControl,
  ToggleControl,
  TextareaControl,
  PanelBody,
  PanelRow,
  Button,
  ResponsiveWrapper,
  SelectControl,
  CheckboxControl,
  ColorPicker,
  ColorPalette,
  Modal,
  Icon,
  IconButton,
  Tooltip,
  FontSizePicker,
  FormTokenField
} = wp.components;
registerBlockType('creationgutenbergs/social', {
  title: __('Social Follow', 'creationgutenbergs'),
  description: __('Display a card with heading and description', 'creationgutenbergs'),
  icon: 'share',
  category: 'viator-blocks',
  attributes: {
    headTitle: {
      type: 'string',
      default: 'Follow us'
    },
    description: {
      type: 'string',
      source: 'html',
      selector: '.demo-card__content'
    }
  },
  edit: props => {
    const {
      attributes,
      setAttributes,
      className
    } = props;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
      title: __('General', 'creationgutenbergs'),
      initialOpen: true
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(TextControl, {
      label: "Set Title",
      value: attributes.headTitle,
      onChange: value => setAttributes({
        headTitle: value
      })
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "col-lg-5"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
      className: "footer__info-title"
    }, attributes.headTitle), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "d-flex soc"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item facebook",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "13",
      height: "25",
      viewBox: "0 0 13 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M8.43881 25V13.5972H12.2701L12.8449 9.15195H8.43881V6.31434C8.43881 5.02775 8.79512 4.15095 10.6448 4.15095L13 4.14999V0.174037C12.5927 0.121182 11.1946 0 9.56729 0C6.16927 0 3.84292 2.07121 3.84292 5.87409V9.15195H0V13.5972H3.84292V25H8.43881Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item twitter",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "30",
      height: "25",
      viewBox: "0 0 30 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M30 2.95699C28.875 3.45622 27.7125 3.80184 26.475 3.95545C27.75 3.1874 28.725 1.95853 29.175 0.46083C27.975 1.19048 26.6625 1.68971 25.275 1.99693C24.15 0.768049 22.5375 0 20.775 0C17.3625 0 14.625 2.84178 14.625 6.298C14.625 6.79724 14.6625 7.25806 14.775 7.71889C9.675 7.48848 5.175 4.95392 2.1375 1.15207C-0.0374998 5.14593 2.4 8.44854 4.0125 9.56221C3.0375 9.56221 2.0625 9.25499 1.2375 8.79416C1.2375 11.9048 3.375 14.4777 6.15 15.0538C5.55 15.2458 4.2 15.361 3.375 15.169C4.1625 17.6651 6.45 19.5084 9.1125 19.5469C7.0125 21.2366 3.9375 22.5806 0 22.1582C2.7375 23.9631 5.9625 25 9.45 25C20.775 25 26.925 15.3994 26.925 7.10445C26.925 6.83564 26.925 6.56682 26.8875 6.298C28.1625 5.33794 29.2125 4.22427 30 2.95699Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item linkedin",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "25",
      height: "25",
      viewBox: "0 0 25 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M25 25V15.8438C25 11.3438 24.0312 7.90625 18.7812 7.90625C16.25 7.90625 14.5625 9.28125 13.875 10.5938H13.8125V8.3125H8.84375V25H14.0312V16.7188C14.0312 14.5312 14.4375 12.4375 17.125 12.4375C19.7813 12.4375 19.8125 14.9062 19.8125 16.8438V24.9688H25V25Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M0.40625 8.3125H5.59375V25H0.40625V8.3125Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M3 0C1.34375 0 0 1.34375 0 3C0 4.65625 1.34375 6.03125 3 6.03125C4.65625 6.03125 6 4.65625 6 3C6 1.34375 4.65625 0 3 0Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "gfdgfd",
      className: "soc__item instagram",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "26",
      height: "26",
      viewBox: "0 0 26 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M18.962 0H7.03796C3.15717 0 0 3.15717 0 7.03796V18.9622C0 22.8428 3.15717 26 7.03796 26H18.9622C22.8428 26 26 22.8428 26 18.9622V7.03796C26 3.15717 22.8428 0 18.962 0ZM13 20.1092C9.07993 20.1092 5.89082 16.9201 5.89082 13C5.89082 9.07993 9.07993 5.89082 13 5.89082C16.9201 5.89082 20.1092 9.07993 20.1092 13C20.1092 16.9201 16.9201 20.1092 13 20.1092ZM20.2792 7.5674C19.1207 7.5674 18.1785 6.62517 18.1785 5.46672C18.1785 4.30827 19.1207 3.36584 20.2792 3.36584C21.4376 3.36584 22.3801 4.30827 22.3801 5.46672C22.3801 6.62517 21.4376 7.5674 20.2792 7.5674Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M13 7.41505C9.92059 7.41505 7.41505 9.92039 7.41505 13C7.41505 16.0794 9.92059 18.5849 13 18.5849C16.0796 18.5849 18.5849 16.0794 18.5849 13C18.5849 9.92039 16.0796 7.41505 13 7.41505Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M20.2792 4.89027C19.9614 4.89027 19.7027 5.14894 19.7027 5.46672C19.7027 5.7845 19.9614 6.04317 20.2792 6.04317C20.5972 6.04317 20.8558 5.7847 20.8558 5.46672C20.8558 5.14874 20.5972 4.89027 20.2792 4.89027Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item piterest",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "21",
      height: "26",
      viewBox: "0 0 21 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M10.8516 0C3.76619 0.00108335 0 4.5674 0 9.54647C0 11.8551 1.28268 14.7357 3.33648 15.649C3.92235 15.9144 3.84481 15.5905 4.34884 13.6513C4.38869 13.4899 4.36822 13.3501 4.23899 13.1995C1.30314 9.78372 3.66603 2.76146 10.4327 2.76146C20.2257 2.76146 18.3959 16.3921 12.1365 16.3921C10.5232 16.3921 9.32125 15.1181 9.70142 13.5419C10.1624 11.6644 11.0649 9.64614 11.0649 8.29303C11.0649 4.88265 6.01385 5.38858 6.01385 9.90722C6.01385 11.3037 6.50495 12.2462 6.50495 12.2462C6.50495 12.2462 4.87979 18.8503 4.57823 20.0842C4.06775 22.1729 4.64716 25.554 4.69778 25.8454C4.72901 26.0058 4.90779 26.0567 5.00795 25.9245C5.16842 25.7133 7.13283 22.8944 7.68316 20.8566C7.88348 20.1145 8.70522 17.1028 8.70522 17.1028C9.24694 18.0865 10.8086 18.9099 12.4725 18.9099C17.4223 18.9099 21 14.5331 21 9.1023C20.9828 3.89572 16.5532 0 10.8516 0Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item tiktok",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "22",
      height: "26",
      viewBox: "0 0 22 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M21.9882 6.51005C20.5569 6.51005 19.2363 6.01772 18.1759 5.18718C16.9596 4.23509 16.0858 2.83848 15.7772 1.22877C15.7008 0.831048 15.6596 0.42061 15.6557 0H11.5671L11.5622 17.954C11.5622 19.6527 10.4969 21.0931 9.02003 21.5996C8.59143 21.7466 8.12854 21.8163 7.64655 21.7888C7.03133 21.7537 6.4548 21.561 5.95371 21.2497C4.88736 20.5875 4.16437 19.3862 4.14478 18.012C4.11392 15.8642 5.78619 14.1131 7.85326 14.1131C8.26128 14.1131 8.65315 14.1822 9.02003 14.3079V9.9975C8.63306 9.93799 8.23924 9.90697 7.84101 9.90697C5.5785 9.90697 3.46245 10.8835 1.94987 12.6427C0.806612 13.9722 0.120855 15.6684 0.0150521 17.4469C-0.123569 19.7834 0.69983 22.0045 2.29666 23.6432C2.53129 23.8837 2.77767 24.107 3.03532 24.313C4.40439 25.407 6.07813 26 7.84101 26C8.23924 26 8.63306 25.9695 9.02003 25.91C10.6668 25.6567 12.1863 24.874 13.3854 23.6432C14.8588 22.1311 15.6729 20.1237 15.6817 17.987L15.6606 8.49866C16.3635 9.06168 17.132 9.52755 17.9569 9.88917C19.2398 10.4512 20.6 10.736 21.9999 10.7355V6.50903C22.0009 6.51005 21.9892 6.51005 21.9882 6.51005Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item youtube",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "36",
      height: "26",
      viewBox: "0 0 36 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M35.2583 4.06838C34.8434 2.47752 33.6275 1.22346 32.0854 0.79509C29.2683 0 17.9996 0 17.9996 0C17.9996 0 6.73134 0 3.91422 0.764946C2.40184 1.19286 1.1562 2.47774 0.741359 4.06838C0 6.97404 0 13 0 13C0 13 0 19.0563 0.741359 21.9316C1.15664 23.5223 2.37217 24.7763 3.91444 25.2047C6.761 26 18 26 18 26C18 26 29.2683 26 32.0854 25.2351C33.6277 24.8069 34.8434 23.5529 35.2587 21.9622C35.9999 19.0563 35.9999 13.0306 35.9999 13.0306C35.9999 13.0306 36.0295 6.97404 35.2583 4.06838ZM14.4119 18.567V7.43301L23.7824 13L14.4119 18.567Z",
      fill: "#6E6E6E"
    }))))));
  },
  save: props => {
    const {
      attributes,
      className
    } = props;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "col-lg-5"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h5", {
      className: "footer__info-title"
    }, attributes.headTitle), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "d-flex soc"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item facebook",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "13",
      height: "25",
      viewBox: "0 0 13 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M8.43881 25V13.5972H12.2701L12.8449 9.15195H8.43881V6.31434C8.43881 5.02775 8.79512 4.15095 10.6448 4.15095L13 4.14999V0.174037C12.5927 0.121182 11.1946 0 9.56729 0C6.16927 0 3.84292 2.07121 3.84292 5.87409V9.15195H0V13.5972H3.84292V25H8.43881Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item twitter",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "30",
      height: "25",
      viewBox: "0 0 30 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M30 2.95699C28.875 3.45622 27.7125 3.80184 26.475 3.95545C27.75 3.1874 28.725 1.95853 29.175 0.46083C27.975 1.19048 26.6625 1.68971 25.275 1.99693C24.15 0.768049 22.5375 0 20.775 0C17.3625 0 14.625 2.84178 14.625 6.298C14.625 6.79724 14.6625 7.25806 14.775 7.71889C9.675 7.48848 5.175 4.95392 2.1375 1.15207C-0.0374998 5.14593 2.4 8.44854 4.0125 9.56221C3.0375 9.56221 2.0625 9.25499 1.2375 8.79416C1.2375 11.9048 3.375 14.4777 6.15 15.0538C5.55 15.2458 4.2 15.361 3.375 15.169C4.1625 17.6651 6.45 19.5084 9.1125 19.5469C7.0125 21.2366 3.9375 22.5806 0 22.1582C2.7375 23.9631 5.9625 25 9.45 25C20.775 25 26.925 15.3994 26.925 7.10445C26.925 6.83564 26.925 6.56682 26.8875 6.298C28.1625 5.33794 29.2125 4.22427 30 2.95699Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item linkedin",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "25",
      height: "25",
      viewBox: "0 0 25 25",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M25 25V15.8438C25 11.3438 24.0312 7.90625 18.7812 7.90625C16.25 7.90625 14.5625 9.28125 13.875 10.5938H13.8125V8.3125H8.84375V25H14.0312V16.7188C14.0312 14.5312 14.4375 12.4375 17.125 12.4375C19.7813 12.4375 19.8125 14.9062 19.8125 16.8438V24.9688H25V25Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M0.40625 8.3125H5.59375V25H0.40625V8.3125Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M3 0C1.34375 0 0 1.34375 0 3C0 4.65625 1.34375 6.03125 3 6.03125C4.65625 6.03125 6 4.65625 6 3C6 1.34375 4.65625 0 3 0Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item instagram",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "26",
      height: "26",
      viewBox: "0 0 26 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M18.962 0H7.03796C3.15717 0 0 3.15717 0 7.03796V18.9622C0 22.8428 3.15717 26 7.03796 26H18.9622C22.8428 26 26 22.8428 26 18.9622V7.03796C26 3.15717 22.8428 0 18.962 0ZM13 20.1092C9.07993 20.1092 5.89082 16.9201 5.89082 13C5.89082 9.07993 9.07993 5.89082 13 5.89082C16.9201 5.89082 20.1092 9.07993 20.1092 13C20.1092 16.9201 16.9201 20.1092 13 20.1092ZM20.2792 7.5674C19.1207 7.5674 18.1785 6.62517 18.1785 5.46672C18.1785 4.30827 19.1207 3.36584 20.2792 3.36584C21.4376 3.36584 22.3801 4.30827 22.3801 5.46672C22.3801 6.62517 21.4376 7.5674 20.2792 7.5674Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M13 7.41505C9.92059 7.41505 7.41505 9.92039 7.41505 13C7.41505 16.0794 9.92059 18.5849 13 18.5849C16.0796 18.5849 18.5849 16.0794 18.5849 13C18.5849 9.92039 16.0796 7.41505 13 7.41505Z",
      fill: "#6E6E6E"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M20.2792 4.89027C19.9614 4.89027 19.7027 5.14894 19.7027 5.46672C19.7027 5.7845 19.9614 6.04317 20.2792 6.04317C20.5972 6.04317 20.8558 5.7847 20.8558 5.46672C20.8558 5.14874 20.5972 4.89027 20.2792 4.89027Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item piterest",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "21",
      height: "26",
      viewBox: "0 0 21 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M10.8516 0C3.76619 0.00108335 0 4.5674 0 9.54647C0 11.8551 1.28268 14.7357 3.33648 15.649C3.92235 15.9144 3.84481 15.5905 4.34884 13.6513C4.38869 13.4899 4.36822 13.3501 4.23899 13.1995C1.30314 9.78372 3.66603 2.76146 10.4327 2.76146C20.2257 2.76146 18.3959 16.3921 12.1365 16.3921C10.5232 16.3921 9.32125 15.1181 9.70142 13.5419C10.1624 11.6644 11.0649 9.64614 11.0649 8.29303C11.0649 4.88265 6.01385 5.38858 6.01385 9.90722C6.01385 11.3037 6.50495 12.2462 6.50495 12.2462C6.50495 12.2462 4.87979 18.8503 4.57823 20.0842C4.06775 22.1729 4.64716 25.554 4.69778 25.8454C4.72901 26.0058 4.90779 26.0567 5.00795 25.9245C5.16842 25.7133 7.13283 22.8944 7.68316 20.8566C7.88348 20.1145 8.70522 17.1028 8.70522 17.1028C9.24694 18.0865 10.8086 18.9099 12.4725 18.9099C17.4223 18.9099 21 14.5331 21 9.1023C20.9828 3.89572 16.5532 0 10.8516 0Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item tiktok",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "22",
      height: "26",
      viewBox: "0 0 22 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M21.9882 6.51005C20.5569 6.51005 19.2363 6.01772 18.1759 5.18718C16.9596 4.23509 16.0858 2.83848 15.7772 1.22877C15.7008 0.831048 15.6596 0.42061 15.6557 0H11.5671L11.5622 17.954C11.5622 19.6527 10.4969 21.0931 9.02003 21.5996C8.59143 21.7466 8.12854 21.8163 7.64655 21.7888C7.03133 21.7537 6.4548 21.561 5.95371 21.2497C4.88736 20.5875 4.16437 19.3862 4.14478 18.012C4.11392 15.8642 5.78619 14.1131 7.85326 14.1131C8.26128 14.1131 8.65315 14.1822 9.02003 14.3079V9.9975C8.63306 9.93799 8.23924 9.90697 7.84101 9.90697C5.5785 9.90697 3.46245 10.8835 1.94987 12.6427C0.806612 13.9722 0.120855 15.6684 0.0150521 17.4469C-0.123569 19.7834 0.69983 22.0045 2.29666 23.6432C2.53129 23.8837 2.77767 24.107 3.03532 24.313C4.40439 25.407 6.07813 26 7.84101 26C8.23924 26 8.63306 25.9695 9.02003 25.91C10.6668 25.6567 12.1863 24.874 13.3854 23.6432C14.8588 22.1311 15.6729 20.1237 15.6817 17.987L15.6606 8.49866C16.3635 9.06168 17.132 9.52755 17.9569 9.88917C19.2398 10.4512 20.6 10.736 21.9999 10.7355V6.50903C22.0009 6.51005 21.9892 6.51005 21.9882 6.51005Z",
      fill: "#6E6E6E"
    }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: "#",
      className: "soc__item youtube",
      title: ""
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
      width: "36",
      height: "26",
      viewBox: "0 0 36 26",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
      d: "M35.2583 4.06838C34.8434 2.47752 33.6275 1.22346 32.0854 0.79509C29.2683 0 17.9996 0 17.9996 0C17.9996 0 6.73134 0 3.91422 0.764946C2.40184 1.19286 1.1562 2.47774 0.741359 4.06838C0 6.97404 0 13 0 13C0 13 0 19.0563 0.741359 21.9316C1.15664 23.5223 2.37217 24.7763 3.91444 25.2047C6.761 26 18 26 18 26C18 26 29.2683 26 32.0854 25.2351C33.6277 24.8069 34.8434 23.5529 35.2587 21.9622C35.9999 19.0563 35.9999 13.0306 35.9999 13.0306C35.9999 13.0306 36.0295 6.97404 35.2583 4.06838ZM14.4119 18.567V7.43301L23.7824 13L14.4119 18.567Z",
      fill: "#6E6E6E"
    }))))));
  }
});

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_payment__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/payment */ "./src/blocks/payment/index.js");
/* harmony import */ var _blocks_social__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/social */ "./src/blocks/social/index.js");


}();
/******/ })()
;
//# sourceMappingURL=index.js.map