function calcularEdad() {
    let birthdate = new Date(document.getElementById("birthdate").value);
    let today = new Date();

    let timeDiff = Math.abs(today.getTime() - birthdate.getTime());
    let age = Math.ceil(timeDiff / (1000 * 3600 * 24)) / 365;

    let dniDiv = document.getElementById("dniDiv");
    let dniField = document.getElementById("dni");
    if (age > 14){
        dniDiv.hidden = false;
        dniField.required = true;
    } else {
        dniDiv.hidden = true;
        dniField.required = false;
    }
}