<?php

class ConnectionSingleton {

    private static $conn;
    private static $servidor = 'localhost';
    private static $user = 'id8601793_sys';
    private static $pass = 'oracle_4U';
    private static $db = 'id8601793_spil2';

    public static function getConn() {
        if (is_null(self::$conn)) {
            self::$conn = new mysqli(self::$servidor, self::$user, self::$pass, self::$db);
            if (self::$conn->connect_errno) {
                die('Fallo al conectar');
            }
        }
        return self::$conn;
    }

}
