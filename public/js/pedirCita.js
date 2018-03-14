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
/******/ 	return __webpack_require__(__webpack_require__.s = 59);
/******/ })
/************************************************************************/
/******/ ({

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(60);


/***/ }),

/***/ 60:
/***/ (function(module, exports) {

function obtenerMedicosClinica() {

    // $('#spinner').show();
    var idClinica = $(event.target).val();

    console.log("id Clinica: " + idClinica);

    axios.get("/obtenerMedicosClinica/" + idClinica).then(function (response) {
        $('#spinner').show();
        $("#selectMedico").empty();
        $("#selectMedico").append(response.data);
        asociarEventosClinicaMedico();
    }).catch(function (error) {
        console.log(error);
    });
}

function obtenerCitasMedico() {
    var idMedico = $(event.target).val();

    console.log("id Medico: " + idMedico);
    cargarDatetimepicker();
    $('.hora').removeAttr("hidden");
    $('#pedirCita').removeAttr("hidden");
}

function validarFecha() {
    var myHeaders = new Headers();
    myHeaders.append("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
    var form = new FormData();
    var idMedico = $('#medicos').val();
    var fecha = $('#datetimepicker').val();
    console.log("fecha: " + fecha);
    form.append("fecha", fecha);
    form.append("idMedico", idMedico);

    var configuracion = {
        method: 'POST',
        headers: myHeaders,
        body: form,
        credentials: "same-origin"
    };
    fetch("cita/validar", configuracion).then(function (response) {
        return response.json();
    }).then(function (data) {
        $('#pedirCita').removeClass("btn-primary btn-danger");
        console.log(data);
        if (data.length === 0) {
            $('#pedirCita').prop("disabled", false);
            $('#pedirCita').addClass("btn-primary");
            $('#alertFecha').attr("hidden", true);
        } else {
            $('#pedirCita').prop("disabled", true);
            $('#pedirCita').addClass("btn-danger");
            $('#alertFecha').removeAttr("hidden");
        }
    }).catch(function (err) {
        console.log("error: " + err);
    });
}

function asociarEventoClinica() {
    $(".selectClinicas").on("change", obtenerMedicosClinica);
}

function asociarEventosClinicaMedico() {
    $(".selectClinicas").on("change", obtenerMedicosClinica);
    $(".selectMedicos").on("change", obtenerCitasMedico);
}

$(function () {
    asociarEventoClinica();
});

function cargarHoras() {
    var times = [];

    for (var i = 0, num = 8; i < 13; i++) {
        if (num < 10) {
            times.push("0" + num + ":00");
            times.push("0" + num + ":15");
            times.push("0" + num + ":30");
            times.push("0" + num + ":45");
        } else {
            times.push(num + ":00");
            times.push(num + ":15");
            times.push(num + ":30");
            times.push(num + ":45");
        }
        num++;
    }

    return times;
}

function cargarDatetimepicker() {
    jQuery('#datetimepicker').datetimepicker({
        // beforeShowDay: function () {
        //     let Highlight = new Date('2018-02-22');
        //     return [true, "Highlited", Highlight]
        // },
        timepicker: true,
        formatDate: 'Y/m/d',
        formatTime: 'H:i',
        minDate: '+1970/01/02', //yesterday is minimum date(for today use 0 or -1970/01/01)
        maxDate: '+1970/04/01', //tomorrow is maximum date calendar
        allowTimes: cargarHoras(),
        closeOnWithoutClick: true,
        onClose: function onClose() {
            console.log("test");
            validarFecha();
        }
    });
}

/***/ })

/******/ });