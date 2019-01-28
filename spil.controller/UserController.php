<?php

interface UserController {

    function createUser($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento);

    function deleteUser($idUsuario);

    function modifyPassword($idusuario, $newPass, $oldPass);

    function modifyAvatar($idusuario, $newAvatar);

    function getSeguidores($idUsuario);

    function getSeguidos($idUsuario);

    function getNumSeguidores($idUsuario);

    function getNumSeguidos($idUsuario);

    function addReport($idUsuario);

    function addfollower($idSeguidor, $idSeguido);

    function removefollower($idSeguidor, $idSeguido);

    function ascenderModerador($idUsuario);
}
