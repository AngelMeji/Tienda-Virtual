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

    // Método estático para crear una nueva categoría
    public static function crear($nombre) {
        
        // Se conecta a la base de datos usando la clase Database
        $conexion = Database::connect();

        // Limpia el nombre para evitar inyecciones SQL (protección básica)
        $nombre = $conexion->real_escape_string($nombre);

        // Crea la consulta SQL para insertar el nombre en la tabla 'categorias'
        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre')";

        // Ejecuta la consulta y devuelve el resultado:
        // - true si se insertó correctamente
        // - false si hubo un error
        return $conexion->query($sql);
    }


    // Método estático para obtener una categoría por su ID
    public static function getById($id) {

        // Se conecta a la base de datos usando la clase Database
        $conn = Database::connect();

        // Prepara una consulta SQL con un marcador (?) para evitar inyecciones SQL
        $stmt = $conn->prepare("SELECT * FROM categorias WHERE id = ?");

        // Asocia el valor del ID al marcador de la consulta
        // "i" significa que el parámetro es un número entero (integer)
        $stmt->bind_param("i", $id);

        // Ejecuta la consulta en la base de datos
        $stmt->execute();

        // Obtiene el resultado de la consulta (puede ser una fila o nada)
        $resultado = $stmt->get_result();

        // Devuelve la fila encontrada como un arreglo asociativo (clave => valor)
        // Si no encuentra nada, devuelve null
        return $resultado->fetch_assoc();
    }


    // Método estático para actualizar el nombre de una categoría existente
    public static function actualizar($id, $nombre) {

        // Se conecta a la base de datos
        $conn = Database::connect();

        // Prepara la consulta SQL para actualizar el campo 'nombre' en la tabla 'categorias'
        // El signo ? es un marcador para usar con bind_param (evita inyecciones SQL)
        $stmt = $conn->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");

        // Asocia los valores a los marcadores:
        // "s" → string (para el nombre)
        // "i" → integer (para el id)
        $stmt->bind_param("si", $nombre, $id);

        // Ejecuta la consulta y devuelve true si fue exitosa, false si falló
        return $stmt->execute();
    }


public static function eliminar($id) {
    $conexion = Database::connect();

    // Verificar si hay productos con esta categoría
    $check = $conexion->prepare("SELECT COUNT(*) FROM productos WHERE categoria_id = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $check->bind_result($count);
    $check->fetch();
    $check->close();

    if ($count > 0) {
        // No se puede eliminar, hay productos asociados
        throw new Exception("No se puede eliminar la categoría porque hay productos asociados.");
    }

    // Si no hay productos, eliminar la categoría
    $stmt = $conexion->prepare("DELETE FROM categorias WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

}
?>