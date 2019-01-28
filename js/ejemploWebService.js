function enviaMsg() {
    var mensage = $('#msg').val();
    var cAdulto = $('#cAdulto').val();


    console.log("hola");
    $.post('api/CreateSpilWebService.php', {
        msg: mensage,
        aContent: cAdulto
    }, function (data, status) {
        console.log(data);
        var content = JSON.parse(data);
        if (content.resp){
            alert("Bien");
        } else {
            alert("Mal");
        }
    });

}


