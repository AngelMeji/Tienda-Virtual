<?php
  // 1. Inicia la sesión si no ha sido iniciada aún
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  // 2. Obtiene los parámetros desde la URL
  // Si no se envía nada, usa 'producto' como controlador y 'inicio' como acción
  $controller = $_GET['controller'] ?? 'producto';
  $action = $_GET['action'] ?? 'inicio';

  // Convierte el nombre del controlador en nombre de clase, por ejemplo: producto → ProductoController
  $controllerClass = ucfirst($controller) . 'Controller';

  // Crea la ruta del archivo del controlador
  $controllerFile = './controllers/' . $controllerClass . '.php';

  // Captura la salida generada por el controlador (para poder usarla más adelante si se desea)
  ob_start();

  // 3. Verifica si el archivo del controlador existe
  if (file_exists($controllerFile)) {
      require_once $controllerFile;

      // Verifica si la clase del controlador existe
      if (class_exists($controllerClass)) {
          // Crea una instancia del controlador
          $controlador = new $controllerClass();

          // Verifica si el método (acción) existe dentro del controlador
          if (method_exists($controlador, $action)) {
              // Ejecuta la acción correspondiente
              $controlador->$action();
          } else {
              // Si la acción no existe, muestra un mensaje de error
              echo "<p class='text-red-400'>La acción '$action' no existe en el controlador '$controllerClass'.</p>";
          }
      } else {
          // Si la clase del controlador no existe
          echo "<p class='text-red-400'>La clase del controlador '$controllerClass' no existe.</p>";
      }
  } else {
      // Si el archivo del controlador no existe
      echo "<p class='text-red-400'>El archivo del controlador '$controllerFile' no fue encontrado.</p>";
  }

  // Guarda todo lo que se generó dentro del controlador en la variable $content (si se quiere usar en una plantilla)
  $content = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GTA Vehículos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">

  <!-- Cabecera -->
  <?php require_once './includes/HeaderLogout.php'; ?>

  <!-- Contenido generado por el controlador -->
  <main >
    <?= $content ?>
  </main>

  <!-- Footer -->
  <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
    Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
  </footer>

</body>
</html>
