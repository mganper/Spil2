function displayModal(currUser, txt, owrUser, id) {
    $("#modal-hiden").css("visibility", "collapse");
    $(".rm").remove();
    $("#text-father").append("<input type='hidden' value='" + id + "' id='idMensaje'><h5 class='modal-title rm'>" + txt + "</h5><br class='rm'><br class='rm'><h7 class='rm'>-" + owrUser + "</h7>");
    if (currUser === owrUser) {
        $("#modal-hiden-owner").css("visibility", "visible");
        $("#modal-hiden-non-owner").css("visibility", "collapse");
    } else {
        $("#modal-hiden-owner").css("visibility", "collapse");
        $("#modal-hiden-non-owner").css("visibility", "visible");
    }
}

function sendMsg() {
    var cAdulto = $("input[name='cAdulto']:checked").val();
    var mensaje = $('#msg').val();

    createSpilCall(mensaje, cAdulto);

    $('#msg').val('');
}

function createSpilCall(mensaje, cAdulto) {
    $.post('api/CreateSpilWebService.php', {
        msg: mensaje,
        aContent: cAdulto
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function seguir() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    followUserCall(username);
}

function ascender() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    addModeratorCall(username);
}

function dejarSeguir() {
    var username = document.getElementById("username").firstChild.data;

    username = username.substring(1, username.length);

    unfollowUserCall(username);
}

function darLike() {
    var id = document.getElementById("idMensaje").value;
    
    
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
