<?php

require_once  '../config/conexion.php';

// Define la clase Producto, que se encargará de interactuar con la tabla de productos
class Producto{
    private $conexion; //Almacena la base de datos

    public function __construct(){
        $this->conexion = Database::connect(); // Conecta a la base de datos
    }

    // Método para obtener los productos destacados (los últimos 6 agregados)
    public function getDestacados(){
        $sql = "SELECT * FROM productos ORDER BY id DESC LIMIT 6"; //Selecciona los ultimos 6 productos
        $resultado = $this->conexion->query($sql); // Ejecuta la consulta SQL
        return $resultado; // Devuelve el resultado de la consulta
    }

    // Método para obtener productos filtrados por categoría
    public function getByCategoria($idCategoria) {
        $sql = "SELECT * FROM productos WHERE categoria_id = $idCategoria ORDER BY id DESC"; // Selecciona productos por categoría
        $resultado = $this->conexion->query($sql); // Ejecuta la consulta SQL
        return $resultado; // Devuelve el resultado de la consulta
    }

    // Método para obtener los detalles de un solo producto por su ID
    public function getOne($id) {
        $sql = "SELECT * FROM productos WHERE id = $id LIMIT 1"; // Consulta SQL que busca un producto por su ID (solo 1 resultado)
        $resultado = $this->conexion->query($sql); // Ejecuta la consulta SQL
        return ($resultado && $resultado->num_rows > 0) ? $resultado->fetch_assoc() : null;
    }

}

?>