<?php
// Incluye el archivo donde está la clase "Categoria"
require_once __DIR__ . '/../models/Categoria.php';

// Verifica si la solicitud viene por el método POST (cuando se envía un formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtiene el ID desde el formulario. Si no existe, se asigna null
    $id = $_POST['id'] ?? null;

    // Obtiene el nombre de la categoría y le quita los espacios al inicio y final
    $nombre = trim($_POST['nombre_categoria'] ?? '');

    // Si hay un ID y el nombre no está vacío
    if ($id && !empty($nombre)) {

        // Llama al método actualizar de la clase Categoria para cambiar el nombre
        if (Categoria::actualizar($id, $nombre)) {
            // Si se actualiza correctamente, redirige con mensaje de éxito
            header('Location: ../CategoryManagement.php?success=2');
        } else {
            // Si ocurre un error en la base de datos, redirige con mensaje de error
            header('Location: ../CategoryManagement.php?error=db');
        }

    } else {
        // Si falta el ID o el nombre está vacío, redirige con mensaje de error
        header('Location: ../CategoryManagement.php?error=empty');
    }

    // Detiene la ejecución del script
    exit;
}
?>