<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\UserModelImpl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.model\spil.model.entity\UserImpl.php';

class UserControllerImpl implements UserController {

    private $model;

    function __construct() {
        $this->model = new UserModelImpl();
        return $this->model->setController($this);
    }

    public function createUser($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento) {
        $res = False;
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        $contrasenya = filter_var($contrasenya, FILTER_SANITIZE_STRING);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
        $fechaNacimiento = filter_var($fechaNacimiento, FILTER_SANITIZE_STRING);


        $user = new UserImpl($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento, date('Y-m-d'), NULL);


        if ($res2 = $this->model->newUser($user)) {
            $res = True;
            session_start();
            $_SESSION['usuario'] = $usuario;
        }
        return $res;
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

    public function modifyPassword($idusuario, $oldPass, $newPass) {

        $res = false;
        if (RespilDAOImpl::isgoodLogin($idusuario, $oldPass)) {
            $user = new UserImpl($idusuario, $newPass, NULL, NULL, NULL, NULL, NULL);
            $res = $this->model->updatePassword($user);
            $res = true;
        }
        return $res;
    }

    public function addReport($idUsuario) {
        return $this->model->addReport($idUsuario);
    }

}
