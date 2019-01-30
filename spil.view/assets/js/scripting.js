function displayModal(currUser, txt, owrUser, id) {
    $("#modal-hiden").css("visibility", "collapse");
    $(".rm").remove();
    $("#text-father").append("<input type='hidden' value='" + id + "' id='idMensaje'><h5 class='modal-title rm'>" + txt + "</h5><br class='rm'><br class='rm'><h7 class='rm'><a href='User.php?user=" + owrUser + "'>-" + owrUser + "</a></h7>");
    if (currUser === owrUser) {
        $("#modal-hiden-owner").css("visibility", "visible");
        $("#modal-hiden-non-owner").css("visibility", "collapse");
    } else {
        $("#modal-hiden-owner").css("visibility", "collapse");
        $("#modal-hiden-non-owner").css("visibility", "visible");
    }
}

function displayNot(currUser, txt, id){     
    $(".rm").remove();
    $("#text-father").append("<input class='rm' type='hidden' value='" + id + "' id='idMensaje'><h5 class='modal-title rm'>" + txt + "</h5><br class='rm'>");
    $(".not-hidden").css("visibility", "visible");
}

function ascender() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    addModeratorCall(username);
}

function sendMsg() {
    var cAdulto = $("input[name='cAdulto']:checked").val();
    var mensaje = $('#msg').val();

    createSpilCall(mensaje, cAdulto);

    $('#msg').val('');
}

function eliminaSpil() {
    var id = document.getElementById("idMensaje").value;

    deleteSpilCall(id);
}

function seguir() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    followUserCall(username);
}

function likear() {
    var id = document.getElementById("idMensaje").value;

    giveLikeCall(id);
}

function respil() {
    var id = document.getElementById("idMensaje").value;

    giveRespilCall(id);
}

function unlike() {
    var id = document.getElementById("idMensaje").value;

    removeLikeCall(id);
}

function eliminaNoti(){
    var id = document.getElementById("idMensaje").value;
    
    removeNotificationCall(id);
}

function unrespil() {
    var id = document.getElementById("idMensaje").value;

    removeRespilCall(id);
}

function dejarSeguir() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    unfollowUserCall(username);
}

function darLike() {
    var id = document.getElementById("idMensaje").value;

    giveLikeCall(id);
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


"<br />\n<b>Fatal error</b>: Uncaught Error: Class 'NotificationControllerImpl' not found in D:\\xampp\\htdocs\\Spil2\\spil.controller\\RespilControllerImpl.php:27\nStack trace:\n#0 D:\\xampp\\htdocs\\Spil2\\api\\GiveRespilWebService.php(14): RespilControllerImpl-&gt;nuevoRespilGesture('24', 'hola')\n#1 {main}\n thrown in <b>D:\\xampp\\htdocs\\Spil2\\spil.controller\\RespilControllerImpl.php</b> on line <b>27</b><br />\n"