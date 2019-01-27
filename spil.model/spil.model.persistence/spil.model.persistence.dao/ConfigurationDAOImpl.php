<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/ConfigurationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/ConfigurationImpl.php';

class ConfigurationDAOImpl implements ConfigurationDAO {

    public function create($configuration) {
        $ret = TRUE;

        $query = 'INSERT INTO configuracion (idsUsuario, temaOscuro, privacidadSpils, modoAdulto) VALUES '
                . '("' . $configuration->idUsuario . '", "' . $configuration->temaOscuro . '", "'
                . $configuration->privacidadSpils . '", "' . $configuration->modoAdulto . '")';

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($configuration) {
        $ret = TRUE;

        $query = 'DELETE FROM configuration WHERE idUsuario = "' . $configuration->idUsuario . '"';

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function read($pk) {
        $query = 'SELECT temaOscuro, privacidadSpils, modoAdulto FROM configuration WHERE idUsuario = "' . $pk . '"';

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
        
        $query = 'UPDATE configuracion SET temaOscuro = "' . $configuration->temaOscuro .'", privacidadSpils = "' . $configuration->privacidadSpils 
                .'", modoAdulto = "' . $configuration->modoAdulto . '" WHERE idUsuario = "' . $configuration->idUsuario .'"' ;
        
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

}
