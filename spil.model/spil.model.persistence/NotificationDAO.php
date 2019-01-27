<?php

interface NotificationDAO {
    function read($pk);
    function create($notificaiton);
    function update($notification);
    function delete($notification);
    function listByUser($idUser);
}
