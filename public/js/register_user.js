/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backoffice/register_user.js":
/*!**************************************************!*\
  !*** ./resources/js/backoffice/register_user.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// funzione per aggiungere una checkbox alla selezione tipologia ristorante
document.querySelector('#add_new_rest_type').addEventListener('click', function () {
  var checkboxContainer = document.querySelector('#checkbox_container');
  var inputNewType = document.querySelector('#new_rest_type');
  var typeName = inputNewType.value;

  if (typeName == undefined || typeName == '') {
    return null;
  }

  var newId = +checkboxContainer.lastElementChild.id + 1;
  var checkboxTemplate = "\n    <div id=\"".concat(newId, "\" class=\"custom-control custom-checkbox\">\n      <input name=\"new_restaurant_type[]\" value=\"").concat(typeName, "\" type=\"checkbox\" \n          class=\"checkbox custom-control-input\" id=\"type-").concat(newId, "\">\n      <label class=\"custom-control-label\" for=\"type-").concat(newId, "\">\n          ").concat(typeName, "\n      </label>\n    </div>\n  ");
  checkboxContainer.insertAdjacentHTML('beforeend', checkboxTemplate);
  inputNewType.value = ''; // aggiungo listeners per evitare che vengano selezionate più di 2 checkbox 

  preventInvalidSelection(); // scrolla in fondo

  checkboxContainer.scrollTop = checkboxContainer.scrollHeight;
}); // funzione che conta le checkbox selezionate

var countSelectedCheckbox = function countSelectedCheckbox() {
  var checkboxList = document.querySelectorAll('#checkbox_container .checkbox');
  var counter = 0;
  checkboxList.forEach(function (elm) {
    if (elm.checked) {
      counter++;
    }
  });
  return counter;
}; // blocco la possibilità di selezionare più di 2 checkbox


var preventInvalidSelection = function preventInvalidSelection() {
  var checkboxList = document.querySelectorAll('#checkbox_container .checkbox');
  checkboxList.forEach(function (elm) {
    elm.addEventListener('click', function (e) {
      if (countSelectedCheckbox() > 2) {
        e.preventDefault();
      }
    });
  });
};

preventInvalidSelection();

/***/ }),

/***/ 3:
/*!********************************************************!*\
  !*** multi ./resources/js/backoffice/register_user.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/emanuela/Desktop/Boolean/team-7-deliveboo/resources/js/backoffice/register_user.js */"./resources/js/backoffice/register_user.js");


/***/ })

/******/ });