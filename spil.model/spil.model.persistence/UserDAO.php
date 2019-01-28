<?php

interface UserDAO {

    function create($user);

    function updatePassword($user);

    function updateAvatar($user);

    function delete($user);

    function listFollowers($user);

    function listFollows($user);

    function getNumFollowers($user);

    function getNumFollows($user);

    function addReport($id);

    public static function isGoodLogin($user, $pass);
}
