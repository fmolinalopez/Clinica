function obtenerMedicosClinica(){
    console.log("test");

    let idClinica = $(event.target).val();

    console.log(idClinica);

    axios.get(`/obtenerMedicosClinica/${idClinica}`)
        .then(function(response){
            $("#app").html(response.data);
            asociarEventoAsincrono();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $(".clinicas").on("change",obtenerMedicosClinica);
}

$(function(){
    asociarEventoAsincrono();
});