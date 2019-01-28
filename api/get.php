<?php

require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\LikeControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\RespilControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\SpilControllerImpl.php';
require $_SERVER['DOCUMENT_ROOT'] . '\Spil2\spil.controller\UserControllerImpl.php';

if (isset($_POST['newMsg'])) {
    header("HTTP/1.1 201 Created");
}

if (isset($_GET['deleteMsg'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['followUser'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['unfollowUser'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['giveLike'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['removeLike'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['giveRespil'])) {
    header("HTTP/1.1 200 Ok");
}

if (isset($_GET['removeRespil'])) {
    header("HTTP/1.1 200 Ok");
}

header("HTTP/1.1 400 Bad Request");
