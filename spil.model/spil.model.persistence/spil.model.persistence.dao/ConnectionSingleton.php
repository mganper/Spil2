<?php

class ConnectionSingleton {

    private static $conn;
    private static $servidor = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'spil';

    public static function getConn()
    {
        if (is_null(self::$instance)) {
            self::$conn = new connectionSingleton();
        }

        return self::$instance;
    }

}
