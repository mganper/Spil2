<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilController.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\RespilModelImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.entity\RespilImpl.php';

class RespilControllerImpl implements RespilController {

    private $modelRespil;

    function __construct() {
        $this->modelRespil = new RespilModelImpl();
    }

    public function borrarRespilGesture($idMensaje, $idUsuario) {
        $respil = new RespilImpl($idMensaje, $idUsuario);
        $this->modelRespil->eliminarRespil($respil);
    }

    public function nuevoRespilGesture($idMensaje, $idUsuario) {

        $respil = new RespilImpl($idMensaje, $idUsuario);
        $this->modelRespil->nuevoRespil($respil);
    }

    public function listarRespilsMensaje($idMensaje) {
        

        return $this->modelRespil->listarRespilsPorMensaje($idMensaje);
    }

    public function listarRespilsUsuario($idUsuario) {
       
        return $this->modelRespil->listarRespilsPorUsuario($idUsuario);
    }

}
