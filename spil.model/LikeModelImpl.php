<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/LikeModel.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/spil.model.persistence.dao/LikeDAOImpl.php';

class LikeModelImpl implements LikeModel {

    //put your code here
    function __construct() {
        
    }

    public function nuevoLike($like) {
        $dao = $this->obtenerImplementacionLikeDao();
        return $dao->create($like);
    }

    public function obtenerLike($idMensaje, $idUsuario) {
        $dao = $this->obtenerImplementacionLikeDao();
        return $dao->read($idMensaje, $idUsuario, idMensaje, $idUsuario);
    }

    public function eliminarLike($like) {
        $dao = $this->obtenerImplementacionLikeDao();
        $dao->delete($like);
    }

    public function listarLikesPorMensaje($idMensaje) {
        $dao = $this->obtenerImplementacionLikeDao();
        return $dao->listed($idMensaje);
    }

// tanto listar por usuario como mensaje usan el mismo metodo listed de dao, pero 
    // este en funcion de typeof la entrada realizara la consulta en consecuencia

    public function listarLikesPorUsuario($idUsuario) {
        $dao = $this->obtenerImplementacionLikeDao();
        return $dao->listed($idUsuario);
    }

    private function obtenerImplementacionLikeDao() {
        return new LikeDAOImpl();
        //CUIDADO CON INTERFAZ PHP ¿deberiamos trabajar con interfaz?
    }

}
