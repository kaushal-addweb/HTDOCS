/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("var multiply = __webpack_require__(/*! ./multiply */ \"./src/multiply.js\");\nvar sum = __webpack_require__(/*! ./sum */ \"./src/sum.js\");\nvar totalMultiply = multiply(5, 3);\nvar totalSum = sum(5, 3);\nconsole.log('Product of 5 and 3 = ' + totalMultiply);\nconsole.log('Sum of 5 and 3 = ' + totalSum);\ndocument.write('Product of 5 and 3 = ' + totalMultiply);\ndocument.write('Sum of 5 and 3 = ' + totalSum);\n\n//# sourceURL=webpack://bundl/./src/index.js?");

/***/ }),

/***/ "./src/multiply.js":
/*!*************************!*\
  !*** ./src/multiply.js ***!
  \*************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

eval("var sum = __webpack_require__(/*! ./sum */ \"./src/sum.js\");\nvar multiply = function(a, b) {\n    var total = 0;\n    for (var i = 0; i < b; i++) {\n        total = sum(a, total);\n    }\n    return total;\n};\nmodule.exports = multiply;\n\n//# sourceURL=webpack://bundl/./src/multiply.js?");

/***/ }),

/***/ "./src/sum.js":
/*!********************!*\
  !*** ./src/sum.js ***!
  \********************/
/***/ ((module) => {

eval("var sum = function(a, b) {\n    return a + b;\n};\nmodule.exports = sum;\n\n//# sourceURL=webpack://bundl/./src/sum.js?");

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
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/index.js");
/******/ 	
/******/ })()
;