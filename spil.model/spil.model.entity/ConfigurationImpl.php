<?php

class ConfigurationImpl implements Configuration{

    private $idUsuario;
    private $temaOscuro;
    private $privacidadSpils;
    private $modoAdulto;

    function __construct($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto) {
        $this->idUsuario = $idUsuario;
        $this->temaOscuro = $temaOscuro;
        $this->privacidadSpils = $privacidadSpils;
        $this->modoAdulto = $modoAdulto;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function isTemaOscuro() {
        return $this->temaOscuro;
    }

    public function isPrivacidadSpils() {
        return $this->privacidadSpils;
    }

    public function isModoAdulto() {
        return $this->modoAdulto;
    }

    public function setIdUsuario($value) {
        $this->idUsuario = $value;
    }

    public function setTemaOscuro($value) {
        $this->temaOscuro = $value;
    }

    public function setPrivacidadSpils($value) {
        $this->privacidadSpils = $value;
    }

    public function setModoAdulto($value) {
        $this->modoAdulto = $value;
    }
}
