function gestionarErrores(input, error) {
    let errors = false;
    input = $(input);
    errorDiv = $(".errors");
    input.removeClass("is-invalid");
    input.removeClass("is-valid");
    console.log(error);
    errorDiv.empty();
    if (typeof error !== typeof undefined) {
        input.addClass("is-invalid");
        input.nextAll(".valid-feedback").remove();
        errorDiv.append(error);

        errors = true;
    } else {
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
    $(".spinner").prop("hidden", false);
    $("#sendMessage").prop("hidden", true);
    axios.post('/message/validar',
        formData
    ).then(function (response) {
        $(".spinner").prop("hidden", true);
        $("#sendMessage").prop("hidden", false);
        switch (input.id) {
            case "content":
                gestionarErrores(target, response.data.content);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#content").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#sendMessage").click(function (e) {
        e.preventDefault();
        let submit = true;
        let formData = new FormData;
        formData.append('content', $("#content").val());

        axios.post('/message/validar', formData)
            .then(function (response) {
                if (gestionarErrores("#content", response.data.content)) {
                    submit = false;
                }

                if (submit === true){
                    $("#messageForm").submit();
                }
            }).catch(function (error){console.log(error)});
    });
});