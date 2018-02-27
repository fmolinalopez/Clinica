function gestionarErrores(input, errores) {
    let errors = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback"><strong> ${error} </strong></div>`);
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
    let formData = new FormData();
    let input = (event.target);
    console.log(input.id);
    console.log(target.value);
    formData.append(input.id, input.value);
    // $(target).parent().next(".spinner").addClass("sk-circle");
    axios.post('/medicos/validar',
        formData
    ).then(function (response) {
        // $(target).parent().next(".spinner").removeClass("sk-circle");
        switch (input.id) {
            case "imagen":
                gestionarErrores(target, response.data.imagen);
                break;
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "especialidad":
                gestionarErrores(target, response.data.especialidad);
                break;
            case "select2-clinicas-result-kzi1-3":
                gestionarErrores(target, response.data.clinicas);
                break;
            case "num_colegiado":
                gestionarErrores(target, response.data.num_colegiado);
                break;
            case "curriculum":
                gestionarErrores(target, response.data.curriculum);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#imagen, #nombre, #email, #especialidad, #clinicas, #num_colegiado, #curriculum").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#crearMedico").click(function (e) {
        e.preventDefault();
        let submit = true;
        let formData = new FormData;
        formData.append('imagen', $("#imagen").val());
        formData.append('nombre', $("#nombre").val());
        formData.append('email', $("#email").val());
        formData.append('especialidad', $("#especialidad").val());
        formData.append('clinicas', $("#clinicas").val());
        formData.append('num_colegiado', $("#num_colegiado").val());
        formData.append('curriculum', $("#curriculum").val());

        axios.post('/medicos/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#imagen", response.data.imagen)) {
                    submit = false;
                }

                if (gestionarErrores("#nombre", response.data.nombre)) {
                    submit = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    submit = false;
                }

                if (gestionarErrores("#especialidad", response.data.especialidad)) {
                    submit = false;
                }

                if (gestionarErrores("#clinicas", response.data.clinicas)) {
                    submit = false;
                }

                if (gestionarErrores("#num_colegiado", response.data.num_colegiado)) {
                    submit = false;
                }

                if (gestionarErrores("#curriculum", response.data.curriculum)) {
                    submit = false;
                }

                if (submit === true){
                    $("#medicoForm").submit();
                }
            });
    });
});