<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/SpilController.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/SpilModelImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/SpilImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/RespilControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/LikeControllerImpl.php';

class SpilControllerImpl implements SpilController {

    private $model;

    function __construct() {
        $this->model = new SpilModelImpl();
        return $this->model->setController($this);
    }

    public function delete($idSpil) {
        $spil = new SpilImpl($idSpil, NULL, NULL, NULL, NULL, NULL, NULL);
        $resp = new RespilControllerImpl();
        $lik = new LikeControllerImpl();

        LikeDAOImpl::deleteLikesMensaje($idSpil);
        RespilDAOImpl::deleteRespilsMensaje($idSpil);

        return $this->model->deleteSpil($spil);
    }

    public function edit($idSpil, $text) {
        $spil = new SpilImpl($idSpil, $text, NULL, NULL, NULL, NULL, NULL);
        return $this->model->updateSpil($spil);
    }

    public function listMsgs($idUser) {
        return $this->model->listByUser($idUser);
    }

    public function report($pk) {
        return $this->model->report($pk);
    }

    public function write($text, $idUser, $writeDate, $adultContent) {
        $spil = new SpilImpl(NULL, $text, $idUser, $writeDate, 0, $adultContent, FALSE);
        return $this->model->newSpil($spil);
    }

    public function read($idSpil) {
        return $this->model->getSpil($idSpil);
    }

}
