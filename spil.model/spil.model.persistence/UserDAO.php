<?php

interface UserDAO {

    function create($user);

    function updatePassword($user);

    function updateAvatar($user);

    function delete($user);

    function listSeguidores($user);

    function listSeguidos($user);

    function getNumFollowers($user);

    function getNumFollows($user);

    function addReport($id);

    public static function isGoodLogin($user, $pass);

    function addfollower($idSeguidor, $idSeguido);

    function removefollower($idSeguidor, $idSeguido);

    function ascenderModerador($idUsuario);
}
