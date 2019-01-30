function addModeratorCall(idUsuario) {
    $.post('../api/AddModeratorWebService.php', {
        idUsuarioAsc: idUsuario
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Usuario ascendido correctamente");
        } else {
            alert("El usuario no ha podido ser ascendido");
        }
    });
}

function createSpilCall(mensaje, cAdulto) {
    $.post('../api/CreateSpilWebService.php', {
        msg: mensaje,
        aContent: cAdulto
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Mensaje enviado.");
        } else {
            alert("Su mensaje no se ha enviado con éxito.");
        }
    });
}

function deleteSpilCall(spilId) {
    $.post('../api/DeleteSpilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Mensaje eliminado correctamente");
        } else {
            alert("No se ha podido eliminar el mensaje");
        }
    });
}

function followUserCall(idUsuario) {
    $.post('../api/FollowUserWebService.php', {
        idUsuarioSeguido: idUsuario
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Uusario seguido correctamente");
        } else {
            alert("No se ha podido seguir al usuario");
        }
    });
}

function giveLikeCall(spilId) {
    $.post('../api/GiveLikeWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Like enviado correctamente");
        } else {
            alert("No se ha podido enviar el like");
        }
    });
}

function giveRespilCall(spilId) {
    $.post('../api/GiveRespilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Respil enviado correctamente");
        } else {
            alert("Respil no enviado correctamente");
        }
    });
}

function removeLikeCall(spilId) {
    $.post('../api/RemoveLikeWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Eliminar like realizado correctamente");
        } else {
            alert("No se ha podido eliminar el like");
        }
    });
}

function removeRespilCall(spilId) {
    $.post('../api/RemoveRespilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Respil eliminado correctamente");
        } else {
            alert("No se ha podido eliminar el respil");
        }
    });
}

function unfollowUserCall(idUsuarioSeguido) {
    $.post('../api/UnfollowUserWebService.php', {
        idUsuarioSeguido: idUsuarioSeguido
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Usuario dejado de seguir correctamente");
        } else {
            alert("No se ha podido dejar de seguir al usuario");
        }
    });
}
