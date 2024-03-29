<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.controller/UserControllerImpl.php';

function register($name, $surname, $birthdate, $user, $pass) {
    $userController = new UserControllerImpl();
    return $userController->createUser($user, $pass, $name, $surname, $birthdate);
}

if (isset($_POST['send'])) {
            $filter = Array(
                'name' => FILTER_SANITIZE_STRING,
                'surname' => FILTER_SANITIZE_STRING,
                'user' => FILTER_SANITIZE_STRING,
                'pass' => FILTER_SANITIZE_STRING
            );

            $entry = filter_input_array(INPUT_POST, $filter);

            if (register($entry['name'], $entry['surname'], $_POST['birthdate'], $entry['user'], $entry['pass'])) {
                header('Location: Login.php');
            } else {
                $fallo = true;
            }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

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
        <?php
//        if (isset($_POST['send'])) {
//            $filter = Array(
//                'name' => FILTER_SANITIZE_STRING,
//                'surname' => FILTER_SANITIZE_STRING,
//                'user' => FILTER_SANITIZE_STRING,
//                'pass' => FILTER_SANITIZE_STRING
//            );
//
//            $entry = filter_input_array(INPUT_POST, $filter);
//
//            if (register($entry['name'], $entry['surname'], $_POST['birthdate'], $entry['user'], $entry['pass'])) {
//                header('Location: Login.php');
//            } else {
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">
                            <div class="card-register bg-primary">
                                <h3 style="color:blue;">Welcome to Spil!</h3>
                                <!-- FORMULARIO DE REGISTRO-->
                                <form class="register-form" action="#" method="POST">
                                    <label>Nombre</label>
                                    <input type="text" placeholder="Nombre" class="form-control" name="name" required>
                                    <label>Apellidos</label>
                                    <input type="text" placeholder="Apellidos" class="form-control" name="surname" required>
                                    <label>Fecha de nacimiento</label>
                                    <input type="text" id="birth-date" placeholder="DD-MM-AAAA" class="form-control" onkeyup="checkDate()" name="birthdate">
                                    <label>User</label>
                                    <div class="form-group <?php if(isset($fallo)) echo 'has-danger';?>">
                                    <input class="form-control <?php if(isset($fallo)) echo 'form-control-danger';?>" type="text" placeholder="User" name="user" required>
                                    <?php if(isset($fallo)) echo '<div class="form-control-feedback">El usuario ya esta en uno, utilice otro.</div>';?>
                                    </div>
                                    <label>Contraseña: </label>
                                    <div class="">
                                        <input class="form-control" type="password" placeholder="Nueva contraseña" id="npass" onblur="checkPasswd()" name="pass" required><br>
                                        <label>Repetir contraseña: </label>
                                        <input class="form-control" type="password" placeholder="Repetir contraseña" id="rnpass" onblur="checkPasswd()" required><br><br>
                                        <input id="cpsw" type="submit" name="send" value="Registrar" class="btn btn-danger btn-block btn-round" disabled>
                                    </div>
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
