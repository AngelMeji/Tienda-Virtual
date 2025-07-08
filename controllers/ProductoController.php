<?php 
    require_once __DIR__ . '/../models/Producto.php';
    require_once __DIR__ . '/../models/Categoria.php';


    // Define la clase ProductoController que manejará las acciones relacionadas con productos
    class ProductoController {
        // Método para mostrar la página de inicio con productos destacados
        public function inicio(){
            $producto = new Producto(); // Crea una instancia de la clase Producto
            $productos = $producto->getDestacados(); // Obtiene los productos destacados

            require_once './views/productos/index.php'; // Carga la vista que muestra los productos destacados (página de inicio)
        }

        // Método para mostrar productos filtrados por categoría
        public function porCategoria() {
            if (isset($_GET['id'])) { // Verifica si se pasó un ID de categoría por la URL
                $id = (int) $_GET['id']; // Convierte el valor recibido en un número entero (ID de la categoría)
                $producto = new Producto(); // Crea una nueva instancia del modelo Producto
                $productos = $producto->getByCategoria($id); // Obtiene todos los productos asociados a esa categoría

                // Obtener nombre de la categoría
                $nombreCategoria = Categoria::getNombreById($id);

                // Pasar a la vista
                require_once './views/productos/categoria.php';
            } else {
                echo "Categoría no especificada."; // Si no se pasa un ID válido, se muestra un mensaje de error
            }
        }

        // Método para ver el detalle de un producto específico
        public function ver() {
            if (isset($_GET['id'])) { // Verifica si se pasó un ID de producto por la URL
                $id = (int) $_GET['id']; // Convierte el ID recibido a entero
                $producto = new Producto(); // Crea una nueva instancia del modelo Producto
                $productoDetalle = $producto->getOne($id); // Obtiene los detalles del producto mediante su ID

                if ($productoDetalle) {
                    require_once __DIR__ . '/../views/productos/ProductDescription.php'; // Carga la vista que muestra los detalles del producto seleccionado
                } else {
                    echo "<p style='color:red'>Producto no encontrado en la base de datos.</p>";
                }
            } else { 
                echo "Producto no especificado."; // Si no se pasa un ID válido, se muestra un mensaje de error
            }
        }

    }
?>