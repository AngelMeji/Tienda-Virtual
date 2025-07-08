<?php

class Pedido {
    private $conexion;

    public function __construct() {
        $this->conexion = Database::connect();
    }

    public function contarPedidosPorUsuario($usuario_id) {
        $sql = "SELECT COUNT(*) as total FROM pedidos WHERE usuario_id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'];
    }

    public function guardarPedido($usuario_id, $provincia, $localidad, $direccion, $coste) {
        $estado = 'pendiente';
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $sql = "INSERT INTO pedidos (usuario_id, provincia, localidad, direccion, coste, estado, fecha, hora)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("isssdsss", $usuario_id, $provincia, $localidad, $direccion, $coste, $estado, $fecha, $hora);
        $stmt->execute();

        return $this->conexion->insert_id; // Retorna el ID del pedido insertado
    }
}

?>