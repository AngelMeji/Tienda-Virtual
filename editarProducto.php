<?php
  session_start(); // Inicia la sesión

  require_once __DIR__ . '/models/Producto.php';   // Modelo que maneja productos
  require_once __DIR__ . '/models/Categoria.php';  // Modelo que maneja categorías

  // Verificación de sesión y rol de administrador
  if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
      // Si no está logueado como admin, redirige al login
      header('Location: views/signin.php');
      exit;
  }

  // Crear instancia del modelo de producto
  $productoModel = new Producto();

  // Obtener todas las categorías para usarlas en el formulario (por ejemplo, en un <select>)
  $categorias_result = Categoria::getAll();
  $categorias = [];

  while ($cat = $categorias_result->fetch_assoc()) {
      $categorias[] = $cat;
  }



  // Si se envió el formulario (POST), procesar la actualización del producto
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Recoger los datos enviados por el formulario
      $id = $_POST['id'];
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $descripcion = $_POST['descripcion'];
      $categoria_id = $_POST['categoria_id'];

      // Llamar al método editar del modelo para actualizar el producto
      $productoModel->editar($id, $nombre, $precio, $descripcion, $categoria_id);

      // Redirigir a la página de gestión de productos con mensaje de éxito
      header('Location: ProductManagement.php?success=edit');
      exit;
  }

  // Si no se ha enviado el formulario, obtener el producto por su ID (vía GET)
  $id = $_GET['id'] ?? null;
  $producto = $productoModel->getOne($id);

  // Si no se encuentra el producto, redirige con error
  if (!$producto) {
      header('Location: ProductManagement.php?error=notfound');
      exit;
  }
?>

<?php require_once './includes/HeaderLogout.php'; ?>


<main class="px-8 py-12 max-w-2xl mx-auto">
  <h1 class="text-xl font-semibold mb-6">Editar Producto</h1>
  <form action="editarProducto.php" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id']) ?>">

    <label class="block">
      Nombre:
      <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required class="w-full p-2 rounded text-black" />
    </label>

    <label class="block">
      Precio:
      <input type="number" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" required class="w-full p-2 rounded text-black" />
    </label>

    <label class="block">
      Descripción:
      <textarea name="descripcion" required class="w-full p-2 rounded text-black"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
    </label>

    <label class="block">
      Categoría:
      <select name="categoria_id" required class="w-full p-2 rounded text-black">
      <?php foreach ($categorias as $cat): ?>
        <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $producto['categoria_id'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($cat['nombre']) ?>
        </option>
      <?php endforeach; ?>
      </select>
    </label>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar Cambios</button>
    <a href="ProductManagement.php" class="ml-4 text-sm text-white underline">← Volver</a>
  </form>
</main>

<footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400 mt-12">
  Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
</footer>
