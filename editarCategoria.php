<?php
  session_start(); // Inicia la sesión

  require_once __DIR__ . '/models/Categoria.php'; // Importa el modelo de Categoría

  // Verificar si el usuario está logueado y tiene rol de administrador
  if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
      // Si no es admin, redirige al inicio de sesión
      header('Location: views/signin.php');
      exit;
  }

  // Variables para mostrar mensajes
  $mensaje = '';
  $error = '';
  $categoria = null;

  // Obtener el ID desde la URL (GET) o desde el formulario (POST)
  $id = $_GET['id'] ?? ($_POST['id'] ?? null);

  // Si hay un ID, buscar la categoría
  if ($id) {
      $categoria = Categoria::getById($id);

      // Si no se encuentra la categoría, mostrar error
      if (!$categoria) {
          $error = "Categoría no encontrada.";
      }
  } else {
      // Si no hay ID, redirigir a la lista de categorías
      header('Location: CategoryManagement.php');
      exit;
  }

  // Si se envió el formulario de actualización
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_categoria'])) {
      // Obtener y limpiar el nuevo nombre
      $nombre = trim($_POST['nombre'] ?? '');

      // Validar que haya ID y nombre
      if ($id && $nombre) {
          // Intentar actualizar la categoría
          if (Categoria::actualizar($id, $nombre)) {
              $mensaje = "Categoría actualizada correctamente.";
              $categoria['nombre'] = $nombre; // Actualiza el valor en memoria (para mostrar en la vista)
          } else {
              $error = "Error al actualizar en la base de datos.";
          }
      } else {
          $error = "El nombre no puede estar vacío.";
      }
  }
?>

<?php require_once './includes/HeaderLogout.php'; ?>


<main class="flex-1 px-8 py-12 flex flex-col items-center">
  <div class="w-full max-w-2xl">
    <h1 class="text-2xl font-semibold mb-6">Editar Categoría</h1>

    <?php if ($mensaje): ?>
      <div class="bg-green-100 text-green-700 p-2 mb-4 rounded"><?= $mensaje ?></div>
    <?php elseif ($error): ?>
      <div class="bg-red-100 text-red-700 p-2 mb-4 rounded"><?= $error ?></div>
    <?php endif; ?>

    <form action="editarCategoria.php?id=<?= htmlspecialchars($id) ?>" method="POST" class="space-y-4">
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

      <label for="nombre" class="block text-gray-700 text-sm font-medium">Nombre de la categoría</label>
      <input
        type="text"
        id="nombre"
        name="nombre"
        value="<?= htmlspecialchars($categoria['nombre'] ?? ($_POST['nombre'] ?? '')) ?>"
        class="w-full p-2 border border-gray-300 rounded text-black"
        required
      >

      <button
        type="submit"
        name="actualizar_categoria"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Guardar cambios
      </button>
    </form>
  </div>
</main>

<!-- FOOTER -->
<footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400 mt-12">
  Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
</footer>
