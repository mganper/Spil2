

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\ConfigurationControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.persistence\spil.model.persistence.dao\UserDAOImpl.php';

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
//$contUser = new UserControllerImpl();
//$resp = $contUser->createUser("pedro", "pedro", "pedro", "pepon", '2010-10-1');
//$resp = $contUser->deleteUser("andres");
//$resp = $contUser->modifyPassword("andres","andres","funciono");
//$resp = UserDAOImpl::isGoodLogin("andres","andres");
//$resp = $contUser->getFollows("hola");
//printf($resp);
//printf($resp[0]->getUsuario() . "..." . count($resp) . "...");
//print_r($resp);
//echo "<br /><br /><br />";
//$resp = $contUser->getFollowers("adios");
//
//echo $resp[0]->getUsuario() . "..." . count($resp) . "...";
//print_r($resp);
//        echo "hola";
//        for ($i = 0, $size = $resp); $i < $size; $i++) {
//            echo "<br />el respil $i es " . $resp[$i]->getIdMensaje() . " " + $resp[$i]->getIdUsuario();
//        }
//        NOTA IMPORTANTE MODIFICAR ALERTA POR NO INSERCION O NO BORRADO    


$contUser = new UserControllerImpl();
$contUser->createUser("prueba", "prueba", "prueba", "prueba", '2010-10-1');

//$contUser->modifyAvatar("hola", "funciono");

//UserDAOImpl::EsSeguido($idSeguido, $idSeguidor)
//$contConf = new ConfigurationControllerImpl();
//$contConf->createConfiguration("hola", 0,0, 0);
//$co=$contConf->getConfiguration("hola");
//
//echo $co->getIdUsuario()." ".$co->isTemaOscuro();
//$contConf->modifyConfiguration("hola", 1, 1, 1);
//
//$co=$contConf->getConfiguration("hola");
//echo $co->getIdUsuario()." ".$co->isTemaOscuro();
//$contConf->deleteConfiguration("hola");
//$contUser->addReport("andres");
//echo"andres sigue a ".
//$contUser->getNumSeguidos("andres"). " y es seguido por ".
//$contUser->getNumSeguidores("andres");
//$contUser->addfollower("andres", "hola");
//$contUser->removefollower("andres", "hola");
?>

<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="api/WebServiceCalls.js" type="text/javascript"></script>
        <script>
        
            createSpilCall("mensaje", "true");
        
        </script>
    </head>
    
</html>

