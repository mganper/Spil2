<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/spil.model.persistence.dao/ConnectionSingleton.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.persistence/UserDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Spil2/spil.model/spil.model.entity/UserImpl.php';

class UserDAOImpl implements UserDAO {

    public function create($user) {
        $ret = TRUE;
        $query = 'INSERT INTO usuario (usuario, contrasenya, nombre, apellidos, fechaNacimiento, fechaAlta) '
                . 'VALUES (' . $user->usuario . ',' . $user->contrasenya . ',' . $user->nombre . ','
                . $user->apellidos . ',' . $user->fechaNacimiento . ',' . $user->fechaAlta . ')';

        if (!ConnectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
            echo 'Error al acceder a la base de datos';
        }

        return $ret;
    }

    public function delete($user) {
        $ret = TRUE;
        $query = 'DELETE FROM usuario WHERE usuario = ' . $user->usuario;

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function update($user) {
        $ret = TRUE;
        $query = 'UPDATE usuarios SET contrasenya = "' . $user->contrasenya . '" WHERE usuario = "' . $user->usuario . "'";

        if (!connectionSingleton::getConn()->query($query)) {
            $ret = FALSE;
        }

        return $ret;
    }

    public function listFollowers($user) {
        $listaUsuarios = Array();
        
        $query = 'SELECT idUsuarioSeguidor FROM seguidores WHERE idUsuarioSeguido = "' . $user->usuario . '"';
        
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

    function listFollows($user) {
        $listaUsuarios = Array();
        
        $query = 'SELECT idUsuarioSeguido FROM seguidores WHERE idUsuarioSeguidor = "' . $user->usuario . '"';
        
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
                    
                    $userRecovered = new UserImpl($userAvatar['usuario'], $userAvatar['avatar']);
                    
                    array_push($listaUsuarios, $userRecovered);
                }
            }
        }
        
        return $listaUsuarios;
    }

}
