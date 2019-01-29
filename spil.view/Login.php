<!DOCTYPE html>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';

function isGoodLogin($user, $pass) {
    $res = FALSE;

    $query = "SELECT contrasenya FROM usuario WHERE usuario='$user';";
    $result = ConnectionSingleton::getConn()->query($query);
    if ($result->num_rows === 1) {
        $recPass = $result->fetch_assoc();

        $res = password_verify($pass, $recPass['contrasenya']);
    }

    return $res;
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
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
        if (isset($_POST['login'])) {
            $filter = Array(
                'user' => FILTER_SANITIZE_STRING,
                'pass' => FILTER_SANITIZE_STRING
            );

            $entry = filter_input_array(INPUT_POST, $filter);

            if (isGoodLogin($entry['user'], $entry['pass'])) {
                session_start();
                $_SESSION['user'] = $entry['user'];
                header('Location: Lobby.php');
            } else {
                ?>
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 ">
                            <div class="card-register bg-primary">
                                <h3 style="color:blue;">Welcome to Spil!</h3>
                                <!-- FORMULARIO DE LOGIN-->
                                <form class="register-form" action='#' method="POST">
                                    <label>User</label>
                                    <div class="form-group has-danger">
                                        <input class="form-control form-control-danger" id="inputDanger1" type="text" placeholder="User" name="user">
                                    </div>
                                    <label>Password</label>
                                    <div class="form-group has-danger">
                                        <input class="form-control form-control-danger" id="inputDanger1" type="password" placeholder="Password" name="pass">
                                        <div class="form-control-feedback">Usuario o contraseña incorrectos.</div>
                                    </div>
                                    <button class="btn btn-danger btn-block btn-round" name="login">Log in</button>
                                </form>
                                <a type="button" class="btn btn-register btn-block btn-round" href="Registro.php">Register</a>
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
                <?php
            }
        } else {
            ?>
            <div class="container" >
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 ">
                        <div class="card-register bg-primary">
                            <h3 style="color:blue;">Welcome to Spil!</h3>
                            <!-- FORMULARIO DE LOGIN-->
                            <form class="register-form" action='#' method="POST">
                                <label>User</label>
                                <input class="form-control" type="text" placeholder="User" name="user">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="pass">
                                <input type="submit" value="Log In" name="login" class="btn btn-danger btn-block btn-round" name="login">
                            </form>
                            <a type="button" class="btn btn-register btn-block btn-round" href="Registro.php">Register</a>
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
        <?php } ?>
    </body>
</html>
