<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/NotificationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/connectionSingleton.php';
class NotificationDAOImpl implements NotificationDAO{
    //TODO CERRAR LAS CONEXIONES
    
    public function create($notification) {
        $ret = TRUE;
        $query = "INSERT INTO NOTIFICACIONES(idNotificacion, idUsuario, texto) VALUES (NULL, '"
                . $notification->getIdUser() . "', '"
                . $notification->getText() . "');";
        
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function delete($notification) {
        $ret = TRUE;
        $query = 'DELETE FROM NOTIFICACIONES WHERE idNotificacion = ' . $notification->getIdNotification() . ';';

        //echo $query;
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'fallo';
        }

        return $ret;
    }

    public function listByUser($idUser) {
        $notification = Array();
        $i;
        $query = "SELECT * FROM NOTIFICACIONES WHERE idUsuario='$idUser';";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar las notificaciones de la base de datos.';
            return FALSE;
        } else {
            $i = 0;
            while ($row = $res->fetch_row()) {
                //echo '<br/>'.$i.'<br/>';
                //print_r($row);
                $notification[$i] = new NotificationImpl(NULL,NULL,NULL);
                $notification[$i]->setIdNotification($row[0]);
                $notification[$i]->setText($row[2]);
                $notification[$i++]->setIdUser($row[1]);
            }
        }

        return $notification;
    }

    public function read($pk) {
        $notification = new NotificationImpl();
        $query = "SELECT * FROM NOTIFICACIONES WHERE idUsuario=$pk;";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar las notificaciones de la base de datos.';
            return FALSE;
        } else {
            if(($row = $res->fetch_row()) === 1) {
                $notification->setIdNotificaion($row[0]);
                $notification->setText($row[1]);
                $notification->setIdUser($row[2]);
            }else{
                return FALSE;
            }
        }

        return $notification;
    }

    public function update($notification) {
        $ret = TRUE;
        $query = "UPDATE notificaciones SET texto='" . $notification->getText() . "' WHERE idNotificacion =" . $notification->getIdNotification() . ";";

        echo $query;
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo '<br>'.'fallo';
        }

        return $ret;
    }

}
