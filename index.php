<?php
  require_once './includes/HeaderLogout.php'; // Se incluye el encabezado con el menú de navegación y el logo

  // Lógica del enrutador (MVC simple)
  $controller = $_GET['controller'] ?? 'producto';
  $action = $_GET['action'] ?? 'inicio';
  $controllerClass = ucfirst($controller) . 'Controller';
  $controllerFile = './controllers/' . $controllerClass . '.php';
?>

  <?php
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
        if (class_exists($controllerClass)) {
            $controlador = new $controllerClass();
            if (method_exists($controlador, $action)) {
                $controlador->$action(); // Ejecuta la acción del controlador
            } else {
                echo "<p class='text-red-400'>La acción '$action' no existe en el controlador '$controllerClass'.</p>";
            }
        } else {
            echo "<p class='text-red-400'>La clase del controlador '$controllerClass' no existe.</p>";
        }
    } else {
        echo "<p class='text-red-400'>El archivo del controlador '$controllerFile' no fue encontrado.</p>";
    }
  ?>
  
</body>
    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
