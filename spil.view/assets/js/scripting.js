function displayModal(currUser, txt, owrUser) {
    $("#modal-hiden").css("visibility", "collapse");
    $(".rm").remove();
    $("#text-father").append("<h5 class='modal-title rm'>" + txt + "</h5><br class='rm'><br class='rm'><h7 class='rm'>-" + owrUser + "</h7>");
    if (currUser === owrUser) {
        $("#modal-hiden-owner").css("visibility", "visible");
        $("#modal-hiden-non-owner").css("visibility", "collapse");
    } else {
        $("#modal-hiden-owner").css("visibility", "collapse");
        $("#modal-hiden-non-owner").css("visibility", "visible");
    }
}

function checkModerator(isModerator) {
    alert(isModerator);
    if (isModerator) {
        $("#bt-tomoderator").css("visibility", "visible");
    }

}

function sendMsg() {
    var cAdulto = 0;//$("input[name='cAdulto']:checked").val();
    var mensaje = "texto";//$('#msg').val();

    createSpilCall(mensaje, cAdulto);

    $('#msg').val('');
}

function seguir() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    followUserCall(username);
}
function checkPasswd() {
    if (($("#rnpass").val() !== $("#npass").val()) && ($("#rnpass").val() !== "" && $("#npass").val() !== "")) {
        $("#rnpass").addClass(" form-control-danger");
        $("#npass").addClass(" form-control-danger");
        $("#psswd").append("<div id='fallo' class='form-control-feedback' style='color:red;'>Las contraseñas no coinciden.</div>");
        $("#cpsw").attr("disabled", true);
    } else {
        if ($("#rnpass").val() !== "" && $("#npass").val() !== "") {
            $("#rnpass").removeClass(" form-control-danger");
            $("#npass").removeClass(" form-control-danger");
            $("#rnpass").addClass(" form-control-success");
            $("#npass").addClass(" form-control-success");
            $("#fallo").remove();
            $("#cpsw").attr("disabled", false);
        }
    }
}
