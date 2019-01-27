<?php

class RespilModelImpl implements RespilModel {

    private $respilController;

    public function getController() {
        return $respilcontroller;
    }

    public function setController(\RespilController $resCont) {
        $this->$RespilController = $resCont;
    }

    public function nuevoRespil(\Respil $respil) {
        $dao = $this->obtenerImplementacionRespilDao();
        $dao->create($respil);
        $this->respilController->fireDataModelChanged();
    }

    public function obtenerRespil($idMensaje, $idUsuario) {
        $dao = $this->obtenerImplementacionRespilDao();
        return $dao->read($idMensaje, $idUsuario);
    }

    public function eliminarRespil(\Respil $respil) {
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
