/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

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
/*!*******************************************************!*\
  !*** ./assets/js/gutenberg-src/block-animation-in.js ***!
  \*******************************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


function addHeadingAttribute(settings, name) {
  if (typeof settings.attributes !== 'undefined') {
    settings.attributes = Object.assign(settings.attributes, {
      animationIn: {
        type: 'boolean'
      },
      animationInType: {
        type: 'string',
        default: 'top'
      }
    });
  }

  return settings;
}

wp.hooks.addFilter('blocks.registerBlockType', 'beflex/heading-custom-attribute', addHeadingAttribute);
const headingAdvancedControls = wp.compose.createHigherOrderComponent(BlockEdit => {
  return props => {
    const {
      Fragment,
      useState
    } = wp.element;
    const {
      ToggleControl
    } = wp.components;
    const {
      RadioControl
    } = wp.components;
    const {
      InspectorAdvancedControls
    } = wp.blockEditor;
    const {
      attributes,
      setAttributes,
      isSelected
    } = props;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), isSelected && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorAdvancedControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ToggleControl, {
      label: wp.i18n.__('Display IN animation', 'beflex-child'),
      help: attributes.animationIn ? 'Display IN animation' : 'No animation',
      checked: !!attributes.animationIn,
      onChange: newval => setAttributes({
        animationIn: !attributes.animationIn
      })
    }), attributes.animationIn && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
      label: wp.i18n.__('Animation type', 'beflex-child'),
      selected: attributes.animationInType,
      help: 'Choose the type of animation',
      options: [{
        label: 'Top',
        value: 'top'
      }, {
        label: 'Right',
        value: 'right'
      }, {
        label: 'Bottom',
        value: 'bot'
      }, {
        label: 'Left',
        value: 'left'
      }, {
        label: 'Zoom In',
        value: 'scalein'
      }, {
        label: 'Zoom Out',
        value: 'scaleout'
      }],
      onChange: option => {
        setAttributes({
          animationInType: option
        });
      }
    })));
  };
}, 'headingAdvancedControls');
wp.hooks.addFilter('editor.BlockEdit', 'beflex/heading-advanced-control', headingAdvancedControls);

function headingApplyExtraClass(extraProps, blockType, attributes) {
  const {
    animationIn,
    animationInType
  } = attributes;
  let className = extraProps.className != undefined ? extraProps.className : '';

  if (typeof animationIn !== 'undefined' && animationIn) {
    className += ' bf-block-animatein';

    if (animationInType) {
      className += ' bf-block-animatein--type-' + animationInType;
    }
  }

  extraProps.className = className;
  return extraProps;
}

wp.hooks.addFilter('blocks.getSaveContent.extraProps', 'beflex/heading-apply-class', headingApplyExtraClass);
}();
/******/ })()
;
//# sourceMappingURL=block-animation-in.js.map