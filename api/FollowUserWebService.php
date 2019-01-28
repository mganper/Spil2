<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idUsuario = $_SESSION['usuario'];
    
    $idUsuarioSeguido = $_POST['idUsuarioSeguido'];
    
    $controller = new UserControllerImpl();
    
    $resp = ['resp' => $controller->followUser($idUsuario, $idUsuarioSeguido)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

