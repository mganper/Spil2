<?php

interface Configuration {

    public function getIdUsuario();

    public function isTemaOscuro();

    public function isPrivacidadSpils();

    public function isModoAdulto();

    public function setIdUsuario($value);

    public function setTemaOscuro($value);

    public function setPrivacidadSpils($value);

    public function setModoAdulto($value);
}
