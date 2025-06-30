<?php
require_once __DIR__ . '/../config/conexion.php'; 

// Clase Categoria: Maneja las operaciones relacionadas con las categorías de productos
class Categoria {
    // Método estático para obtener todas las categorías ordenadas alfabéticamente
    public static function getAll() {
        $conexion = Database::connect(); // Establece la conexión a la base de datos usando el método estático 'connect' de la clase Database
        $sql = "SELECT * FROM categorias ORDER BY nombre ASC"; // Define la consulta SQL para seleccionar todas las categorías ordenadas por nombre (de A a Z)
        return $conexion->query($sql); // Ejecuta la consulta y retorna el resultado
    }

    // Método estático para obtener el nombre de una categoría a partir de su ID
    public static function getNombreById($id) {
        $conexion = Database::connect(); // Establece la conexión a la base de datos
        $sql = "SELECT nombre FROM categorias WHERE id = $id LIMIT 1"; // Consulta SQL que obtiene el nombre de la categoría con el ID dado
        $result = $conexion->query($sql); // Ejecuta la consulta y guarda el resultado
        return ($result && $result->num_rows > 0) ? $result->fetch_assoc()['nombre'] : 'Categoría desconocida'; // Si se encuentra una fila, devuelve el nombre; de lo contrario, devuelve "Categoría desconocida"
    }

}

?>