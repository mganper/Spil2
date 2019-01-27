<?php

class NotificationDAOImpl implements NotificationDAO{
    //TODO CERRAR LAS CONEXIONES
    
    public function create($notificaiton) {
        $ret = TRUE;
        $query = "INSERT INTO NOTIFICACIONES('idNotificacion', 'idUsuario', 'texto') VALUES (, " //TODO se deja o no en función de si es autoincremental.
                . $notificacion->getIdUsuario() . ", '"
                . $notificaiton->getText() . "');";
        
        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function delete($notification) {
        $ret = TRUE;
        $query = 'DELETE FROM SPIL WHERE ID = ' . $notification->getId() . ';';

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listByUser($idUser) {
        $notification = Array(new NotificationImpl());
        $i;
        $query = "SELECT * FROM SPIL WHERE idUsuario=$idUser ORDER BY fechaEscritura DESC;";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar las notificaciones de la base de datos.';
            return FALSE;
        } else {
            $i = 0;
            while (($row = $res->fetch_row())) {
                $notification[$i]->setIdNotificaion($row[0]);
                $notification[$i]->setText($row[1]);
                $notification[$i]->setIdUser($row[2]);
            }
        }

        return $notification;
    }

    public function read($pk) {
        $notification = new NotificationImpl();
        $query = "SELECT * FROM SPIL WHERE idUsuario=$pk;";

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
        $query = "UPDATE SPIL SET text='" . $notification->getText() . "' WHERE ID=" . $notification->getIdNotification() . "';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

}
