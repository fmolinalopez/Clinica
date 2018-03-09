function mostrarInfoLoginUsuario() {
    $("#cardUser").removeClass("col-lg-6");
    $("#cardUser").removeClass("col-lg-4");
    $("#cardMedico").removeClass("col-lg-6");
    $("#cardMedico").removeClass("col-lg-8");
    $("#cardUser").addClass("col-lg-8");
    $("#cardMedico").addClass("col-lg-4");
    $("#medicoCollapse").collapse("hide");
    $("#userCollapse").collapse("toggle");
}

function mostrarInfoLoginMedico() {
    $("#cardUser").removeClass("col-lg-6");
    $("#cardUser").removeClass("col-lg-8");
    $("#cardMedico").removeClass("col-lg-6");
    $("#cardMedico").removeClass("col-lg-4");
    $("#cardUser").addClass("col-lg-4");
    $("#cardMedico").addClass("col-lg-8");
    $("#medicoCollapse").collapse("toggle");
    $("#userCollapse").collapse("hide");
}

function mostrarLoginMedico() {
    $('#medicoForm').collapse("toggle");
}

function mostrarLoginUser() {
    $('#userForm').collapse("toggle");
}

function sameSize() {
    $("#cardUser").removeClass("col-lg-4");
    $("#cardUser").removeClass("col-lg-8");
    $("#cardUser").addClass("col-lg-6");
    $("#cardMedico").removeClass("col-lg-4");
    $("#cardMedico").removeClass("col-lg-8");
    $("#cardMedico").addClass("col-lg-6");
}

$(function() {
    $('#chooseUser').on('click', mostrarInfoLoginUsuario);
    $('#chooseMedico').on('click', mostrarInfoLoginMedico);
    $('#loginMedico').on('click', mostrarLoginMedico);
    $('#loginUser').on('click', mostrarLoginUser);
    $('#medicoCollapse').on('hide.bs.collapse', sameSize);
    $('#userCollapse').on('hide.bs.collapse', sameSize);
});