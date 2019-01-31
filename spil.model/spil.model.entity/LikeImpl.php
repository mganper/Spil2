<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/spil.model/spil.model.entity/Like.php';

class LikeImpl implements Like {

    private $idUsuario;
    private $idMensaje;

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdMensaje() {
        return $this->idMensaje;
    }

    function __construct($idMensaje, $idUsuario) {
        $this->idUsuario = $idUsuario;
        $this->idMensaje = $idMensaje;
    }

}