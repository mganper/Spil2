<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idUsuario = $_SESSION['usuario'];
    
    $spilId = $_POST['spilId'];
    
    $controller = new LikeControllerImpl();
    
    $resp = ['resp' => $controller->borrarLikeGesture($spilId, $idUsuario)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}