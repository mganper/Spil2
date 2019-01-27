<?php

class RespilImpl implements Respil{
   public $idMensaje;
   public $idUsuario;
}

function __construct($idMensaje, $idUsuario) {
    $this->idMensaje = $idMensaje;
    $this->idUsuario = $idUsuario;
}


function getIdMensaje() {
    return $this->idMensaje;
}

 function getIdUsuario() {
    return $this->idUsuario;
}


