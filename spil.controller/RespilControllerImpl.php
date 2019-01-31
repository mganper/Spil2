<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/RespilController.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/RespilModelImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/RespilImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/NotificationControllerImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/SpilControllerImpl.php';

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
        // $this->modelRespil->nuevoRespil($respil);
        
        $not = new NotificationControllerImpl();
        $sp = new SpilControllerImpl();
        $bueno = $sp->read($idMensaje)->getIdUser();

        $not->createNot($bueno, "El Usuario @$idUsuario Te hizo RESPIL");

        return $this->modelRespil->nuevoRespil($respil);
    }

    public function listarRespilsMensaje($idMensaje) {


        return $this->modelRespil->listarRespilsPorMensaje($idMensaje);
    }

    public function listarRespilsUsuario($idUsuario) {

        return $this->modelRespil->listarRespilsPorUsuario($idUsuario);
    }

}
