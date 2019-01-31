<?php

require $_SERVER['DOCUMENT_ROOT'] . '\spil.controller\SpilControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    
    $notificationIde = $_POST['spilId'];
    
    $controller = new SpilControllerImpl();
    
    $resp = ['resp' => $controller->delete($notificationIde)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}

