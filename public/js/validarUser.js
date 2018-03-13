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
    console.log("input id: " + input.id);
    console.log(target.value);
    formData.append(input.id, input.value);
    // $(target).parent().next(".spinner").addClass("sk-circle");
    axios.post('/user/register/validar',
        formData
    ).then(function (response) {
        // $(target).parent().next(".spinner").removeClass("sk-circle");
        switch (input.id) {
            case "name":
                gestionarErrores(target, response.data.name);
                break;
            case "lastName":
                gestionarErrores(target, response.data.lastName);
                break;
            case "userName":
                gestionarErrores(target, response.data.userName);
                break;
            case "email":
                gestionarErrores(target, response.data.email);
                break;
            case "num_sanitario":
                gestionarErrores(target, response.data.num_sanitario);
                break;
            case "birthdate":
                gestionarErrores(target, response.data.birthdate);
                break;
            case "dni":
                gestionarErrores(target, response.data.dni);
                break;
            case "movil":
                gestionarErrores(target, response.data.movil);
                break;
            case "num_colegiado":
                gestionarErrores(target, response.data.num_colegiado);
                break;
            case "especialidad":
                gestionarErrores(target, response.data.especialidad);
                break;
            case "curriculum":
                gestionarErrores(target, response.data.curriculum);
                break;
            case "password":
                gestionarErrores(target, response.data.password);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#name, #lastName, #email, #userName, #num_sanitario, #birthdate, #dni, #movil, #num_colegiado, #especialidad, #curriculum, #password").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#btnRegister").click(function (e) {
        e.preventDefault();
        let submit = true;
        let formData = new FormData;
        formData.append('name', $("#name").val());
        formData.append('lastName', $("#lastName").val());
        formData.append('userName', $("#userName").val());
        formData.append('email', $("#email").val());
        formData.append('num_sanitario', $("#num_sanitario").val());
        formData.append('birthdate', $("#birthdate").val());
        formData.append('dni', $("#dni").val());
        formData.append('movil', $("#movil").val());
        formData.append('num_colegiado', $("#num_colegiado").val());
        formData.append('especialidad', $("#especialidad").val());
        formData.append('curriculum', $("#curriculum").val());
        formData.append('password', $("#password").val());

        axios.post('/medicos/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#name", response.data.name)) {
                    submit = false;
                }

                if (gestionarErrores("#lastName", response.data.lastName)) {
                    submit = false;
                }

                if (gestionarErrores("#userName", response.data.userName)) {
                    submit = false;
                }

                if (gestionarErrores("#email", response.data.email)) {
                    submit = false;
                }

                if (gestionarErrores("#num_sanitario", response.data.num_sanitario)) {
                    submit = false;
                }

                if (gestionarErrores("#birthdate", response.data.birthdate)) {
                    submit = false;
                }

                if (gestionarErrores("#dni", response.data.dni)) {
                    submit = false;
                }

                if (gestionarErrores("#movil", response.data.movil)) {
                    submit = false;
                }

                if (gestionarErrores("#num_colegiado", response.data.num_colegiado)) {
                    submit = false;
                }

                if (gestionarErrores("#curriculum", response.data.curriculum)) {
                    submit = false;
                }

                if (gestionarErrores("#password", response.data.password)) {
                    submit = false;
                }

                if (submit === true){
                    $("#medicoForm").submit();
                }
            });
    });
});