<?php
  // Inicia la sesión para poder usar $_SESSION
  session_start();

  // Importa los archivos necesarios
  require_once __DIR__ . '/includes/HeaderLogout.php';  // Encabezado con menú de navegación
  require_once __DIR__ . '/models/Producto.php';        // Modelo del producto
  require_once __DIR__ . '/models/Categoria.php';       // Modelo de las categorías

  // Verifica que el usuario esté logueado y que sea administrador
  if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
      // Si no tiene permiso, lo redirige al login
      header('Location: views/signin.php');
      exit;
  }

  // Procesamiento del formulario (cuando se envía por POST)
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtiene y limpia los datos del formulario
      $nombre = trim($_POST['nombre']);
      $precio = floatval($_POST['precio']);
      $categoria_id = intval($_POST['categoria']);
      $descripcion = trim($_POST['descripcion']);
      $imagen = null;

      // Maneja la subida de imagen si se envió
      if (!empty($_FILES['imagen']['name'])) {
          $nombreArchivo = basename($_FILES['imagen']['name']);
          $rutaDestino = "uploads/" . uniqid() . "-" . $nombreArchivo;

          // Mueve el archivo desde la carpeta temporal a la carpeta "uploads"
          if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
              $imagen = $rutaDestino;
          }
      }

      // Verifica que todos los campos requeridos estén completos y válidos
      if ($nombre && $precio > 0 && $categoria_id && $descripcion) {
          $producto = new Producto();

          // Intenta guardar el producto
          if ($producto->crear($nombre, $precio, $categoria_id, $descripcion, $imagen)) {
              // Si se guardó correctamente, redirige con mensaje de éxito
              header("Location: ProductManagement.php?success=1");
              exit;
          } else {
              // Si hubo un error al guardar
              $error = "Error al crear el producto.";
          }
      } else {
          // Si faltan datos
          $error = "Todos los campos son obligatorios.";
      }
  }

  // Obtiene todas las categorías desde la base de datos para mostrarlas en el formulario
  $categorias = Categoria::getAll();
?>
<main class="px-10 py-14 max-w-3xl mx-auto">
  <h1 class="text-2xl font-bold mb-6">Crear Nuevo Producto</h1>

  <?php if (isset($error)): ?>
    <div class="bg-red-500 text-white p-2 rounded mb-4"><?= $error ?></div>
  <?php endif; ?>

  <form action="crearProducto.php" method="POST" enctype="multipart/form-data" class="space-y-4">

    <div>
      <label for="nombre" class="block mb-1 text-sm">Nombre</label>
      <input type="text" name="nombre" id="nombre" required class="w-full p-2 rounded text-black">
    </div>

    <div>
      <label for="precio" class="block mb-1 text-sm">Precio</label>
      <input type="number" step="0.01" name="precio" id="precio" required class="w-full p-2 rounded text-black">
    </div>

    <div>
      <label for="categoria" class="block mb-1 text-sm">Categoría</label>
      <select name="categoria" id="categoria" required class="w-full p-2 rounded text-black">
        <option value="">Seleccione una categoría</option>
        <?php while($cat = $categorias->fetch_assoc()): ?>
          <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div>
      <label for="descripcion" class="block mb-1 text-sm">Descripción</label>
      <textarea name="descripcion" id="descripcion" rows="4" required class="w-full p-2 rounded text-black"></textarea>
    </div>

    <div>
      <label for="imagen" class="block mb-1 text-sm">Imagen del producto</label>
      <input type="file" name="imagen" id="imagen" accept="image/*" class="w-full text-sm text-gray-300">
    </div>

    <div class="flex space-x-4">
      <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Guardar Producto</button>
      <a href="ProductManagement.php" class="border border-white px-4 py-2 rounded hover:bg-white hover:text-black">Volver</a>
    </div>
  </form>
</main>

<footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400 mt-12">
  Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
</footer>
