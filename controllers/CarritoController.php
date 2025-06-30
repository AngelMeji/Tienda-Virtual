<?php
require_once __DIR__ . '/../models/Producto.php';


class CarritoController {
    // Función para agregar un producto al carrito
    public function agregar() {
        if (isset($_GET['id'])) { // Verifica si se ha pasado el parámetro 'id' por la URL (GET)
            $idProducto = (int) $_GET['id']; // Convierte el valor del parámetro 'id' a entero

            // Si no hay carrito, se crea como array vacío
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            // Si ya existe ese producto en el carrito, se aumenta la cantidad
            $existe = false;
            foreach ($_SESSION['carrito'] as &$item) {
                if ($item['id'] == $idProducto) {
                    $item['cantidad']++;
                    $existe = true;
                    break; // Sale del ciclo
                }
            }

            // Si no existe aún, se obtiene desde la base de datos y se agrega
            if (!$existe) {
                $producto = new Producto(); // Crea una nueva instancia del modelo Producto
                $detalle = $producto->getOne($idProducto); // Obtiene los datos del producto con el id proporcionado

                // Si el producto fue encontrado, se agrega al carrito
                if ($detalle) {
                    $_SESSION['carrito'][] = [
                        'id' => $detalle['id'],
                        'nombre' => $detalle['nombre'],
                        'precio' => $detalle['precio'],
                        'imagen' => $detalle['imagen'],
                        'cantidad' => 1
                    ];
                }
            }
        }

        // Redirecciona a la vista del carrito después de agregar el producto
        header("Location: index.php?controller=carrito&action=ver");
    }

    public function ver() { // Función para mostrar la vista del carrito
        require_once __DIR__ . '/../views/carrito/ver.php';
    }

    // Opcional: eliminar producto
    public function eliminar() {
        if (isset($_GET['id'])) { // Verifica si se ha pasado el parámetro 'id' por la URL
            $id = $_GET['id']; // Captura el ID del producto a eliminar
            foreach ($_SESSION['carrito'] as $index => $item) { // Recorre el carrito para encontrar el producto con ese ID
                if ($item['id'] == $id) {
                    unset($_SESSION['carrito'][$index]); // Elimina el producto del carrito
                    break;
                }
            }
        }
        header("Location: index.php?controller=carrito&action=ver"); // Redirecciona a la vista del carrito después de eliminar el producto
    }

    // Opcional: vaciar carrito
    public function vaciar() {
        unset($_SESSION['carrito']); // Elimina toda la variable de sesión del carrito
        header("Location: index.php?controller=carrito&action=ver");  // Redirecciona a la vista del carrito (que ahora estará vacío)
    }
}