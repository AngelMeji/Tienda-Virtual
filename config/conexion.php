<?php

class Database {
    public static function connect(){
        if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
        if (!defined('DB_USERNAME')) define("DB_USERNAME", "root");
        if (!defined('DB_PASSWORD')) define("DB_PASSWORD", '');
        if (!defined('DB_NAME')) define('DB_NAME', 'tienda_sena');

        $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        return $conexion;
    }
}
    
?>