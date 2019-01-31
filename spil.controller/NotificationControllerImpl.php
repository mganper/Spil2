<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/NotificationController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/NotificationModelImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/NotificationImpl.php';

class NotificationControllerImpl implements NotificationController {

    private $model;

    public function __construct() {
        $this->model = new NotificationModelImpl();
        return $this->model->setController($this);
    }

    public function createNot($idUser, $text) {
        $notification = new NotificationImpl(NULL, $idUser, $text);
        return $this->model->newNotification($notification);
    }

    public function deleteNot($idNotification) {
        $notification = new NotificationImpl($idNotification, NULL, NULL);
        return $this->model->deleteNotification($notification);
    }

    public function listNot($idUser) {
        return $this->model->check($idUser);
    }

    public function updateNot($idNotification, $text) {
        $notification = new NotificationImpl($idNotification, NULL, $text);
        return $this->model->updateNotification($notification);
    }

}
