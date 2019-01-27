<?php

interface User {
    public function getUsuario();
    
    public function getContrasenya();
    
    public function getAvatar();
    
    public function isModerador();
    
    public function getNombre();
    
    public function getApellidos();
    
    public function getFechaNacimiento();
    
    public function getFechaAlta();
    
    public function getTokenAcceso();
    
    public function getFechaToken();
    
    public function getNumReportes();
    
    public function setUsuario($value);
    
    public function setContrasenya($value);
    
    public function setAvatar($value);
    
    public function setModerador($value);
    
    public function setNombre($value);
    
    public function setApellidos($value);
    
    public function setFechaNacimiento($value);
    
    public function setFechaAlta($value);
    
    public function setTokenAcceso($value);
    
    public function setFechaToken($value);
    
    public function setNumReportes($value);
}
