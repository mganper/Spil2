<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Spil2/spil.model/spil.model.persistence/SpilDAO.php';

require_once $_SERVER['DOCUMENT_ROOT'].'/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/connectionSingleton.php';

class SpilDAOImpl implements SpilDAO {    
    
    public function create($spil) {
        $ret = TRUE;
        if($spil->getAdultContent()){
            $adult = 1;
        }else{
            $adult = 0;
        }
        $query = "INSERT INTO SPIL(id, texto, idUsuario, fechaEscritura, numEdiciones, contenidoAdulto, reportado) VALUES (NULL, '"
                . $spil->getText() . "', '"
                . $spil->getIdUser() . "', '"
                . $spil->getWriteDate() . "', 0, $adult, 0);";

        //echo $query;
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($spil) {
        $ret = TRUE;
        $query = 'DELETE FROM SPIL WHERE ID = ' . $spil->getId() . ';';

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function read($pk) {
        $spil = new SpilImpl(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
        $query = "SELECT * FROM SPIL WHERE id=$pk";

        
        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los mensajes de la base de datos.';
            return FALSE;
        } else {
            if ($row = $res->fetch_row()) {
                $spil->setId($row[0]);
                $spil->setText($row[1]);
                $spil->setIdUser($row[2]);
                $spil->setWriteDate($row[3]);
                $spil->setEditNum($row[4]);
                $spil->setAdultContent($row[5]);
                $spil->setReport($row[6]);
                //print_r($spil);
            }else {
                return false;
            }
        }
        
        return $spil;
    }

    public function update($spil) {
        $ret = TRUE;
        $query = "UPDATE spil SET texto = '" . $spil->getText() . "' WHERE id=" . $spil->getId() . ";";

        echo $query;
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'fallo';
        }

        return $ret;
    }
    
    public function report($pk) {
        $ret = TRUE;
        $query = "UPDATE spil SET reportado = 1 WHERE id=$pk;";

        echo $query;
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'fallo';
        }

        return $ret;
    }

    public function listByUser($idUser) {
        $spil = Array();
        $i;
        $query = "SELECT * FROM SPIL WHERE idUsuario='$idUser' ORDER BY fechaEscritura DESC;";
        
        //echo $query;

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los mensajes de la base de datos.';
            return FALSE;
        } else {
            $i = 0;
            while ($row = $res->fetch_row()) {
                $spil[$i] = new SpilImpl(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
                $spil[$i]->setId($row[0]);
                $spil[$i]->setText($row[1]);
                $spil[$i]->setIdUser($row[2]);
                $spil[$i]->setWriteDate($row[3]);
                $spil[$i]->setEditNum($row[4]);
                $spil[$i]->setAdultContent($row[5]);
                $spil[$i++]->setReport($row[6]);
            }
        }

        return $spil;
    }

}
