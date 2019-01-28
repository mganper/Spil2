<?php

interface UserModel {

    function getController();

    function setController($controller);

    function newUser($user);

    function updatePassword($user);
    
    function updateAvatar($user);

    function deleteUser($user);

    function listaSeguidores($user);

    function listaSeguidos($user);

    function getNumSeguidores($id);

    function getNumSeguidos($id);
    
    function addReport($id);
}
