<?php

class connectionSingleton {

    private static $conn;
    private static $servidor = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'spil';

    private function __construct() {
        $mySql = new mysqli(self::$servidor, self::$user, self::$pass, self::$db);
        
        if($mySql->connect_errno){
            echo "Fallo al conectar a MySQL: (" . $mySql->connect_errno . ") " . $mySql->connect_error;
        } else {
            self::$conn = $mySql;
        }
        
    }
    
    public static function getConn()
    {
        if (is_null(self::$instance)) {
            self::$conn = new connectionSingleton();
        }

        return self::$instance;
    }

}
