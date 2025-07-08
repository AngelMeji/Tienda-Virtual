<?php
require_once './includes/HeaderLogout.php'; // Incluye el encabezado con el menú de navegación y el logo
?>
  <!-- Contenido principal -->
  <main class="px-10 py-12 max-w-5xl mx-auto space-y-8">

    <h1 class="text-2xl font-bold">Tu pedido ha sido confirmado</h1>

    <p class="text-sm text-gray-300 max-w-3xl">
      Tu pedido ha sido guardado con éxito, una vez que realices la transferencia bancaria a la cuenta
      <span class="font-semibold text-white">7382947289239ADD</span> con el precio total del pedido, será procesado y enviado.
    </p>

    <!-- Datos del pedido -->
    <div class="text-sm space-y-1">
      <p><span class="font-semibold">Número de pedido:</span> <?= $numeroPedido ?></p>
      <p><span class="font-semibold">Total a pagar:</span> $<?= number_format($total, 0, ',', '.') ?></p>
      <p><span class="font-semibold">Productos:</span></p>
    </div>

    <!-- Lista de productos -->
    <div class="space-y-8">
      <?php foreach ($productosPedido as $producto): ?>
        <div class="flex items-center space-x-6">
          <img src="uploads/<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" class="w-48 rounded-md" />
          <div class="flex-1">
            <p class="font-semibold"><?= $producto['nombre'] ?></p>
            <p class="text-xl font-bold mt-1">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
            <p class="text-sm mt-1">Stock: 
              <?php if (isset($producto['stock']) && $producto['stock'] > 0): ?>
                <span class="text-green-400 font-semibold">Sí (<?= $producto['stock'] ?> disponibles)</span>
              <?php elseif (isset($producto['stock'])): ?>
                <span class="text-red-500 font-semibold">No disponible</span>
              <?php else: ?>
                <span class="text-yellow-400 font-semibold">Sin información</span>
              <?php endif; ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Botón explorar -->
    <div class="pt-6">
      <a href="index.php" class="border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">SEGUIR EXPLORANDO</a>
    </div>

  </main>
