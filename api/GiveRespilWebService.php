<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idUsuario = $_SESSION['usuario'];
    
    $spilId = $_POST['spilId'];
    
    $controller = new SpilControllerImpl();
    
    $resp = ['resp' => $controller->nuevoRespilGesture($spilId, $idUsuario)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}
