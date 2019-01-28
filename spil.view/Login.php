<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="pk2-free-v2.0.1/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="pk2-free-v2.0.1/assets/css/paper-kit.css?v=2.0.1" rel="stylesheet">
        <link href="pk2-free-v2.0.1/assets/css/demo.css" rel="stylesheet">
        <title>Spil</title>
    </head>
    <body style="background-image: url('https://simbiotica.files.wordpress.com/2017/03/south-africa-927268_1920.jpg');">
        <div class="container" >
            <div class="row">
                <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 ">
                    <div class="card-register bg-primary">
                        <h3 style="color:blue;">Welcome to Spil!</h3>
                        <!-- FORMULARIO DE LOGIN-->
                        <form class="register-form" action='Lobby.php'>
                            <label>User</label>
                            <input class="form-control" type="text" placeholder="User">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Password">
                            <button class="btn btn-danger btn-block btn-round">Log in</button>
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
    </body>
</html>
