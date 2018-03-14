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
/******/ 	return __webpack_require__(__webpack_require__.s = 51);
/******/ })
/************************************************************************/
/******/ ({

/***/ 51:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(52);


/***/ }),

/***/ 52:
/***/ (function(module, exports) {

function obtenerDatosPersonales() {
    $("#editButton").on("click", enviarFormulario);
    elegir('personal');
    $(".spinner").prop("hidden", false);
    $("#editButton").prop("hidden", true);
    axios.get("/profile/personal").then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#editButton").prop("hidden", false);
        $("#chosenInfo").empty();
        $("#chosenInfo").append(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

function obtenerDatosCuenta() {
    $("#editButton").on("click", enviarFormulario);
    elegir('account');
    $(".spinner").prop("hidden", false);
    $("#editButton").prop("hidden", true);
    axios.get("/profile/account").then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#editButton").prop("hidden", false);
        $("#chosenInfo").empty();
        $("#chosenInfo").append(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

function obtenerDatosAvatar() {
    $("#editButton").on("click", enviarFormulario);
    elegir('avatar');
    $(".spinner").prop("hidden", false);
    $("#editButton").prop("hidden", true);
    axios.get("/profile/avatar").then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#editButton").prop("hidden", false);
        $("#chosenInfo").empty();
        $("#chosenInfo").append(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

function obtenerDatosAdicionales() {
    $("#editButton").on("click", enviarFormulario);
    elegir('additional');
    $(".spinner").prop("hidden", false);
    $("#editButton").prop("hidden", true);
    axios.get("/profile/additional").then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#editButton").prop("hidden", false);
        $("#chosenInfo").empty();
        $("#chosenInfo").append(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

function elegir(elegido) {
    $("#personal").removeClass("bg-light");
    $("#account").removeClass("bg-light");
    $("#avatar").removeClass("bg-light");
    $("#additional").removeClass("bg-light");
    switch (elegido) {
        case 'personal':
            $("#personal").addClass("bg-light");
            break;
        case 'account':
            $("#account").addClass("bg-light");
            break;
        case 'avatar':
            $("#avatar").addClass("bg-light");
            break;
        case 'additional':
            $("#additional").addClass("bg-light");
            break;
    }
}

function asociarEventoPerfil() {
    $("#personal").on("click", obtenerDatosPersonales);
    $("#account").on("click", obtenerDatosCuenta);
    $("#avatar").on("click", obtenerDatosAvatar);
    $("#additional").on("click", obtenerDatosAdicionales);
}

$(function () {
    asociarEventoPerfil();
});

function enviarFormulario() {
    console.log("test");
    $("#editForm").submit();
}

/***/ })

/******/ });