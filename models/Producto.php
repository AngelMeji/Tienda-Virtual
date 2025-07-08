<?php

    require_once __DIR__ . '/../config/conexion.php';

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

        // Método para obtener todos los productos con su categoría
        public function getAll() {

            // Consulta SQL que selecciona todos los campos de la tabla "productos" (p.*)
            // y también el nombre de la categoría desde la tabla "categorias"
            // Usa INNER JOIN para unir ambas tablas por el campo "categoria_id"
            // Ordena los resultados por ID del producto en orden descendente (el más reciente primero)
            $sql = "SELECT p.*, c.nombre AS categoria_nombre 
                    FROM productos p 
                    INNER JOIN categorias c ON p.categoria_id = c.id 
                    ORDER BY p.id DESC";

            // Ejecuta la consulta en la base de datos y devuelve el resultado
            return $this->conexion->query($sql);
        }

        // Método para crear (insertar) un nuevo producto en la base de datos
        public function crear($nombre, $precio, $categoria_id, $descripcion, $imagen = null) {

            // Limpia el nombre y la descripción para evitar errores o ataques SQL
            $nombre = $this->conexion->real_escape_string($nombre);
            $descripcion = $this->conexion->real_escape_string($descripcion);

            // Construye la consulta SQL para insertar el producto
            // Si hay una imagen, la incluye entre comillas; si no, pone NULL
            $sql = "INSERT INTO productos (nombre, precio, categoria_id, descripcion, imagen)
                    VALUES ('$nombre', $precio, $categoria_id, '$descripcion', " . ($imagen ? "'$imagen'" : "NULL") . ")";

            // Ejecuta la consulta y devuelve true si se insertó correctamente, o false si hubo error
            return $this->conexion->query($sql);
        }


        // Método para actualizar (editar) un producto existente en la base de datos
        public function editar($id, $nombre, $precio, $descripcion, $categoria_id) {

            // Prepara una consulta SQL para actualizar el producto
            // Usamos ? como marcadores para evitar inyecciones SQL
            $stmt = $this->conexion->prepare(
                "UPDATE productos 
                SET nombre = ?, precio = ?, descripcion = ?, categoria_id = ? 
                WHERE id = ?"
            );

            // Asocia los valores a los marcadores de la consulta
            // "s" = string, "d" = double (decimal), "i" = integer
            $stmt->bind_param("sdsii", $nombre, $precio, $descripcion, $categoria_id, $id);

            // Ejecuta la consulta y devuelve true si fue exitosa, o false si falló
            return $stmt->execute();
        }


        // Método para eliminar un producto según su ID
        public function eliminar($id) {

            // Prepara una consulta SQL para eliminar el producto con el ID especificado
            $stmt = $this->conexion->prepare("DELETE FROM productos WHERE id = ?");

            // Asocia el valor del ID al marcador (?) en la consulta
            // "i" indica que el valor es un número entero (integer)
            $stmt->bind_param("i", $id);

            // Ejecuta la consulta y devuelve true si se eliminó correctamente, o false si hubo error
            return $stmt->execute();
        }
    }
?>