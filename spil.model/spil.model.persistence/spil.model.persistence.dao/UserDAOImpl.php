<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/UserDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/UserImpl.php';

class UserDAOImpl implements UserDAO {

    public function create($user) {
        $ret = TRUE;

        $query = "INSERT INTO usuario (usuario, contrasenya, nombre, apellidos, fechaNacimiento, fechaAlta, esModerador,numReportes)"
                . "VALUES ('" . $user->getUsuario() . "','" . password_hash($user->getContrasenya(), PASSWORD_DEFAULT) . "','" . $user->getNombre() . "','"
                . $user->getApellidos() . "','" . $user->getFechaNacimiento() . "','" . $user->getFechaAlta() . "', 0,0)";

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            //echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($pk) {
        $ret = TRUE;
        $query = "DELETE FROM usuario WHERE usuario = '" . $pk . "';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function updatePassword($user) {
        $ret = TRUE;
        $query = "UPDATE usuario SET contrasenya = '" . password_hash($user->getContrasenya(), PASSWORD_DEFAULT) . "' WHERE usuario = '" . $user->getUsuario() . "'";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listSeguidores($pk) {
        $listaUsuarios = Array();

        $query = "SELECT idUsuarioSeguidor FROM seguidores WHERE idUsuarioSeguido = '" . $pk . "'";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los usuarios de la base de datos.';
            return FALSE;
        } else {
            while ($row = $res->fetch_assoc()) {
                $query = 'SELECT usuario, avatar FROM usuario WHERE usuario = "' . $row['idUsuarioSeguidor'] . '"';

                if (!($data = connectionSingleton::getConn()->query($query))) {
                    echo 'No se pudieron descargar los usuarios de la base de datos.';
                    return FALSE;
                } else {
                    $userAvatar = $data->fetch_assoc();

                    $userRecovered = new UserImpl($userAvatar['usuario'], $userAvatar['avatar'], null, null, null, null, null);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    function listSeguidos($pk) {
        $listaUsuarios = Array();

        $query = 'SELECT idUsuarioSeguido FROM seguidores WHERE idUsuarioSeguidor = "' . $pk . '"';

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron descargar los usuarios de la base de datos.';
            return FALSE;
        } else {
            while ($row = $res->fetch_assoc()) {
                $query = 'SELECT usuario, avatar FROM usuario WHERE usuario = "' . $row['idUsuarioSeguido'] . '"';

                if (!($data = connectionSingleton::getConn()->query($query))) {
                    echo 'No se pudieron descargar los usuarios de la base de datos.';
                    return FALSE;
                } else {
                    $userAvatar = $data->fetch_assoc();

                    $userRecovered = new UserImpl($userAvatar['usuario'], $userAvatar['avatar'], null, null, null, null, null);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    public function getNumFollowers($user) {
        $query = 'SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguido = "'. $user .'"';

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron comprobar los seguidores.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row()) ) {
                $res = $row[0];
            } else {
                return false;
            }
        }

        return $res;
    }

    public function getNumFollows($user) {
        $query = "SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguidor = '". $user ."'";

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron comprobar los seguidos.';
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

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function addReport($id) {
        $ret = TRUE;
        $query = "UPDATE usuario SET numReportes=(numReportes + 1) WHERE usuario = '" . $id . "';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo "no entra";
        }

        return $ret;
    }

    public static function isGoodLogin($user, $pass) {

        $res = False;

        $query = "SELECT contrasenya FROM usuario WHERE UPPER(usuario) like UPPER('" . $user . "') LIMIT 1";

        if (!($result = connectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        } else if ($row = mysqli_fetch_array($result)) {
            $res = password_verify($pass, $row['contrasenya']);
        }




        return $res;
    }

    public function addfollower($idSeguidor, $idSeguido) {
        $res = True;
        $query = "INSERT INTO seguidores (idUsuarioSeguidor, idUsuarioSeguido)VALUES ('" . $idSeguidor . "','" . $idSeguido . "');";

        if (!($result = connectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        }
        return $res;
    }

    public function removefollower($idSeguidor, $idSeguido) {
        $res = True;
        $query = "DELETE FROM seguidores WHERE idUsuarioSeguidor = '"  . $idSeguidor . "'AND idUsuarioSeguido ='" . $idSeguido . "';";

        if (!($result = connectionSingleton::getConn()->query($query))) {
            $res = FALSE;
        }
        return $res;
    }

}
