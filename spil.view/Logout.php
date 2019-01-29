<?php
session_start();
unset($_SESSION['usuario']);
header('Location: Login.php');


