<!doctype html>

<?php
session_start();

$_SESSION['usuario'] = 'pepe';

if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];
} else {
    header('Location: Login.php');
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Paper Kit 2 by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="pk2-free-v2.0.1/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="pk2-free-v2.0.1/assets/css/paper-kit.css?v=2.0.1" rel="stylesheet"/>

        <!--     Fonts and icons     -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="pk2-free-v2.0.1/assets/css/nucleo-icons.css" rel="stylesheet" />

        <style> 

            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {height: 450px}

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                padding-bottom: 50%;
                background-color: #f1f1f1;
            }

        </style>

    </head>
    <body>
        <!--    navbar come here          -->
        <nav class="navbarnavbar-expand-md bg-info">
            <div class="container" style="text-align: center;">         
                <img src="pk2-free-v2.0.1/assets/img/spil_favicon_iz.png" style="max-width: 40px">          
                <a class="navbar-brand nav-link" href="Lobby.php">Inicio</a>
                <a class="navbar-brand nav-link" href="Notification.php">Notificaciones</a>
                <a class="navbar-brand nav-link" href="User.php">Perfil</a>
                <a class="navbar-brand nav-link" href="Configuration.php">Configuracion</a>
                <button class="navbar-brand btn" data-toggle="modal" data-target="#MSGModal"style="margin: 5px; border: none; text-align: right; color: #00bbff; background-color: white;">Spilear</button>
                <img src="pk2-free-v2.0.1/assets/img/spil_favicon_de.png" style="max-width: 40px; margin-left: 20px">
                <a class='navbar-brand nav-link navbar-right'href>Log out</a>
            </div>
        </nav>
        <!-- end navbar  -->

        <div class="wrapper">
            <div class="container-fluid text-center">    
                <div class="row content" style="margin-top: 5px;">
                    <div class="col-sm-2 sidenav">
                        <img class="img-circle" src="pk2-free-v2.0.1/assets/img/faces/erik-lucatero-2.jpg" style="max-height: 200px; max-width: 200px;">
                        <label class="label label-info">@USERname</label>
                        <div class="card-block col-sm-12" style="background-color: white; margin-top: 20px;">
                            <div class="info-user ">
                                <a href="Seguidores.php">Seguidores <span class="label label-info">555</span></a><br>
                                <a href="Seguidos.php">Seguidos <span class="label label-info">1025</span></a><br>
                                <a href="User.php">Spils <span class="label label-info">2</span></a><br>                              
                                <a href="Like.php">Me gusta<span class="label label-info">252</span></a>                              
                            </div>
                        </div>

                        <div class="card-block col-sm-12" style="background-color: white; margin-top: 10px;">
                            <div>
                                <footer>FOOTER</footer>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 text-center"> 

                        <h3>SEGUIDOR 1</h3>
                        <hr>
                        <h3>SEGUIDOR 2</h3>
                        <hr>
                        <h3>SEGUIDOR N</h3>

                    </div>
                    <div class="col-sm-2 sidenav">
                        <div class="card-block col-sm-11 offset-sm-1" style="background-color: white;">
                            <div class="info-user ">
                                <h5>RANK1</h5>
                                <HR>
                                <h5>RANK2</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Modal Bodies come here -->
        <div class="modal fade" id="MSGModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">¿Qué tienes que decir?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body"> 
                            <textarea class="form-control" rows="4" placeholder="Tell us your thoughts"></textarea>
                            <label>Contenido sensible</label>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    Off
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" >
                                    On
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default btn-link" data-dismiss="modal">Publicar</button>
                            <div class="divider"></div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--   end modal -->


    </body>
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
