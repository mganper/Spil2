<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/LikeDAO.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/connectionSingleton.php';

class LikeDAOImpl implements LikeDAO {

    public function read($idMensaje, $idUsuario) {


        $query = "SELECT * FROM megusta WHERE idMensaje ='" + $idMensaje +
                "' and idUsuario = '" + $idUsuario + "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $conn->query($query))) {

            echo("no encontrado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            $Like = new LikeImpl($result["idMensaje"], $result["idUsuario"]);
            //    mysqli_close($con);
        }
        return $like;
    }

    public function create($like) {


        $query = "INSERT INTO megusta (idMensaje,idUsuario) VALUES('" . $like->getIdMensaje() . "','" . $like->getIdUsuario() . "');";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo("no Creado RESPIL"); /////////////ELIMINAR/MODIFICAR!!!
        } else {
            return TRUE;
        }
        
        return FALSE;
    }

    public function delete($like) {



        $query = "DELETE FROM megusta WHERE idMensaje ='" . $like->getIdMensaje() .
                "' and idUsuario = '" . $like->getIdUsuario() . "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {


            echo("no encontrado RESPIL, no posible borrado"); /////////////ELIMINAR/MODIFICAR!!!
        }
        //  mysqli_close($con);
    }

    public function listed($identificador) {
        $likes = FALSE;


        if (gettype($identificador) === 'string') {

            $likes = $this->listaLikeUsuario($identificador);
        } elseif (gettype($identificador) === 'integer') {

            $likes = $this->listaLikeMensaje($identificador);
        } else {
            echo("FALLO EN LISTED LikeDAOIML FORMATO DE "
            . "IDENTIFICADOR NO PASA CRIBA");
        }
        return $likes;
    }

    private function listaLikeUsuario($idUsuario) {
        $likes = FALSE;
        $cont = 0;

        $query = "SELECT * FROM megusta WHERE idUsuario = '$idUsuario';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo("no encontrado like// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysqli_fetch_array($result)) {
                $likes[$cont++] = new LikeImpl($row['idMensaje'], $row['idUsuario']);
            }


            //  mysqli_close($con);
        }
        return $likes;
    }

    private function listaLikeMensaje($idMensaje) {
        $likes = FALSE;
        $cont = 0;

        $query = "SELECT * FROM megusta WHERE idMensaje = '$idMensaje';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {

            echo("  no encontrado LIKE// error consulta"); /////////////ELIMINAR/MODIFICAR!!!
        } else {

            while ($row = mysqli_fetch_array($result)) {
                $likes[$cont++] = new LikeImpl($row['idMensaje'], $row['idUsuario']);
            }


            //   mysqli_close($con);
        }
        return $likes;
    }

    public static function tieneLike($idMensaje, $idUsuario) {


        $res = False;

        $query = "SELECT 1 FROM megusta WHERE idUsuario = $idUsuario and idMensaje=$idMensaje LIMIT 1";

        if (!($result = connectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        } else if ($row = mysqli_fetch_array($result)) {
            $res = TRUE;
        }




        return $res;
    }
    
    public static function listMsgLikes($idUser){
        $query = "SELECT b.texto, b.idUsuario, b.fechaEscritura, a.idMensaje from megusta a, spil b WHERE a.idMensaje = b.id AND a.idUsuario='$idUser'";
        $likes;
        
        if (!($res = connectionSingleton::getConn()->query($query))) {
             echo 'No se pudieron comprobar los likes.';
            return FALSE;
        } else {
            $i=0;
            $likes = array();
            while ($row = $res->fetch_row()) {
                $j = 0;
                $likes[$i][$j] = $row[$j];
                $j++;
                $likes[$i][$j] = $row[$j];
                $j++;
                $likes[$i][$j] = $row[$j];
                $j++;
                $likes[$i][$j] = $row[$j];
                $i++;
            }
        }

        return $likes;
        
        
    }
    public static function deleteLikesMensaje($idMensaje) {



        $query = "DELETE FROM megusta WHERE idMensaje ='" . $idMensaje .
                "';";
        //try
        $con = connectionSingleton::getConn();

        if (!($result = $con->query($query))) {


           return FALSE; 
        }
        return TRUE;
      
    }
    

}
