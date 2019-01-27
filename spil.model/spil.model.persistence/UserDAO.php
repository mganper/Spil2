<?php

interface UserDAO {

    function read($pk);

    function create($user);

    function update($user);

    function delete($user);

    function listed();
}
