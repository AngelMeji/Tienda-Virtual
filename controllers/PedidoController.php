<?php
    require_once __DIR__ . '/../models/Pedido.php'; // Incluye el modelo Pedido para manejar la lógica de pedidos
    // Define la clase PedidoController, que maneja las acciones relacionadas con los pedidos
    class PedidoController {
        // Método que muestra el formulario de pedido
        public function formulario() {
            // Solo muestra el formulario
            require_once __DIR__ . '/../views/pedido/PlaceOrder.php'; // Incluye el archivo del formulario de pedido
        }

        // Método que procesa el pedido cuando se envía el formulario
        public function procesar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si la solicitud HTTP es de tipo POST
                if (session_status() === PHP_SESSION_NONE) {
                    session_start(); // Inicia la sesión para acceder a los datos del carrito
                }
                
                if (!isset($_SESSION['user_id'])) {
                    echo "Debes iniciar sesión para realizar un pedido.";
                    return;
                }

                $usuario_id = $_SESSION['user_id'];
                $provincia = $_POST['departamento'] ?? '';
                $localidad = $_POST['ciudad'] ?? '';
                $direccion = $_POST['direccion'] ?? '';
                $coste = 0;

                if (empty($_SESSION['carrito'])) {
                    echo "No hay productos en el carrito.";
                    return;
                }

                foreach ($_SESSION['carrito'] as $item) {
                    $coste += $item['precio'] * $item['cantidad'];
                }
                $pedido = new Pedido();
                $numeroPedido = $pedido->contarPedidosPorUsuario($usuario_id) + 1;
                $idPedido = $pedido->guardarPedido($usuario_id, $provincia, $localidad, $direccion, $coste);


                $total = 0;
                $productosPedido = [];

                foreach ($_SESSION['carrito'] as $item) {
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                    $productosPedido[] = $item;
                }

                unset($_SESSION['carrito']);
                // Llamamos a la vista de confirmación
                require_once 'views/pedido/ConfirmedOrder.php';
            }
        }
        public function misPedidos() {
            if (!isset($_SESSION['usuario']['id'])) {
                echo "Debes iniciar sesión para ver tus pedidos.";
                return;
            }

            $usuarioId = $_SESSION['usuario']['id'];

            $conexion = Database::connect();
            $sql = $conexion->query("SELECT * FROM pedidos WHERE usuario_id = $usuarioId");

            // Guarda los resultados en una variable para la vista
            $pedidos = [];
            while ($pedido = $sql->fetch_object()) {
                $pedidos[] = $pedido;
            }

            // Incluye la vista que mostrará los pedidos
            require_once './views/pedido/MisPedidos.php';
        }
    }