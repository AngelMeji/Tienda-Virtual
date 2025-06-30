<?php
// Define la clase PedidoController, que maneja las acciones relacionadas con los pedidos
class PedidoController {
    // Método que muestra el formulario de pedido
    public function formulario() {
        // Solo muestra el formulario
        require_once __DIR__ . '/../views/pedido/formulario.php';
    }

    // Método que procesa el pedido cuando se envía el formulario
    public function procesar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si la solicitud HTTP es de tipo POST
            // Recolecta datos del formulario
            $nombre = $_POST['nombre'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $metodo_pago = $_POST['metodo_pago'] ?? 'Entrega';

            // Verifica que hay productos en el carrito
            if (empty($_SESSION['carrito'])) {
                echo "No hay productos en el carrito.";
                return;
            }

            // Simulación de guardar pedido (puedes insertar en una tabla si deseas)
            echo "<h2>Pedido realizado correctamente</h2>";
            echo "<p>Gracias, $nombre. Enviaremos tu pedido a <strong>$direccion</strong>.</p>";
            echo "<p>Método de pago: <strong>$metodo_pago</strong></p>";
            echo "<h3>Resumen del pedido:</h3>";

            $total = 0;
            foreach ($_SESSION['carrito'] as $item) { // Recorre cada producto en el carrito
                $subtotal = $item['precio'] * $item['cantidad']; // Calcula el subtotal del producto (precio por cantidad)
                echo "<p>{$item['nombre']} x {$item['cantidad']} = $" . number_format($subtotal, 0, ',', '.') . "</p>"; // Muestra la línea del producto en el resumen (nombre, cantidad y subtotal formateado)
                $total += $subtotal;
            }

            echo "<p><strong>Total: $" . number_format($total, 0, ',', '.') . "</strong></p>"; // Muestra el total del pedido formateado

            // Limpiar carrito después de pedido
            unset($_SESSION['carrito']); 

            echo '<p><a href="index.php" class="boton">Seguir explorando</a></p>'; // Muestra un botón para regresar a la tienda y seguir explorando productos
        }
    }
}