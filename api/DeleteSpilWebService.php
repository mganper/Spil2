<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\SpilControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    
    $spilId = $_POST['spilId'];
    
    $controller = new SpilControllerImpl();
    
    $resp = ['resp' => $controller->delete($spilId)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

