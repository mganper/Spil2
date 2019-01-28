<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.persistence\spil.model.persistence.dao\NotificationDAOImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\NotificationModel.php';

class NotificationModelImpl implements NotificationModel {

    private $controller;

    public function __construct() {
        $this->controller = NULL;
    }

    public function check($idUser) {
        $dao = $this->obtainNotDao();
        return $dao->listByUser($idUser);
    }

    public function deleteNotification($notification) {
        $dao = $this->obtainNotDao();        
        return $dao->delete($notification);
    }

    public function getController() {
        return $this->controller;
    }

    public function getNotification($idNotification) {
        $dao = $this->obtainNotDao();
        return $dao->read($idNotification);
    }

    public function newNotification($notification) {
        $dao = $this->obtainNotDao();
        return $dao->create($notification);
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function updateNotification($notification) {
        $dao = $this->obtainNotDao();
        
        return $dao->update($notification);
    }

    private function obtainNotDao() {
        return new NotificationDAOImpl();
    }

}
