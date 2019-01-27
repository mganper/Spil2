<?php

class NotificationControllerImpl implements NotificationController{
    
    private $model;
    
    public function __construct() {
        $this->$model = new NotificationModelImpl();
        $this->model->setController($this);
    }
    public function createNot($idUser, $text) {
        $notification = new NotificationImpl(NULL, $idUser, $text);
        $this->model->newNotification($notification);
    }

    public function deleteNot($idNotification) {
        $notification = new NotificationImpl($idNotification, NULL, NULL);
        $this->model->deleteNotification($notification);
    }

    public function listNot($idUser) {
        $this->model->check($idUser);
    }

    public function updateNot($idNotification, $text) {
        $notification = new NotificationImpl($idNotification, NULL, $text);
        $this->model->updateNotification($notification);
    }

}
