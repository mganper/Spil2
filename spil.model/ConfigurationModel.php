<?php

interface ConfigurationModel {

    function getController();

    function setController($controller);

    function createConfiguration($configuration);

    function deleteConfiguration($idusuario);

    function updateConfiguraiton($configuration);
    
    function getConfiguration($idUser);
}
