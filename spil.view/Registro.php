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
                        <form class="register-form">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nombre" class="form-control">
                            <label>Nombre</label>
                            <input type="text" placeholder="Apellidos" class="form-control">
                            <label>Fecha de nacimiento</label>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker'>
                                    <input type='text' class="form-control datetimepicker" placeholder="05/08/2017" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
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
    <!-- javascript --><script>
        $('#datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }

        });</script>
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
