<?php

interface Notification {
   public function getIdUser();
   
   public function getText();
   
   public function setIdUser($idUser);
   
   public function setText($text);
   
   public function getIdNotification();
   
   public function setIdNotification($idNotification);
}
