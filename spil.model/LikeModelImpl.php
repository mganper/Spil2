<?php

class LikeModelImpl implements LikeModel {
    //put your code here
   
    private $likeController;

    public function getController() {
        return $likecontroller;
    }

    public function setController(\LikeController $resCont) {
        $this->$LikeController = $resCont;
    }

    public function nuevoLike(\Like $like) {
        $dao = $this->obtenerImplementacionRLikeDao();
        $dao->create($like);
        $this->likeController->fireDataModelChanged();
    }

    public function obtenerLike($idMensaje, $idUsuario) {
        $dao = $this->obtenerImplementacionLikeDao();
        return $dao->read($idMensaje, $idUsuario);
    }

    public function eliminarLike(\Like $kike) {
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
