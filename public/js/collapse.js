function mostrar() {
    $("#elemento1").collapse("show");
    $("#elemento2").collapse("show");
}

function ocultar() {
    $("#elemento1").collapse("hide");
    $("#elemento2").collapse("hide");
}

function toogle() {
    $("#elemento1").collapse("toggle");
    $("#elemento2").collapse("toggle");
}

$(function() {
    $('#test').on('click', function () {
        mostrar();
    });

    $('#elemento1').on('show.bs.collapse', function () {
        alert("Se va a mostrar el elemento");
    })

    $('#elemento1').on('shown.bs.collapse', function (e) {
        alert("Se ha mostrado el elemento");
    })

    $('#elemento1').on('hide.bs.collapse', function (e) {
        alert("Se va a ocultar el elemento");
    })

    $('#elemento1').on('hidden.bs.collapse', function (e) {
        alert("Se va ha ocultado el elemento");
    })
});