<?php

class LikeDAOImpl implements LikeDAO {
     public function read($idMensaje, $idUsuario) {
        $like = null;

        $query = "SELECT * FROM like WHERE idMensaje ='" + $idMensaje +
                "' and idUsuario = '" + $idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            $Like = new LikeImpl($result["idMensaje"], $result["idUsuario"]);
            $con->closeConn();
        }
        return $like;
    }

    public function create($like) {
        $like = null;

        $query = "INSERT INTO RESPIL like (idMensaje,idUsuario) VALUES(" + $like->getIdMensaje() + "," + $like->getIdUsuario + ");";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no Creado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {


            $con->closeConn();
        }
    }

    public function delete($like) {

        $like = null;

        $query = "DELETE FROM like WHERE idMensaje ='" + $like->idMensaje +
                "' and idUsuario = '" + $like->idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL, no posible borrado"); /////////////ELIMINAR/MODIFICAR!!!
        } else {
            $con->closeConn();
        }
    }

    public function listed($identificador) {
        $likes[];


        if (gettype($identificador) === string) {
            $likes = listaLikeUsuario($identificador);
        } elseif (gettype($identificador) === integer) {
            $likes = listaLikeMensaje($identificador);
        } else {
            alert("FALLO EN LISTED RESPILDAOIML FORMATO DE "
                    . "IDENTIFICADOR NO PASA CRIBA");
        }
        return $likes;
    }

    private function listaLikeUsuario($idUsuario) {
        $likes[];
        $cont = 0;

        $query = "SELECT * FROM like WHERE idUsuario = '" + $idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysql_fetch_array($result)) {
                $likes[$cont++] = new LikeImpl($row['idMensaje'], $row['idUsuario']);
            }


            $con->closeConn();
        }
        return $likes;
    }

    private function listaLikeMensaje($idMensaje) {
        $likes[];
        $cont = 0;

        $query = "SELECT * FROM like WHERE idMensaje = '" + $idMensaje + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysql_fetch_array($result)) {
                $likes[$cont++] = new LikeImpl($row['idMensaje'], $row['idUsuario']);
            }


            $con->closeConn();
        }
        return $likes;
    }

}
