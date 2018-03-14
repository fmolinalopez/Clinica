function calcularEdad() {
    let birthdate = new Date(document.getElementById("birthdate").value);
    let today = new Date();

    let timeDiff = Math.abs(today.getTime() - birthdate.getTime());
    let age = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;

    let dniDiv = $("#dniDiv");
    // let dniField = document.getElementById("dni");
    dniDiv.empty();
    if (age > 14){
        axios.get('/cargarDni').then(function (response) {
            // $(target).parent().next(".spinner").removeClass("sk-circle");
            dniDiv.append(response.data)
        }).catch(function (error) {
            console.log(error);
        });
        // dniDiv.hidden = false;
        // dniField.required = true;
    } else {
        // dniDiv.hidden = true;
        // dniField.required = false;
    }
}