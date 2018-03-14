function mostrarModal(id){
    $("#borrarProfile").modal('show');
}

function cerrarModal(id){
    $("#borrarProfile").modal('hide');
}

$(function() {
    $('#btnDeleteUser').on('click', mostrarModal);
    $('#back').on("click", cerrarModal)
});