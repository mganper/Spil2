<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

        $contUser = new UserControllerImpl();
        //$resp = $contUser->createUser("andres", "andres", "andres", "pepon", '2010-10-1');
        //$resp = $contUser->deleteUser("andres");
        $resp = $contUser->modifyPassword("hola","probando");
        $resp = $contUser->getFollows("hola");
        print_r($resp);
//        echo "hola";
//        for ($i = 0, $size = $resp); $i < $size; $i++) {
//            echo "<br />el respil $i es " . $resp[$i]->getIdMensaje() . " " + $resp[$i]->getIdUsuario();
//        }
//        NOTA IMPORTANTE MODIFICAR ALERTA POR NO INSERCION O NO BORRADO
        ?>
    </body>
</html>
