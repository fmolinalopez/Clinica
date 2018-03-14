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
/******/ 	return __webpack_require__(__webpack_require__.s = 65);
/******/ })
/************************************************************************/
/******/ ({

/***/ 65:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(66);


/***/ }),

/***/ 66:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionarErrores(input, errores) {
    var errors = false;
    input = $(input);
    input.next().empty();
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\"><strong> " + error + " </strong></div>");
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        errors = true;
    } else {
        input.removeClass("is-invalid");
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
    $(target).parent().next(".spinner").prop("hidden", false);
    axios.post('/register/validar', formData).then(function (response) {
        $(target).parent().next(".spinner").prop("hidden", true);
        switch (input.id) {
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "lastName":
                gestionarErrores(target, response.data.lastName);
                break;
            case "userName":
                gestionarErrores(target, response.data.userName);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "num_sanitario":
                gestionarErrores(target, response.data.num_sanitario);
                break;
            case "birthdate":
                gestionarErrores(target, response.data.birthdate);
                break;
            case "dni":
                gestionarErrores(target, response.data.dni);
                break;
            case "movil":
                gestionarErrores(target, response.data.movil);
                break;
            case "num_colegiado":
                gestionarErrores(target, response.data.num_colegiado);
                break;
            case "especialidad":
                gestionarErrores(target, response.data.especialidad);
                break;
            case "curriculum":
                gestionarErrores(target, response.data.curriculum);
                break;
            case "password":
                gestionarErrores(target, response.data.password);
                break;
            case "password_confirmation":
                gestionarErrores(target, response.data.password_confirmation);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#name, #lastName, #email, #userName, #num_sanitario, #birthdate, #dni, #movil, #num_colegiado, #especialidad, #curriculum, #password, #password_confirmation").on('change', function (e) {
        validateTarget(e.target);
    });

    $(".btnRegister").click(function (e) {
        e.preventDefault();
        var submit = true;
        var formData = new FormData();
        formData.append('name', $("#name").val());
        formData.append('lastName', $("#lastName").val());
        formData.append('userName', $("#userName").val());
        formData.append('email', $("#email").val());
        formData.append('num_sanitario', $("#num_sanitario").val());
        formData.append('birthdate', $("#birthdate").val());
        formData.append('dni', $("#dni").val());
        formData.append('movil', $("#movil").val());
        formData.append('num_colegiado', $("#num_colegiado").val());
        formData.append('especialidad', $("#especialidad").val());
        formData.append('curriculum', $("#curriculum").val());
        formData.append('password', $("#password").val());
        formData.append('password_confirmation', $("#password_confirmation").val());

        axios.post('/register/validar', formData).then(function (response) {
            if (gestionarErrores("#name", response.data.name)) {
                submit = false;
            }

            if (gestionarErrores("#lastName", response.data.lastName)) {
                submit = false;
            }

            if (gestionarErrores("#userName", response.data.userName)) {
                submit = false;
            }

            if (gestionarErrores("#email", response.data.email)) {
                submit = false;
            }

            if (gestionarErrores("#num_sanitario", response.data.num_sanitario)) {
                submit = false;
            }

            if (gestionarErrores("#birthdate", response.data.birthdate)) {
                submit = false;
            }

            if (gestionarErrores("#dni", response.data.dni)) {
                submit = false;
            }

            if (gestionarErrores("#movil", response.data.movil)) {
                submit = false;
            }

            if (gestionarErrores("#num_colegiado", response.data.num_colegiado)) {
                submit = false;
            }

            if (gestionarErrores("#especialidad", response.data.especialidad)) {
                submit = false;
            }

            if (gestionarErrores("#curriculum", response.data.curriculum)) {
                submit = false;
            }

            if (gestionarErrores("#password", response.data.password)) {
                submit = false;
            }

            if (gestionarErrores("#password_confirmation", response.data.password_confirmation)) {
                submit = false;
            }

            if (submit === true) {
                $(".registerForm").submit();
            }
        });
    });
});

/***/ })

/******/ });