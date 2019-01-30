<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\NotificationControllerImpl.php';

session_start();

if(isset($_SESSION['usuario'])){
    
    $notificationId = $_POST['notificationId'];
    
    $controller = new NotificationControllerImpl();
    
    $resp = ['resp' => $controller->deleteNot($notificationId)];
    
    echo json_encode($resp);
} else {
    $resp = ['resp' => FALSE];
    
    echo json_encode($resp);
}