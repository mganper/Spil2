<!doctype html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\ConfigurationControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

session_start();

$_SESSION['usuario'] = 'hola';

if (isset($_SESSION['usuario'])) {
    $user = $_SESSION['usuario'];
    $confController = new ConfigurationControllerImpl();
    $confUsuario = new UserControllerImpl();
    $config = $confController->getConfiguration($user);

 

    if (isset($_POST['avatar'])) {
        
        if ($_FILES['foto']['error'] > 0) {
            echo 'Error: ' . $_FILES['foto']['error'] . '<br />';
        } else if (!soloImagenes($_FILES['foto'])) {
            echo 'Error: Tipo de fichero no aceptado <br />';
        } else if (!limiteTamanyo($_FILES['foto'], 2 * 1024 * 1024)) {
            echo 'Error: El tama&ntilde;o del fichero supera los 200KB <br />';
        } else {
           
            $nombreAr = filter_var(filter_var($_FILES['foto']['name'], FILTER_SANITIZE_STRING));
            $nombreAr =   $_SERVER['REQUEST_TIME'].$nombreAr;
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], "img/" . $nombreAr)) {
                $confUsuario->modifyAvatar($_SESSION['usuario'], $nombreAr);
            }
        }
    }
} else {
    header('Location: Login.php');
}

/////////////////////////////////////////////////////////////
/* if (isset($_POST['avatar'])) {

  echo $_FILES['foto']['size'];
  if ($_FILES['foto']['error'] > 0) {
  echo 'Error: ' . $_FILES['foto']['error'] . '<br />';
  } else if (!soloImagenes($_FILES['foto'])) {
  echo 'Error: Tipo de fichero no aceptado <br />';
  } else if (!limiteTamanyo($_FILES['foto'], 2 * 1024 * 1024)) {
  echo 'Error: El tama&ntilde;o del fichero supera los 200KB <br />';
  }

  echo "vamos";

  $nombreAr = filter_var(filter_var($_FILES['foto']['name'], FILTER_SANITIZE_STRING));
  $nombreAr = $nombreAr . $_SERVER['REQUEST_TIME'];
  echo move_uploaded_file($_FILES["foto"]["tmp_name"], "img/" . /* basename($_FILES["foto"]["name"]) $nombreAr);
  if (FALSE) {
  if ($confUsuario->modifyAvatar("hola", $nombreAr)) {

  echo "funciona";
  } else {
  echo "no funciona";
  }
  } */
//}
//////////////////////////////////////////////////////////////////
function limiteTamanyo($fichero, $limite) {
    return $fichero['size'] <= $limite;
}

function soloImagenes($fichero) {
    $tiposAceptados = Array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
    if (array_search($fichero['type'], $tiposAceptados) === false)
        return false;
    else
        return true;
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

        <style> .navbar {
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
            }</style>

    </head>
    <body>
        <!--    navbar come here          -->
        <nav class="navbarnavbar-expand-md bg-info">
            <div class="container" style="text-align: center;">         
                <img src="pk2-free-v2.0.1/assets/img/spil_favicon_iz.png" style="max-width: 40px">          
                <a class="navbar-brand nav-link" href="Lobby.php">Inicio</a>
                <a class="navbar-brand nav-link" href="Notification.php">Notificaciones</a>
                <a class="navbar-brand nav-link" href="User.php?user=<?php echo $user; ?>">Perfil</a>
                <a class="navbar-brand nav-link" href="Configuration.php">Configuracion</a>
                <button class="navbar-brand btn" data-toggle="modal" data-target="#MSGModal"style="margin: 5px; border: none; text-align: right; color: #00bbff; background-color: white;">Spilear</button>
                <img src="pk2-free-v2.0.1/assets/img/spil_favicon_de.png" style="max-width: 40px; margin-left: 20px;">
                <a class='navbar-brand nav-link navbar-right'href="Logout.php">Log out</a>
            </div>
        </nav>
        <!-- end navbar  -->

        <div class="wrapper">
            <div class="container-fluid text-center">    
                <div class="row content" style="margin-top: 5px;">
                    <div class="col-sm-2 sidenav">
                        <div class="card-block col-sm-12" style="background-color: white; margin-top: 10px;">
                            <div>
                                <footer><h6>
                                        © 
                                        <script>document.write(new Date().getFullYear())</script>
                                        , Grupo 10 Programacion Avanzada.
                                    </h6></footer>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 text-center"> 

                        <h4 style="text-align: left">General</h4>
                        <hr>
                        <h5 style="text-align: left"><b>Mostrar contenido sensible:</b></h5><br>

                        <form class="register-form"  style="text-align: left;" action="#">
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" 
                                    <?php
                                    if ($config->isModoAdulto()) {
                                        echo "checked";
                                    }
                                    ?>>
                                    Sí
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"
                                    <?php
                                    if (!$config->isModoAdulto()) {
                                        echo "checked";
                                    }
                                    ?>>
                                    No
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-round bg-info">Enviar</button>
                        </form>
                        <br>
                        <!-- FOTO PERFIL AQUÍ////////////////////////////////////////////////////////-->


                        <h5 style="text-align: left"><b>Cambiar foto de perfil:</b></h5><br>
                        <form enctype="multipart/form-data" class="register-form"  style="text-align: left;" action="#" method="Post">
                            <input id="foto" name="foto" type="file"/>
                            <?php ?>
                            <!--                            <form enctype="multipart/form-data" action="uploader.php" method="POST">
                            <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                            <input name="uploadedfile" type="file" />
                            <input type="submit" value="Subir archivo" />
                            </form>-->



                            <br>
                            <button id="avatar" name="avatar" class="btn btn-round bg-info" type="submit">Subir archivo</button>
                        </form>
                        <hr>
                        <h4 style="text-align: left">Seguridad</h4>
                        <hr>
                        <h5 style="text-align: left"><b>Cambiar contraseña:</b></h5><br>
                        <form class="register-form"  style="text-align: left;" action="#">
                            <label>Contraseña actual: </label>
                            <input type="password" placeholder="Contraseña"><br>
                            <label>Nueva contraseña: </label>
                            <input type="password" placeholder="Nueva contraseña" id="npass"><br>
                            <label>Repetir contraseña: </label>
                            <input class="" type="password" placeholder="Repetir contraseña" id="rnpass"><br><br>
                            <button class="btn btn-round bg-info">Cambiar contraseña</button>
                        </form>
                        <!--<hr>
                        <h4 style="text-align: left">Privacidad</h4>
                        <hr>
                        <h5 style="text-align: left"><b>Cambiar nivel de privacidad:</b></h5><br>
                        <form class="register-form"  style="text-align: left;" action="#">
                            <div class="form-group">
                                <label for="sel1">Seleciona un nivel:</label>
                                <select class="form-control" id="sel1" style="max-width: 30%">
                                    <option>Baja</option>
                                    <option>Atla</option>
                                </select>
                            </div> 
                            <button class="btn btn-round bg-info">Enviar</button>
                        </form> -->
                    </div>
                    <div class="col-sm-2 sidenav">

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
