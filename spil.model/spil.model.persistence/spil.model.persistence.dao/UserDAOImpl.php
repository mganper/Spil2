<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/UserDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/UserImpl.php';

class UserDAOImpl implements UserDAO {

    public function create($user) {
        $ret = TRUE;
       
        $query = "INSERT INTO usuario (usuario, contrasenya, nombre, apellidos, fechaNacimiento, fechaAlta, esModerador)"
                . "VALUES ('" . $user->getUsuario() . "','" . $user->getContrasenya() . "','" . $user->getNombre() . "','"
                . $user->getApellidos() . "','" . $user->getFechaNacimiento() . "','" . $user->getFechaAlta() . "', 0)";
     
        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($pk) {
        $ret = TRUE;
        $query = "DELETE FROM usuario WHERE usuario = '" . $pk."';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function updatePassword($user) {
        $ret = TRUE;
        $query = 'UPDATE usuarios SET contrasenya = "' . $user->contrasenya . '" WHERE usuario = "' . $user->usuario . "'";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listFollowers($pk) {
        $listaUsuarios = Array();

        $query = 'SELECT idUsuarioSeguidor FROM seguidores WHERE idUsuarioSeguido = "' . $pk . '"';

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
                    $userAvatar = $res->fetch_assoc();

                    $userRecovered = new UserImpl($userAvatar['usuario'], $userAvatar['avatar']);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    function listFollows($pk) {
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

                    $userRecovered = new UserImpl($userAvatar['usuario'], $userAvatar['avatar']);

                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }

        return $listaUsuarios;
    }

    public function getNumFollowers($user) {
        $query = 'SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguidor = "' . $user->usuario . '"';

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron comprobar los seguidores.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row()) === 1) {
                $res = $row[0];
            } else {
                return false;
            }
        }

        return $res;
    }

    public function getNumFollows($user) {
        $query = 'SELECT COUNT(*) FROM seguidores WHERE idUsuarioSeguidor = "' . $user->usuario . '"';

        if (!($res = connectionSingleton::getConn()->query($query))) {
            echo 'No se pudieron comprobar los seguidos.';
            return FALSE;
        } else {
            if (($row = $res->fetch_row()) === 1) {
                $res = $row[0];
            } else {
                return false;
            }
        }

        return $res;
    }

    public function updateAvatar($user) {
        $ret = TRUE;
        $query = "UPDATE usuarios SET avatar = '" . $user->getAvatar() . "' WHERE usuario = '" . $user->getUsuario() . "';";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function addReport($id) {
        $ret = TRUE;
        $query = 'UPDATE usuarios SET numReportes = numReportes + 1 WHERE usuario = "' . $id . "'";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

}
