<?php

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: spil.view/Lobby.php');
} else {
    header('Location: spil.view/Login.php');
}

