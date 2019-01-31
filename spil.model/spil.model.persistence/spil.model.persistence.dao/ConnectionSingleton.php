<?php

class ConnectionSingleton {

    private static $conn;
    private static $servidor = 'fdb26.awardspace.net';
    private static $user = '2950915_spil';
    private static $pass = 'oracle_4U';
    private static $db = '2950915_spil';

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
