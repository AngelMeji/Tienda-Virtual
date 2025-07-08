<?php
require_once './models/Categoria.php';

if (isset($_GET['id'])) {
    try {
        Categoria::eliminar($_GET['id']);
        // Redirige con mensaje de éxito
        header("Location: CategoryManagement.php?success=deleted");
    } catch (Exception $e) {
        // Si la excepción es por productos asociados, redirige con código personalizado
        if ($e->getMessage() === "No se puede eliminar la categoría porque tiene productos asociados.") {
            header("Location: CategoryManagement.php?error=conproductos");
        } else {
            // Cualquier otro error
            header("Location: CategoryManagement.php?error=unknown");
        }
    }
    exit;
}
?>

