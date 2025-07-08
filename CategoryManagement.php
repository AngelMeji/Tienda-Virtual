<?php
    session_start(); // Inicia la sesión

    // Verifica si el usuario ha iniciado sesión y si es administrador
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
        // Si no hay sesión activa o el usuario no es admin, lo redirige al login
        header('Location: views/signin.php');
        exit;
    }

    // Importa los archivos necesarios
    require_once __DIR__ . '/models/Categoria.php'; // Modelo que maneja la tabla de categorías
    require_once './includes/HeaderLogout.php'; // Encabezado con el menú de navegación, logo, etc.

    // Verifica si se ha enviado el formulario para agregar una nueva categoría
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nueva_categoria'])) {
        // Obtiene y limpia el nombre de la categoría enviada por el formulario
        $nombre = trim($_POST['nombre']);

        // Valida que el nombre no esté vacío
        if (!empty($nombre)) {
            // Crea la nueva categoría usando el modelo
            Categoria::crear($nombre);

            // Redirige a la misma página para evitar el reenvío del formulario al recargar
            header("Location: CategoryManagement.php");
            exit;
        } else {
            // Si el campo está vacío, se guarda un mensaje de error (puedes usarlo en el HTML)
            $error = "El nombre de la categoría no puede estar vacío.";
        }
    }

    // Obtiene todas las categorías desde la base de datos para mostrarlas en la vista
    $categorias = Categoria::getAll();
?>


  <!-- CONTENIDO PRINCIPAL -->
  <main class="flex-1 px-8 py-12 flex flex-col items-center">
    <div class="w-full max-w-5xl">
      <h1 class="text-2xl font-semibold mb-8">Gestionar de categorías</h1>
<?php if (isset($_GET['success'])): ?>
    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
        <?php
        switch ($_GET['success']) {
            case '1':
                echo '¡Categoría creada correctamente!';
                break;
            case 'updated':
                echo '¡Categoría actualizada correctamente!';
                break;
            case 'deleted':
                echo '¡Categoría eliminada correctamente!';
                break;
        }
        ?>
    </div>
<?php elseif (isset($_GET['error'])): ?>
    <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <?php
        switch ($_GET['error']) {
            case 'empty': echo 'El nombre no puede estar vacío.'; break;
            case 'db': echo 'Error al guardar en la base de datos.'; break;
            case 'notfound': echo 'Categoría no encontrada.'; break;
            default: echo 'Error desconocido.'; break;
        }
        ?>
    </div>
<?php endif; ?>


<form action="CategoryManagement.php" method="POST" class="mb-6">
    <label for="nombre_categoria" class="block mb-2 text-sm font-medium text-gray-700">Nueva Categoría</label>
    <input type="text" id="nombre_categoria" name="nombre" required
           class="w-full p-2 border border-gray-300 rounded mb-4 text-black">
    <button type="submit" name="nueva_categoria" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Crear Categoría
    </button>
</form>

<table class="min-w-full table-auto text-left text-sm">
    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <tr>
            <th class="py-3 px-6">ID</th>
            <th class="py-3 px-6">Nombre</th>
            <th class="py-3 px-6">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 bg-white divide-y divide-gray-200">
        <?php while($categoria = $categorias->fetch_assoc()): ?>
            <tr>
                <td class="py-3 px-6"><?= $categoria['id']; ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($categoria['nombre']); ?></td>
                <td class="py-3 px-6 space-x-2">
                    <a href="editarCategoria.php?id=<?= $categoria['id'] ?>" class="text-blue-600 hover:underline">Editar</a>
                    <a href="eliminarCategoria.php?id=<?= $categoria['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('¿Seguro que quieres eliminar esta categoría?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

    </div>
  </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
