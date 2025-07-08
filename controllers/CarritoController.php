<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
            if (isset($_SESSION['carrito'][$idProducto])) {
                $_SESSION['carrito'][$idProducto]['cantidad']++;
                $existe = true;
            } else{
                // Si el producto no está en el carrito, se obtiene desde la base de datos
                $producto = new Producto(); // Instancia el modelo Producto
                $detalle = $producto->getOne($idProducto); // Obtiene el detalle del producto

                // Si el producto fue encontrado en la base de datos
                if ($detalle) {
                    // Agrega el producto al carrito usando el id como clave
                    $_SESSION['carrito'][$idProducto] = [
                        'id'      => $detalle['id'],
                        'nombre'  => $detalle['nombre'],
                        'precio'  => $detalle['precio'],
                        'imagen'  => $detalle['imagen'],
                        'cantidad'=> 1
                    ];
                }
            }   
        }
        // Redirecciona a la vista del carrito después de agregar el producto
        header("Location: index.php?controller=carrito&action=ver");
    }

    public function ver() { // Función para mostrar la vista del carrito
        require_once __DIR__ . '/../views/carrito/ShoppingCart.php'; // Incluye la vista del carrito
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

    public function actualizarCantidad() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoId = $_POST['producto_id'];
            // Verifica si el producto está en el carrito
            if (isset($_SESSION['carrito'][$productoId])) {
                // Aumenta cantidad
                if (isset($_POST['aumentar'])) {
                    $_SESSION['carrito'][$productoId]['cantidad']++;
                }
                // Disminuye cantidad solo si es mayor que 1
                if (isset($_POST['disminuir']) && $_SESSION['carrito'][$productoId]['cantidad'] > 1) {
                    $_SESSION['carrito'][$productoId]['cantidad']--;
                }
            }
        }

        // Redirecciona de vuelta al carrito
        header("Location: index.php?controller=carrito&action=ver");
    }

    
}