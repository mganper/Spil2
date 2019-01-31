<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/ConfigurationModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/spil.model.persistence.dao/ConfigurationDAOImpl.php';

class ConfigurationModelImpl implements ConfigurationModel {
    private $controller; 
    
    public function getController() {
        return $this->controller;
    }

    public function setController($controller) {
        $this->controller = $controller;
    }

    public function createConfiguration($configuration) {
        $dao = $this->getConfigurationDAO();
        return $dao->create($configuration);
    }

    public function deleteConfiguration($idUsuario) {
        $dao = $this->getConfigurationDAO();
        return $dao->delete($idUsuario);
    }

    public function getConfiguration($idUser) {
        $dao = $this->getConfigurationDAO();
        return $dao->read($idUser);
    }

    public function updateConfiguraiton($configuration) {
        $dao = $this->getConfigurationDAO();
        return $dao->update($configuration);
    }
    
    private function getConfigurationDAO(){
        return new ConfigurationDAOImpl();
    }

}
