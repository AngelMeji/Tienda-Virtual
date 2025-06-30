<?php
// Inicia la sesión
session_start();
require_once __DIR__ . '/../views/layout/header.php'; // Carga el encabezado de la vista

// Carga el controlador y la acción desde la URL (o usa valores por defecto)
$controller = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'inicio';

// Crea el nombre de la clase del controlador (ej. ProductoController)
$controllerClass = ucfirst($controller) . 'Controller';

// Ruta completa al archivo del controlador
$controllerFile = '../controllers/' . $controllerClass . '.php';

// Verifica si el archivo del controlador existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Verifica si la clase existe
    if (class_exists($controllerClass)) {
        $controlador = new $controllerClass();

        // Verifica si el método (acción) existe dentro del controlador
        if (method_exists($controlador, $action)) {
            $controlador->$action(); // Llama al método (ej. inicio())
        } else {
            echo "La acción '$action' no existe en el controlador '$controllerClass'."; // Muestra un mensaje de error si la acción no existe
        }
    } else {
        echo "La clase del controlador '$controllerClass' no existe."; // Muestra un mensaje de error si la clase no existe
    }
} else {
    echo "El archivo del controlador '$controllerFile' no fue encontrado."; // Muestra un mensaje de error si el archivo del controlador no existe
}
?>

<?php
require_once __DIR__ . '/../views/layout/footer.php'; // Carga el pie de página de la vista
?>