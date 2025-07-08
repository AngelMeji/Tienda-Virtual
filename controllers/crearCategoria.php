<?php
    // Incluye el archivo donde está la clase "Categoria"
    // __DIR__ es la ruta del archivo actual, y se sube un nivel con /..
    require_once __DIR__ . '/../models/Categoria.php';

    // Verifica si el método de la solicitud es POST (o sea, si se envió un formulario)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Verifica que el campo 'nombre_categoria' no esté vacío
        if (!empty($_POST['nombre_categoria'])) {

            // Limpia el texto quitando espacios al inicio y final
            $nombre = trim($_POST['nombre_categoria']);

            // Llama al método "crear" de la clase Categoria para guardar el nombre en la base de datos
            if (Categoria::crear($nombre)) {
                // Si todo sale bien, redirige a la página con un mensaje de éxito
                header('Location: ../CategoryManagement.php?success=1');
            } else {
                // Si hay un error al guardar en la base de datos, redirige con mensaje de error
                header('Location: ../CategoryManagement.php?error=db');
            }

        } else {
            // Si el campo está vacío, redirige con un mensaje de error por campo vacío
            header('Location: ../CategoryManagement.php?error=empty');
        }

        // Termina el script para que no se siga ejecutando nada más
        exit;
    }
?>