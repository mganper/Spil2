<?php

require_once $_SERVER['DOCUMENT_ROOT'].'\Spil\spil.controller\SpilController.php';

require_once $_SERVER['DOCUMENT_ROOT'].'\Spil\spil.model\SpilModelImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'].'\Spil\spil.model\spil.model.entity\SpilImpl.php';

class SpilControllerImpl implements SpilController{
    private $model;
    
    function __construct() {
        $this->model = new SpilModelImpl();
        return $this->model->setController($this);
    }

    public function delete($idSpil) {
        $spil = new SpilImpl($idSpil, NULL, NULL, NULL, NULL, NULL, NULL);
        return $this->model->deleteSpil($spil);
    }

    public function edit($idSpil, $text) {
        $spil = new SpilImpl($idSpil, $text, NULL, NULL, NULL, NULL, NULL);
        return $this->model->updateSpil($spil);
    }

    public function listMsgs($idUser) {
        $model = new SpilModelImpl();
        return $this->model->listByUser($idUser);
    }

    public function report($pk) {
        $model = new SpilModelImpl();
        return $this->model->report($pk);
    }

    public function write($text, $idUser, $writeDate, $adultContent) {
        $spil = new SpilImpl(NULL, $text, $idUser, $writeDate, 0, $adultContent, FALSE);
        return $this->model->newSpil($spil);
    }

}
