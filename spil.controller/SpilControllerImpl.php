<?php

class SpilControllerImpl implements SpilController{
    private $model;
    
    function __construct() {
        $this->model = new SpilModelImpl();
        $this->model->setController($this);
    }

    public function delete($idSpil) {
        $spil = new SpilImpl($idSpil, NULL, NULL, NULL, NULL, NULL, NULL);
        $this->model->deleteSpil($spil);
    }

    public function edit($idSpil, $text) {
        $spil = new SpilImpl($idSpil, $text, NULL, NULL, NULL, NULL, NULL);
        $this->model->updateSpil($spil);
    }

    public function listMsgs($idUser) {
        $model = new SpilModelImpl();
        $this->model->listByUser($idUser);
    }

    public function report() {
        //TODO
    }

    public function write($text, $idUser, $writeDate, $adultContent) {
        $spil = new SpilImpl(NULL, $text, $idUser, $writeDate, 0, $adultContent, FALSE);
        $this->model->newSpil($spil);
    }

}
