<?php
    // Importa el modelo de Categoría
    require_once __DIR__ . '/models/Categoria.php';

    // Verifica si se recibió un ID por la URL (GET)
    if (isset($_GET['id'])) {
        // Convierte el ID a entero para mayor seguridad
        $id = (int)$_GET['id'];

        // Llama al método eliminar del modelo para borrar la categoría
        Categoria::eliminar($id);
    }

    // Redirige de vuelta a la página de gestión con un mensaje de éxito
    header("Location: CategoryManagement.php?success=deleted");
    exit;