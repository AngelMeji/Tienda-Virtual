<?php
  require_once './includes/HeaderLogout.php'; // Se incluye el encabezado con el menú de navegación y el logo
?>

<?php if (isset($productoDetalle) && $productoDetalle): ?> <!-- Verifica si existe la variable y tiene contenido -->

  <!-- Main Content -->
  <main class="flex flex-col md:flex-row justify-between px-10 py-10 space-y-10 md:space-y-0 md:space-x-12">

    <!-- Imagen + info -->
    <div class="max-w-md">
      <img src="uploads/<?= $productoDetalle['imagen'] ?>" alt="<?= $productoDetalle['nombre'] ?>" class="rounded-lg mb-2" /> 
      <p class="italic text-sm text-gray-300"><?= $productoDetalle['nombre'] ?> (<?= $productoDetalle['categoria'] ?? 'Producto' ?>)</p>
      <!-- Verifica el stock -->
      <p class="mt-4">
        <span class="font-semibold">Stock:</span>
        <?php if ($productoDetalle['stock'] > 0): ?>
          <span class="text-green-400">Sí (<?= $productoDetalle['stock'] ?> disponibles)</span>
        <?php else: ?>
          <span class="text-red-500">No disponible</span>
        <?php endif; ?>
      </p>
      <?php if ($productoDetalle['stock'] > 0): ?>
        <a href="index.php?controller=carrito&action=agregar&id=<?= $productoDetalle['id'] ?>" 
           class="mt-4 inline-block border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">
          AÑADIR A CARRITO
        </a>
      <?php else: ?>
        <button disabled class="mt-4 inline-block border border-gray-600 px-6 py-2 text-sm text-gray-400 cursor-not-allowed">
          AGOTADO
        </button>
      <?php endif; ?>
    </div>

    <!-- Descripción -->
    <div class="max-w-xl">
      <h1 class="text-2xl font-bold mb-6"><?= $productoDetalle['nombre'] ?></h1>
      <p class="text-sm text-gray-300 mb-8 leading-relaxed">
        <?= $productoDetalle['descripcion'] ?>
      </p>

      <div class="flex justify-between items-center">
        <p class="text-2xl font-semibold">$<?= number_format($productoDetalle['precio'], 0, ',', '.') ?></p>
        <div class="space-x-4">
          <?php if ($productoDetalle['stock'] > 0): ?>
            <a href="index.php?controller=carrito&action=agregar&id=<?= $productoDetalle['id'] ?>"
            class="bg-red-600 px-6 py-2 text-sm font-semibold rounded hover:bg-red-700 transition">COMPRAR</a>
          <?php endif; ?>
            <a href="index.php?controller=producto&action=inicio" 
            class="border border-white px-6 py-2 text-sm font-semibold hover:bg-white hover:text-black transition">VER OTROS</a>
        </div>
      </div>
    </div>

  </main>
  
<?php else: ?>
  <main class="px-10 py-10">
    <p class="text-red-400 text-lg">Producto no encontrado.</p>
  </main>
<?php endif; ?>

