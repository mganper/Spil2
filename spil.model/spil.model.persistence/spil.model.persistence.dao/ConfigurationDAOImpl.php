<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/ConfigurationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/ConfigurationImpl.php';

class ConfigurationDAOImpl implements ConfigurationDAO {

    public function create($configuration) {
        $ret = TRUE;

        $query = 'INSERT INTO configuracion (idUsuario, temaOscuro, privacidadSpils, modoAdulto) VALUES '
                . '("' . $configuration->getIdUsuario() . '", "' . $configuration->isTemaOscuro() . '", "'
                . $configuration->isPrivacidadSpils() . '", "' . $configuration->isModoAdulto() . '")';

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($pk) {
        $ret = TRUE;

        $query = 'DELETE FROM configuracion WHERE idUsuario = "' . $pk . '"';

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function read($pk) {
        $query = 'SELECT * FROM configuracion WHERE idUsuario = "' . $pk . '"';

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los usuarios de la base de datos.';
            return FALSE;
        } else {
            $confRec = $res->fetch_assoc();
            
            $conf = new ConfigurationImpl($pk, $confRec['temaOscuro'], $confRec['privacidadSpils'], $confRec['modoAdulto']);
        }
        
        return $conf;
    }

    public function update($configuration) {
        $ret = TRUE;
        
        $query = 'UPDATE configuracion SET temaOscuro = "' . $configuration->isTemaOscuro() .'", privacidadSpils = "' . $configuration->isPrivacidadSpils() 
                .'", modoAdulto = "' . $configuration->isModoAdulto() . '" WHERE idUsuario = "' . $configuration->getIdUsuario() .'"' ;
        
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

}
