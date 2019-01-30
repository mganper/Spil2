<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\RespilModel.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.persistence\spil.model.persistence.dao\RespilDAOImpl.php';

class RespilModelImpl implements RespilModel {

    //private $respilController;
    function __construct() {
        
    }

//    public function getController() {
//       // return $respilcontroller;
//    }
//
//    public function setController(\RespilController $resCont) {
//       // $this->$RespilController = $resCont;
//    }

    public function nuevoRespil($respil) {
        $dao = $this->obtenerImplementacionRespilDao();
        return $dao->create($respil);
    }

    public function obtenerRespil($respil) {
        $dao = $this->obtenerImplementacionRespilDao();
        return $dao->read($respil->getIdMensaje(), $respil->getIdUsuario());
    }

    public function eliminarRespil($respil) {
        $dao = $this->obtenerImplementacionRespilDao();
        $dao->delete($respil);
    }

    public function listarRespilsPorMensaje($idMensaje) {
        $dao = $this->obtenerImplementacionRespilDao();
        return $dao->listed($idMensaje);
    }

    public function listarRespilsPorUsuario($idUsuario) {
        $dao = $this->obtenerImplementacionRespilDao();
        return $dao->listed($idUsuario);
    }

    private function obtenerImplementacionRespilDao() {
        return new RespilDAOImpl();
        //CUIDADO CON INTERFAZ PHP ¿deberiamos trabajar con interfaz?
    }

}
