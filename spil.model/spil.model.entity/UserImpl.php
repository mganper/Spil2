<?php

class UserImpl implements User{
    private $usuario;
    private $contrasenya;
    private $avatar;
    private $esModerador;
    private $nombre;
    private $apellidos;
    private $fechaNacimiento;
    private $fechaAlta;
    private $tokenAcceso;
    private $fechaToken;
    private $numReportes;
    
    function __construct($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento, $fechaAlta) {
        $this->usuario = $usuario;
        $this->contrasenya = $contrasenya;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->fechaAlta = $fechaAlta;
   }
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function getContrasenya(){
        return $this->contrasenya;
    }
    
    public function getAvatar(){
        return $this->avatar;
    }
    
    public function isModerador(){
        return $this->esModerador;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellidos(){
        return $this->apellidos;
    }
    
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    
    public function getFechaAlta(){
        return $this->fechaAlta;
    }
    
    public function getTokenAcceso(){
        return $this->tokenAcceso;
    }
    
    public function getFechaToken(){
        return $this->fechaToken;
    }
    
    public function getNumReportes(){
        return $this->numReportes;
    }
    
    public function setUsuario($value){
        $this->usuario = $value;
    }
    
    public function setContrasenya($value){
        $this->contrasenya = $value;
    }
    
    public function setAvatar($value){
        $this->avatar = $value;
    }
    
    public function setModerador($value){
        $this->esModerador = $value;
    }
    
    public function setNombre($value){
        $this->nombre = $value;
    }
    
    public function setApellidos($value){
        $this->apellidos = $value;
    }
    
    public function setFechaNacimiento($value){
        $this->fechaNacimiento = $value;
    }
    
    public function setFechaAlta($value){
        $this->fechaAlta = $value;
    }
    
    public function setTokenAcceso($value){
        $this->tokenAcceso = $value;
    }
    
    public function setFechaToken($value){
        $this->fechaToken = $value;
    }
    
    public function setNumReportes($value){
        $this->numReportes = $value;
    }
    
}
