<?php

session_start();

$_SESSION['usuario'] = 'hola';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="spil.view\pk2-free-v2.0.1\assets\js\jquery-3.2.1.js"></script>
        <script src="js/ejemploWebService.js"></script>
    </head>
    <body>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilControllerImpl.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeControllerImpl.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

        //echo "empezando test";
        //  $contRes = new RespilControllerImpl();
        // $resp = $contRes->listarRespilsMensaje(1);
        //$resp= $contRes->listarRespilsUsuario('hola');
        //$resp= $contRes->nuevoRespilGesture(3, 'hola');
        //$resp= $contRes->borrarRespilGesture(3, 'hola');
        //   print_r($resp);
        // echo "<br />";
        //$contLik = new LikeControllerImpl();
        // $resp = $contLik->listarMegustasMensaje(3);
        //$resp = $contLik->listarMegustasUsuario('hola');
        //$resp= $contLik->nuevoLikeGesture(1, 'hola');
        //$resp = $contLik->borrarLikeGesture(3, 'hola');
//        $contUser = new UserControllerImpl();
        //$resp = $contUser->createUser("andres", "andres", "andres", "pepon", '2010-10-1');
        //$resp = $contUser->deleteUser("andres");
//        $resp = $contUser->modifyPassword("hola","probando");
//        $resp = $contUser->getFollows("hola");
//        print_r($resp);
//        echo "hola";
//        for ($i = 0, $size = $resp); $i < $size; $i++) {
//            echo "<br />el respil $i es " . $resp[$i]->getIdMensaje() . " " + $resp[$i]->getIdUsuario();
//        }
//        NOTA IMPORTANTE MODIFICAR ALERTA POR NO INSERCION O NO BORRADO        
        ?>

        <textarea id="msg"></textarea>
        <select id="cAdulto">
            <option value="true">Si</option>
            <option value="false">No</option>
        </select> 
        <button onclick="enviaMsg()">Enviar</button>
    </body>
</html>
