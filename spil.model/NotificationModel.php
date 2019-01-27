<?php

interface NotificationModel {

    function getController();

    function setController($controller);

    function check($idUser);

    function newNotification($notification);
    
    function getNotification($idNotification);
    
    function updateNotification($notification);
    
    function deleteNotification($notification);    
    
}
