<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    $idSeguidor = $_SESSION['usuario'];
    
    $idSeguido = $_POST['idUsuarioSeguido'];
    
    $controller = new UserControllerImpl();
    
    $resp = ['resp' => $controller->addfollower($idSeguidor, $idSeguido)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

