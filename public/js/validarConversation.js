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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 66);
/******/ })
/************************************************************************/
/******/ ({

/***/ 66:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(67);


/***/ }),

/***/ 67:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionarErrores(input, error) {
    var errors = false;
    input = $(input);
    errorDiv = $(".errors");
    input.removeClass("is-invalid");
    input.removeClass("is-valid");
    console.log(error);
    errorDiv.empty();
    if ((typeof error === "undefined" ? "undefined" : _typeof(error)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        errorDiv.append(error);

        errors = true;
    } else {
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    console.log(errors);
    return errors;
}

function validateTarget(target) {
    var formData = new FormData();
    var input = event.target;
    console.log("input id: " + input.id);
    console.log(target.value);
    formData.append(input.id, input.value);
    $(".spinner").prop("hidden", false);
    $("#sendMessage").prop("hidden", true);
    axios.post('/message/validar', formData).then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#sendMessage").prop("hidden", false);
        switch (input.id) {
            case "content":
                gestionarErrores(target, response.data.content);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#content").on('change', function (e) {
        validateTarget(e.target);
    });

    $("#sendMessage").click(function (e) {
        e.preventDefault();
        var submit = true;
        var formData = new FormData();
        formData.append('content', $("#content").val());

        axios.post('/message/validar', formData).then(function (response) {
            if (gestionarErrores("#content", response.data.content)) {
                submit = false;
            }

            if (submit === true) {
                $("#messageForm").submit();
            }
        }).catch(function (error) {
            console.log(error);
        });
    });
});

/***/ })

/******/ });