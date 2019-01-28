<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idUsuario = $_SESSION['usuario'];
    
    $idUsuarioAsc = $_POST['msg'];
    
    $controller = new UserControllerImpl();
    
    $resp = ['resp' => $controller->ascenderModerador($idUsuario, $idUsuarioAsc)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

