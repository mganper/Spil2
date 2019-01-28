<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="pk2-free-v2.0.1/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="pk2-free-v2.0.1/assets/css/paper-kit.css?v=2.0.1" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="pk2-free-v2.0.1/assets/css/nucleo-icons.css" rel="stylesheet" />
        <title>Spil</title>
    </head>
    <body style="background-image: url('https://simbiotica.files.wordpress.com/2017/03/south-africa-927268_1920.jpg');">
        <div class="container" >
            <div class="row">
                <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">
                    <div class="card-register bg-primary">
                        <h3 style="color:blue;">Welcome to Spil!</h3>
                        <!-- FORMULARIO DE REGISTRO-->
                        <form class="register-form">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nombre" class="form-control">
                            <label>Nombre</label>
                            <input type="text" placeholder="Apellidos" class="form-control">
                            <label>Fecha de nacimiento</label>
                            <input type="text" id="birth-date" placeholder="DD-MM-AAAA" class="form-control" onkeyup="checkDate()">
                            <label>User</label>
                            <input class="form-control" type="text" placeholder="User">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Password">
                            <label>Confirm password</label>
                            <input class="form-control" type="password" placeholder="Password">
                            <button class="btn btn-danger btn-block btn-round">Registro</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer register-footer text-center">
                <h6>
                    © 
                    <script>document.write(new Date().getFullYear())</script>
                    , Grupo 10 Programacion Avanzada.
                </h6>
            </div>
        </div>
    </body>
    <!-- javascript -->
    <script>
        var cont = 0;
        function checkDate() {
            var char = document.getElementById("birth-date").value;
            var ascii = char.charCodeAt(cont++);

            if ((cont === 3 || cont === 6) && (ascii === 47 || ascii === 45) && cont < 11) {

            } else {
                if ((ascii >= 48 && ascii <= 57) && cont < 11) {
                    if (cont === 3 || cont === 6) {
                        document.getElementById("birth-date").value = char.substring(0, --cont);
                    }
                } else {
                    document.getElementById("birth-date").value = char.substring(0, --cont);
                }
            }
        }
    </script>
    <!-- Core JS Files -->
    <script src="pk2-free-v2.0.1/assets/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="pk2-free-v2.0.1/assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
    <script src="pk2-free-v2.0.1/assets/js/tether.min.js" type="text/javascript"></script>
    <script src="pk2-free-v2.0.1/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Switches -->
    <script src="pk2-free-v2.0.1/assets/js/bootstrap-switch.min.js"></script>

    <!--  Plugins for Slider -->
    <script src="pk2-free-v2.0.1/assets/js/nouislider.js"></script>

    <!--  Plugins for DateTimePicker -->
    <script src="pk2-free-v2.0.1/assets/js/moment.min.js"></script>
    <script src="pk2-free-v2.0.1/assets/js/bootstrap-datetimepicker.min.js"></script>

    <!--  Paper Kit Initialization snd functons -->
    <script src="pk2-free-v2.0.1/assets/js/paper-kit.js?v=2.0.1"></script>
</html>
