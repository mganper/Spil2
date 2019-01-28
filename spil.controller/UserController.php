<?php

interface UserController {

    function createUser($usuario, $contrasenya, $nombre, $apellidos, $fechaNacimiento);

    function deleteUser($idUsuario);

    function modifyPassword($idusuario, $newPass, $oldPass);

    function modifyAvatar($idusuario, $newAvatar);

    function getFollowers($idUsuario);

    function getFollows($idUsuario);

    function getNumFollowers($idUsuario);

    function getNumFollows($idUsuario);
    
    function addReport($idUsuario);
    
  
}
