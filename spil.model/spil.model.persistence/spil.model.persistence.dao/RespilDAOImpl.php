<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/RespilDAO.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/connectionSingleton.php';

class RespilDAOImpl implements RespilDAO {

    public function read($respil) {
        $respil = FALSE;

        $query = "SELECT * FROM respil WHERE idMensaje ='" + $respil->getIdMensaje() +
                "' and idUsuario = '" + $respil->getIdUsuario() + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            echo "no encontrado RESPIL"; /////////////ELIMINAR/MODIFICAR!!!
        } else {

            $Respil = new RespilImpl($result["idMensaje"], $result["idUsuario"]);
            //  mysqli_close($con);
        }
        return $respil;
    }

    public function create($respil) {


        $query = "INSERT INTO respil (idMensaje,idUsuario) VALUES( '" . $respil->getIdMensaje() . "' ,  '" . $respil->getIdUsuario() . "');";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {
            return false;
        } else {
            return true;
        }
        
        
    }

    public function delete($respil) {
        $res = TRUE;


        $query = "DELETE FROM respil WHERE idMensaje ='" . $respil->getIdMensaje() . "
                ' and idUsuario = '" . $respil->getIdUsuario() . "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo "no encontrado RESPIL, no posible borrado"; /////////////ELIMINAR/MODIFICAR!!!
        } else {
            $res = FALSE;
            // mysqli_close($con);
        }
        return $res;
    }

    public function listed($identificador) {

        $respils = FALSE;

        if (gettype($identificador) === 'string') {

            $respils = $this->listaRespilUsuario($identificador);
        } elseif (gettype($identificador) === 'integer') {

            $respils = $this->listaRespilMensaje($identificador);
        } else {
            echo"FALLO EN LISTED RESPILDAOIML FORMATO DE "
            . "IDENTIFICADOR NO PASA CRIBA";
        }
        return $respils;
    }

    private function listaRespilUsuario($idUsuario) {
        $pepe = FALSE;
        $cont = 0;

        $query = "SELECT * FROM respil WHERE idUsuario = '$idUsuario';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo"no encontrado RESPIL// error consulta"; /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysqli_fetch_array($result)) {

                $pepe[$cont++] = new RespilImpl($row['idMensaje'], $row['idUsuario']);
            }


            // mysqli_close($con);
        }
        return $pepe;
    }

    private function listaRespilMensaje($idMensaje) {
        $respils = FALSE;
        $cont = 0;

        $query = "SELECT * FROM respil WHERE idMensaje = '$idMensaje';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo "no encontrado RESPIL// error consulta"; /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysqli_fetch_array($result)) {
                $respils[$cont++] = new RespilImpl($row['idMensaje'], $row['idUsuario']);
            }


            //mysqli_close($con);
        }
        return $respils;
    }

    public static function tieneRespil($idMensaje, $idUsuario) {


        $res = False;

        $query = "SELECT 1 FROM megusta WHERE idUsuario = $idUsuario and idMensaje=$idMensaje LIMIT 1";

        if (!($result = connectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        } else if ($row = mysqli_fetch_array($result)) {
            $res = TRUE;
        }

        return $res;
    }
    
     public static function deleteRespilsMensaje($idMensaje) {



        $query = "DELETE FROM respil WHERE idMensaje ='" . $idMensaje .
                "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {


           return FALSE; 
        }
        return TRUE;
        //  mysqli_close($con);
    }

}
