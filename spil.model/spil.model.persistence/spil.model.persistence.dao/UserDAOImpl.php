<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.persistence/UserDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/spil.model/spil.model.entity/UserImpl.php';

class UserDAOImpl implements UserDAO {

    public function create($user) {
        $ret = TRUE;

        $query = "INSERT INTO usuario (usuario, contrasenya, nombre, apellidos, fechaNacimiento, fechaAlta, esModerador,numReportes,avatar)"
                . "VALUES ('" . $user->getUsuario() . "','" . password_hash($user->getContrasenya(), PASSWORD_DEFAULT) . "','" . $user->getNombre() . "','"
                . $user->getApellidos() . "','" . $user->getFechaNacimiento() . "','" . $user->getFechaAlta() . "', 0,0,'default.png')";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            
        }

        return $ret;
    }

    public function delete($pk) {
        $ret = TRUE;
        $query = "DELETE FROM usuario WHERE usuario = '" . $pk . "';";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function updatePassword($user) {
        $ret = TRUE;
        $query = "UPDATE usuario SET contrasenya = '" . password_hash($user->getContrasenya(), PASSWORD_DEFAULT) . "' WHERE usuario = '" . $user->getUsuario() . "'";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listSeguidores($pk) {
        $listaUsuarios = Array();

        $query = "SELECT idUsuarioSeguidor FROM seguidores WHERE idUsuarioSeguido = '" . $pk . "'";

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
            // echo 'No se pudieron descargar los usuarios de la base de datos.';
            return FALSE;
        } else {
            while ($row = $res->fetch_assoc()) {
                $query = 'SELECT usuario, avatar FROM usuario WHERE usuario = "' . $row['idUsuarioSeguidor'] . '"';

                if (!($data = ConnectionSingleton::getConn()->query($query))) {
                    //echo 'No se pudieron descargar los usuarios de la base de datos.';
                    return FALSE;
                } else {
                    $userAvatar = $data->fetch_assoc();
                    $userRecovered = new UserImpl($userAvatar['usuario'], null, null, null, null, null, $userAvatar['avatar']);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    function listSeguidos($pk) {
        $listaUsuarios = Array();

        $query = 'SELECT idUsuarioSeguido FROM seguidores WHERE idUsuarioSeguidor = "' . $pk . '"';

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
            //echo 'No se pudieron descargar los usuarios de la base de datos.';
            return FALSE;
        } else {
            while ($row = $res->fetch_assoc()) {
                $query = 'SELECT usuario, avatar FROM usuario WHERE usuario = "' . $row['idUsuarioSeguido'] . '"';

                if (!($data = ConnectionSingleton::getConn()->query($query))) {
                    echo 'No se pudieron descargar los usuarios de la base de datos.';
                    return FALSE;
                } else {
                    $userAvatar = $data->fetch_assoc();

                    $userRecovered = new UserImpl($userAvatar['usuario'], null, null, null, null, null, $userAvatar['avatar']);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    public function getNumFollowers($user) {
        $query = 'SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguido = "' . $user . '"';

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
            // echo 'No se pudieron comprobar los seguidores.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row())) {
                $res = $row[0];
            } else {
                return false;
            }
        }

        return $res;
    }

    public function getNumFollows($user) {
        $query = "SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguidor = '" . $user . "'";

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
            //echo 'No se pudieron comprobar los seguidos.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row())) {
                $res = $row[0];
            } else {
                return false;
            }
        }

        return $res;
    }

    public function updateAvatar($user) {
        $ret = TRUE;
        $query = "UPDATE usuario SET avatar = '" . $user->getAvatar() . "' WHERE usuario = '" . $user->getUsuario() . "';";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function addReport($id) {
        $ret = TRUE;
        $query = "UPDATE usuario SET numReportes=(numReportes + 1) WHERE usuario = '" . $id . "';";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public static function isGoodLogin($user, $pass) {

        $res = False;

        $query = "SELECT contrasenya FROM usuario WHERE UPPER(usuario) like UPPER('" . $user . "') LIMIT 1";

        if (!($result = ConnectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        } else if ($row = mysqli_fetch_array($result)) {
            $res = password_verify($pass, $row['contrasenya']);
        }




        return $res;
    }

    public function addfollower($idSeguidor, $idSeguido) {
        $res = True;
        $query = "INSERT INTO seguidores (idUsuarioSeguidor, idUsuarioSeguido)VALUES ('" . $idSeguidor . "','" . $idSeguido . "');";

        if (!($result = ConnectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        }
        return $res;
    }

    public function removefollower($idSeguidor, $idSeguido) {
        $res = True;
        $query = "DELETE FROM seguidores WHERE idUsuarioSeguidor = '" . $idSeguidor . "'AND idUsuarioSeguido ='" . $idSeguido . "';";

        if (!($result = ConnectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        }
        return $res;
    }

    public function ascenderModerador($idUsuario) {

        $ret = TRUE;
        $query = "UPDATE usuario SET esModerador=1 WHERE usuario = '" . $idUsuario . "';";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public static function EsSeguido($idSeguido, $idSeguidor) {

        $res = False;

        $query = "SELECT *  FROM seguidores WHERE idUsuarioSeguidor = '" . $idSeguidor . "' AND "
                . "idUsuarioSeguido ='" . $idSeguido . "' LIMIT 1";

        if (!($result = ConnectionSingleton::getConn()->query($query))) {
            $res = FALSE;
            echo "error";
        } else if ($row = mysqli_fetch_array($result)) {
            $res = TRUE;
        }

        return $res;
    }

    public static function getAvatar($user) {
        $res = True;
        $query = "SELECT avatar FROM usuario WHERE usuario = '$user'";

        if (!($ret = ConnectionSingleton::getConn()->query($query))) {
            // echo 'No se pudieron comprobar los seguidores.';
            return FALSE;
        } else {
            while ($row = $ret->fetch_row()) {
                $res = $row[0];
            } /*else {
                return false;
            }*/
        }

        return $res;
    }

    public static function getRank5() {
        $listaUsuarios = Array(Array());

        $query = "SELECT usuario,avatar,count(*) as 'cuenta' FROM usuario a, megusta b, spil c WHERE  "
                . "  b.idMensaje=c.id and c.idUsuario=a.usuario group by usuario,avatar order by count(*) DESC LIMIT 5";

        if (!($res = ConnectionSingleton::getConn()->query($query))) {
             echo 'No se pudieron comprobar los seguidores.';
            return FALSE;
        } else {
            $i=0;
            while ($row = $res->fetch_row()) {
                //$res = $row->fetch_assoc();
                //array_push($listaUsuarios, ["user" => $userRecovered, "num" => $row['cuenta']]);
                $listaUsuarios[$i][0] = $row[0];
                $listaUsuarios[$i][1] = $row[1];                
                $listaUsuarios[$i++][2] = $row[2];                
            }
        }

        return $listaUsuarios;
    }
    
    public static function isModerator($user){
        $query = "SELECT esModerador FROM usuario WHERE usuario='$user';";
        $ret = 0;
        
        if(!($res = ConnectionSingleton::getConn()->query($query))){
            return false;
        }else{
            while($row = $res->fetch_row()){
            $ret = $row[0];
            }
        }
        
        return $ret;
    }

}
