<?php

class SpilModelImpl implements SpilModel {

    private $controller;

    public function __construct() {
        $this->controller = NULL;
    }

    public function listByUser($idUser) {
        $dao = $this->obtainNotDao();
        return $dao->listByUser($idUser);
    }

    public function deleteSpil($spil) {
        $dao = $this->obtainNotDao();        
        return $dao->delete($spil);
    }

    public function getController() {
        return $this->controller;
    }

    public function getSpil($id) {
        $dao = $this->obtainNotDao();
        return $dao->read($id);
    }

    public function newSpil($spil) {
        $dao = $this->obtainNotDao();
        return $dao->create($spil);
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function updateSpil($spil) {
        $dao = $this->obtainNotDao();
        return $dao->update($spil);
    }

    private function obtainNotDao() {
        return new SpilDAOImpl();
    }

}
