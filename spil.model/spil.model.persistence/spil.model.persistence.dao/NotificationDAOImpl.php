<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/NotificationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
class NotificationDAOImpl implements NotificationDAO{
    //TODO CERRAR LAS CONEXIONES
    
    public function create($notification) {
        $ret = TRUE;
        $query = "INSERT INTO notificaciones(idNotificacion, idUsuario, texto) VALUES (NULL, '"
                . $notification->getIdUser() . "', '"
                . $notification->getText() . "');";
        
        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function delete($notification) {
        $ret = TRUE;
        $query = 'DELETE FROM notificaciones WHERE idNotificacion = ' . $notification->getIdNotification() . ';';

        //echo $query;
        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'fallo';
        }

        return $ret;
    }

    public function listByUser($idUser) {
        $notification = Array();
        $i;
        $query = "SELECT * FROM notificaciones WHERE idUsuario='$idUser';";

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
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
        $query = "SELECT * FROM notificaciones WHERE idUsuario=$pk;";

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
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
        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo '<br>'.'fallo';
        }

        return $ret;
    }

}
