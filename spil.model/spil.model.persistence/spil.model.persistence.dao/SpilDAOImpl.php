<?php

class SpilDAOImpl implements SpilDAO {
    
    //TODO CERRAR LAS CONEXIONES
    
    public function create($spil) {
        $ret = TRUE;
        $query = "INSERT INTO SPIL('id', 'texto', 'idUsuario', 'fechaEscritura', 'numEdiciones', 'contenidoAdulto', 'reportado') VALUES (, '"
                . $spil->getText() . "', "
                . $spil->getIdUser() . ", '"
                . $spil->getWriteDate() . "', "
                . $spil->getEditNum() . ", "
                . $spil->getAdultContent() . ", "
                . FALSE . ");";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
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
        $spil = new SpilImpl();
        $query = "SELECT * FROM SPIL WHERE id=$pk";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los mensajes de la base de datos.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row()) === 1) {
                $spil->setId($row[0]);
                $spil->setText($row[1]);
                $spil->setIdUsuario($row[2]);
                $spil->setWriteDate($row[3]);
                $spil->setEditNum($row[4]);
                $spil->setAdultContent($row[5]);
                $spil->setReport($row[6]);
            }else {
                return false;
            }
        }
        
        return $spil;
    }

    public function update($spil) {
        $ret = TRUE;
        $query = "UPDATE SPIL SET text='" . $spil->getText() . "' WHERE ID=" . $spil->getId() . "';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listByUser($idUser) {
        $spil = Array(new SpilImpl());
        $i;
        $query = "SELECT * FROM SPIL WHERE idUsuario=$idUser ORDER BY fechaEscritura DESC;";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los mensajes de la base de datos.';
            return FALSE;
        } else {
            $i = 0;
            while (($row = $res->fetch_row())) {
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
