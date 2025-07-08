<?php
    // Se crea una clase llamada "Database"
    class Database {

        // Esta función se encarga de conectarse a la base de datos
        public static function connect(){

            // Si no está definida la constante DB_SERVER, la define con el valor 'localhost'
            if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');

            // Define el nombre de usuario para conectarse a la base de datos (en este caso "root")
            if (!defined('DB_USERNAME')) define("DB_USERNAME", "root");

            // Define la contraseña para la base de datos (aquí está vacía)
            if (!defined('DB_PASSWORD')) define("DB_PASSWORD", '');

            // Define el nombre de la base de datos que se va a usar
            if (!defined('DB_NAME')) define('DB_NAME', 'tienda_sena');

            // Crea la conexión con la base de datos usando los datos anteriores
            $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // Si no se puede conectar, muestra un mensaje de error y detiene el programa
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Si todo sale bien, devuelve la conexión creada
            return $conexion;
        }
    }
?>