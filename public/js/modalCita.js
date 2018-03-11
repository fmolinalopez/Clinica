function mostrarModal(id){
    $("#cancelarCita").modal('show');
}

function cerrarModal(id){
    $("#cancelarCita").modal('hide');
}

$(function() {
    $('#btnCancelar').on('click', mostrarModal);
    $('#back').on("click", cerrarModal)
});