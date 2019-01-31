<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.controller/ConfigurationController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/ConfigurationModelImpl.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/spil.model/spil.model.entity/ConfigurationImpl.php';

class ConfigurationControllerImpl implements ConfigurationController{
    
    private $model;

    function __construct() {
        $this->model = new ConfigurationModelImpl();
        return $this->model->setController($this);
    }

    public function createConfiguration($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto) {
        $conf = new ConfigurationImpl($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto);
        
        return $this->model->createConfiguration($conf);
        
    }

    public function deleteConfiguration($idUsuario) {
        return $this->model->deleteConfiguration($idUsuario);
    }

    public function getConfiguration($idUsuario) {
        return $this->model->getConfiguration($idUsuario);
    }

    public function modifyConfiguration($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto) {
        $conf = new ConfigurationImpl($idUsuario, $temaOscuro, $privacidadSpils, $modoAdulto);
        
        return $this->model->updateConfiguraiton($conf);
    }

}
