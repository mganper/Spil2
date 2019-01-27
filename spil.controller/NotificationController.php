<?php

interface NotificationController {
    function createNot($idUser, $text);
    
    function listNot($idUser);
    
    function deleteNot($idNotification);
    
    function updateNot($idNotification);
}
