<?php

require $_SERVER['DOCUMENT_ROOT'] . '/spil.controller/UserControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){    
    $idUsuarioAsc = $_POST['idUsuarioAsc'];
    
    $controller = new UserControllerImpl();
    
    $resp = ['resp' => $controller->ascenderModerador($idUsuarioAsc)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

