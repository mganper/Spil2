<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeController.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\LikeModelImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.entity\LikeImpl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\NotificationControllerImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\SpilControllerImpl.php';

class LikeControllerImpl implements LikeController {

    private $modelLike;

    function __construct() {
        $this->modelLike = new LikeModelImpl();
    }

    public function borrarLikeGesture($idMensaje, $idUsuario) {
        $like = new LikeImpl($idMensaje, $idUsuario);
        return $this->modelLike->eliminarLike($like);
    }

    public function nuevoLikeGesture($idMensaje, $idUsuario) {
        $like = new LikeImpl($idMensaje, $idUsuario);

        $not = new NotificationControllerImpl();
        $sp = new SpilControllerImpl();
        $bueno = $sp->read($idUsuario)->getIdUser();

        $not->createNot($bueno, "El Usuario @$idUsuario Te ha dado LIKE");




        return $this->modelLike->nuevoLike($like);
    }

    public function listarMegustasMensaje($idMensaje) {
        return $this->modelLike->listarLikesPorMensaje($idMensaje);
    }

    public function listarMegustasUsuario($idUsuario) {

        return $this->modelLike->listarLikesPorusuario($idUsuario);
    }

}
