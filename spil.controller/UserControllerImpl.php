<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.controller/UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model/UserModelImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Spil2/spil.model/spil.model.entity/UserImpl.php';

class UserControllerImpl implements UserController{
    
    private $model;

    function __construct() {
        $this->model = new UserModelImpl();
        return $this->model->setController($this);
    }
    
    public function createUser($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento) {
        $user = new UserImpl($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento, new Date('y-m-d'), NULL);
        
        return $this->model->newUser($user);
    }

    public function deleteUser($idUsuario) {
        return $this->model->deleteUser($idUsuario);
    }

    public function getFollowers($idUsuario) {
        return $this->model->listaSeguidores($idUsuario);
    }

    public function getFollows($idUsuario) {
        return $this->model->listaSeguidos($idUsuario);
    }

    public function getNumFollowers($idUsuario) {
        return $this->model->getNumSeguidores($idUsuario);
    }

    public function getNumFollows($idUsuario) {
        return $this->model->getNumSeguidos($idUsuario);
    }

    public function modifyAvatar($idusuario, $newAvatar) {
        $user = new UserImpl($idusuario, NULL, NULL, NULL, NULL, NULL, $newAvatar);
        
        return $this->model->updateAvatar($user);
    }

    public function modifyPassword($idusuario, $newPass) {
        $user = new UserImpl($idusuario, $newPass, NULL, NULL, NULL, NULL, NULL);
        
        return $this->model->updateAvatar($user);
    }

    public function addReport($idUsuario) {
        return $this->model->addReport($idUsuario);
    }

}
