<?php

class connectionSingleton {

    private static $conn;
    private static $servidor = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'spil';

    public static function getConn() {
        if (is_null(self::$conn)) {
            self::$conn = new mysqli(self::$servidor, self::$user, self::$pass, self::$db);
            if (self::$conn->connect_errno) {
                echo "Fallo al conectar";
            }
        }
        return self::$conn;
    }

}
