function displayModal(currUser, txt, owrUser) {
    $("#modal-hiden").css("visibility", "collapse");
    $(".rm").remove();
    $("#text-father").append("<h5 class='modal-title rm'>" + txt + "</h5><br class='rm'><br class='rm'><h7 class='rm'>-" + owrUser + "</h7>");
    if (currUser === owrUser) {
        $("#modal-hiden").css("visibility", "visible");
    }
}

function sendMsg(){
    var cAdulto = $("input[name='cAdulto']:checked").val();
    var mensaje = $('#msg').val();
    
    createSpilCall(mensaje, cAdulto);
    
    $('#msg').val('');
}

function seguir(){
    var username = document.getElementById("username").firstChild.data;
    
    username = username.substring(1, username.length);
    
    followUserCall(username);
}