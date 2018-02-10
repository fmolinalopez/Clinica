function obtenerMedicosClinica(){
    let idClinica = $(event.target).val();

    console.log("id Clinica: " + idClinica);

    axios.get(`/obtenerMedicosClinica/${idClinica}`)
        .then(function(response){
            $("#app").html(response.data);
            asociarEventosClinicaMedico();
        }).catch(function (error) {
        console.log(error);
    });
}

function obtenerCitasMedico() {
    let idMedico = $(event.target).val();

    console.log("id Medico: " + idMedico);
    cargarDatetimepicker();
    $('.hora').removeAttr("hidden");
    $('#pedirCita').removeAttr("hidden");
    $("#datetimepicker").on("blur", validarFecha);
}

function validarFecha() {
    let myHeaders = new Headers();
    myHeaders.append("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
    let form = new FormData();
    let idMedico = $('#medicos').val();
    let fecha = $(event.target).val();
    console.log("fecha: " + fecha);
    form.append("fecha", fecha);
    form.append("idMedico", idMedico);

    let configuracion = {
        method: 'POST',
        headers: myHeaders,
        body: form,
        credentials: "same-origin"
    };
    fetch(`cita/validar`, configuracion)
    .then(function (response) {return response.json();})
    .then(function (data) {
        $('#pedirCita').removeClass("btn-primary btn-danger");
        console.log(data);
        if (data.length === 0) {
            $('#pedirCita').prop("disabled", false);
            $('#pedirCita').addClass("btn-primary");
            $('#alertFecha').attr("hidden", true);
        }else{
            $('#pedirCita').prop("disabled", true);
            $('#pedirCita').addClass("btn-danger");
            $('#alertFecha').removeAttr("hidden");
        }
    }).catch(function (err) {
        console.log("error: " + err);
    });
}

function asociarEventoClinica(){
    $(".selectClinicas").on("change",obtenerMedicosClinica);
}

function asociarEventosClinicaMedico(){
    $(".selectClinicas").on("change",obtenerMedicosClinica);
    $(".selectMedicos").on("change",obtenerCitasMedico);
}

$(function(){
    asociarEventoClinica();
});

function cargarHoras() {
    let times = [];

    for (let i = 0, num = 8; i < 13; i++){
        if (num < 10){
            times.push(`0${num}:00`);
            times.push(`0${num}:15`);
            times.push(`0${num}:30`);
            times.push(`0${num}:45`);
        }else {
            times.push(`${num}:00`);
            times.push(`${num}:15`);
            times.push(`${num}:30`);
            times.push(`${num}:45`);
        }
        num++;
    }

    return times;
}

function cargarDatetimepicker(){
    jQuery('#datetimepicker').datetimepicker({
        // beforeShowDay: function () {
        //     let Highlight = new Date('2018-02-22');
        //     return [true, "Highlited", Highlight]
        // },
        timepicker:true,
        formatDate:'Y/m/d',
        formatTime:'H:i',
        minDate:'+1970/01/02',//yesterday is minimum date(for today use 0 or -1970/01/01)
        maxDate:'+1970/04/01',//tomorrow is maximum date calendar
        allowTimes:cargarHoras()
    });
}