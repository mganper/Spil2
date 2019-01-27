<?php

interface UserDAO {

    function create($user);

    function update($user);

    function delete($user);

    function listFollowers($user);

    function listFollows($user);
}
