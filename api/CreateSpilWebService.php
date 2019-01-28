<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\SpilControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idSeguidor = $_SESSION['usuario'];
    
    $msg = $_POST['msg'];
    $aContent = ($_POST['aContent'] === 'true') ? TRUE : FALSE;
    
    $controller = new SpilControllerImpl();
    
    $resp = ['resp' => $controller->write($msg, $idSeguidor, date('Y-m-d'), $aContent)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}






