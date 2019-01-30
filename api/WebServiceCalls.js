function addModeratorCall(idUsuario) {
    $.post('api/AddModeratorWebService.php', {
        idUsuarioAsc: idUsuario
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

//function createSpilCall(mensaje, cAdulto) {
//    $.post('api/CreateSpilWebService.php', {
//        msg: mensaje,
//        aContent: cAdulto
//    }, function (data, status) {
//        var content = JSON.parse(data);
//        if (content.resp) {
//            alert("Bien");
//        } else {
//            alert("Mal");
//        }
//    });
//}

function deleteSpilCall(spilId) {
    $.post('api/DeleteSpilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function followUserCall(idUsuario) {
    $.post('api/FollowUserWebService.php', {
        idUsuarioSeguido: idUsuario
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function giveLikeCall(spilId) {
    $.post('api/GiveLikeWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function giveRespilCall(spilId) {
    $.post('api/GiveRespilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function removeLikeCall(spilId) {
    $.post('api/RemoveLikeWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function removeRespilCall(spilId) {
    $.post('api/RemoveRespilWebService.php', {
        spilId: spilId
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}

function unfollowUserCall(idUsuarioSeguido) {
    $.post('api/UnfollowUserWebService.php', {
        idUsuarioSeguido: idUsuarioSeguido
    }, function (data, status) {
        var content = JSON.parse(data);
        if (content.resp) {
            alert("Bien");
        } else {
            alert("Mal");
        }
    });
}
