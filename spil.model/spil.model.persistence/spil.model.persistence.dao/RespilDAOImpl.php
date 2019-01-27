<?php

class RespilDAOImpl implements RespilDAO {

    public function read($idMensaje, $idUsuario) {
        $respil = null;

        $query = "SELECT * FROM respil WHERE idMensaje ='" + $idMensaje +
                "' and idUsuario = '" + $idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            $Respil = new RespilImpl($result["idMensaje"], $result["idUsuario"]);
            $con->closeConn();
        }
        return $respil;
    }

    public function create($respil) {
        $respil = null;

        $query = "INSERT INTO RESPIL respil (idMensaje,idUsuario) VALUES(" + $respil->getIdMensaje() + "," + $respil->getIdUsuario + ");";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no Creado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {


            $con->closeConn();
        }
    }

    public function delete($respil) {

        $respil = null;

        $query = "DELETE FROM respil WHERE idMensaje ='" + $respil->idMensaje +
                "' and idUsuario = '" + $respil->idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL, no posible borrado"); /////////////ELIMINAR/MODIFICAR!!!
        } else {
            $con->closeConn();
        }
    }

    public function listed($identificador) {
        $respils[];


        if (gettype($identificador) === string) {
            $respils = listaRespilUsuario($identificador);
        } elseif (gettype($identificador) === integer) {
            $respils = listaRespilMensaje($identificador);
        } else {
            alert("FALLO EN LISTED RESPILDAOIML FORMATO DE "
                    . "IDENTIFICADOR NO PASA CRIBA");
        }
        return $respils;
    }

    private function listaRespilUsuario($idUsuario) {
        $respils[];
        $cont = 0;

        $query = "SELECT * FROM respil WHERE idUsuario = '" + $idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysql_fetch_array($result)) {
                $respils[$cont++] = new RespilImpl($row['idMensaje'], $row['idUsuario']);
            }


            $con->closeConn();
        }
        return $respils;
    }

    private function listaRespilMensaje($idMensaje) {
        $respils[];
        $cont = 0;

        $query = "SELECT * FROM respil WHERE idMensaje = '" + $idMensaje + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            alert("no encontrado RESPIL// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysql_fetch_array($result)) {
                $respils[$cont++] = new RespilImpl($row['idMensaje'], $row['idUsuario']);
            }


            $con->closeConn();
        }
        return $respils;
    }

}
