function obtenerDatosPagina(){
    event.preventDefault();

    let enlace = $(event.target);
    let valor = parseInt(enlace.text());

    console.log("obteniendo datos");

    $(event.target).addClass("active");
    axios.get('/obtenerPaginaMedicos?page='+valor)
        .then(function(response){
            $("#listado").html(response.data);
            asociarEventoAsincrono();
        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono(){
    $(".pagination > li > a").on("click",obtenerDatosPagina);
}

$(function(){
    asociarEventoAsincrono();
});