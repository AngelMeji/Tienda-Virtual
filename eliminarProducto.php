<?php
session_start(); // Inicia la sesión

require_once __DIR__ . '/models/Producto.php'; // Importa el modelo de productos

// Verifica si el usuario está logueado y tiene rol de administrador
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    // Si no es administrador, redirige al login
    header('Location: views/signin.php');
    exit;
}

// Obtiene el ID del producto desde la URL (por GET)
$id = $_GET['id'] ?? null;

// Si hay un ID, intenta eliminar el producto
if ($id) {
    $productoModel = new Producto();
    $productoModel->eliminar($id);
}

// Redirige nuevamente a la página de gestión de productos
header('Location: ProductManagement.php');
exit;