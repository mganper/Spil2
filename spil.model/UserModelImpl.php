<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/UserModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/UserDAOImpl.php';

class UserModelImpl implements UserModel {

    private $controller;

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function getController() {
        return $this->controller;
    }

    public function deleteUser($idUsuario) {
        $dao = $this->getUsuarioDAO();
        return $dao->delete($idUsuario);
    }

    public function listaSeguidores($idUsuario) {
        $dao = $this->getUsuarioDAO();
        return $dao->listSeguidores($idUsuario);
    }

    public function listaSeguidos($idUsuario) {
        $dao = $this->getUsuarioDAO();
        return $dao->listSeguidos($idUsuario);
    }

    public function newUser($user) {
        $dao = $this->getUsuarioDAO();
        return $dao->create($user);
    }

    public function getNumSeguidores($id) {
        $dao = $this->getUsuarioDAO();
        return $dao->getNumFollowers($id);
    }

    public function getNumSeguidos($id) {
        $dao = $this->getUsuarioDAO();
        return $dao->getNumFollows($id);
    }

    public function updatePassword($user) {
        $dao = $this->getUsuarioDAO();
        return $dao->updatePassword($user);
    }

    public function updateAvatar($user) {
        $dao = $this->getUsuarioDAO();
        return $dao->updateAvatar($user);
    }

    private function getUsuarioDAO() {
        return new UserDAOImpl();
    }

    public function addReport($id) {
        $dao = $this->getUsuarioDAO();
        return $dao->addReport($id);
    }

    public function addfollower($idSeguidor, $idSeguido) {
        $dao = $this->getUsuarioDAO();
        return $dao->addfollower($idSeguidor, $idSeguido);
    }

    public function removefollower($idSeguidor, $idSeguido) {
        $dao = $this->getUsuarioDAO();
        return $dao->removefollower($idSeguidor, $idSeguido);
    }

    public function ascenderModerador($idUsuario) {
        $dao = $this->getUsuarioDAO();

        return $dao->ascenderModerador($idUsuario);
    }

}
