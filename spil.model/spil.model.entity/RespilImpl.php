<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.entity/Respil.php';

class RespilImpl implements Respil {

    private $idMensaje;
    private $idUsuario;

    function __construct($idMensaje, $idUsuario) {
        $this->idMensaje = $idMensaje;
        $this->idUsuario = $idUsuario;
    }

    public function getIdMensaje() {
        return $this->idMensaje;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

}
