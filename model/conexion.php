<?php

    session_start();

    define('DB_SERVER', 'localhost');
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", '12345');
    define('DB_NAME', 'tienda_sena');

    $conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>