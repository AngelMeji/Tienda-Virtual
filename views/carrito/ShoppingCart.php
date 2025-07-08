<?php
  require_once './includes/HeaderLogout.php'; // Se incluye el encabezado con el menú de navegación y el logo
?>

  <!-- Título -->
  <main class="px-10 py-10">
    <h1 class="text-2xl font-bold mb-8">Carrito de compras</h1>

    <?php if (!empty($_SESSION['carrito'])): ?> <!-- Verifica si hay productos en el carrito -->
      <div class="space-y-8">

        <?php 
          $totalCarrito = 0; // Inicializa el total del carrito
          foreach ($_SESSION['carrito'] as $item):  // Itera sobre cada producto en el carrito
            $subtotal = $item['precio'] * $item['cantidad']; // Calcula el subtotal del producto
            $totalCarrito += $subtotal; // Suma el subtotal al total del carrito
        ?>
          <div class="flex items-center space-x-6 bg-neutral-900 p-4 rounded">
            <img src="uploads/<?= $item['imagen'] ?>" alt="<?= $item['nombre'] ?>" class="w-32 rounded-md" /> <!-- Muestra la imagen del producto-->
            <div class="flex-1">
              <p class="font-semibold"><?= $item['nombre'] ?></p> <!-- Muestra el nombre del producto-->  
              <p class="text-lg font-bold mt-1">$<?= number_format($item['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto-->     
              <p class="text-sm mt-1">Total: <span class="font-semibold">$<?= number_format($subtotal, 0, ',', '.') ?></span></p> <!-- Muestra el subtotal del producto-->  
            </div>
            <div class="flex flex-col items-center space-y-2">
              <!-- Formulario cantidad -->
              <form action="index.php?controller=carrito&action=actualizarCantidad" method="POST" class="flex items-center space-x-2">
                <input type="hidden" name="producto_id" value="<?= $item['id'] ?>">

                <button type="submit" name="disminuir"
                  class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-semibold">-</button>

                <span class="px-3 text-white font-bold"><?= $item['cantidad'] ?></span>

                <button type="submit" name="aumentar"
                  class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm font-semibold">+</button>
              </form>
              <!-- Botón eliminar -->
              <a href="index.php?controller=carrito&action=eliminar&id=<?= $item['id'] ?>"  
              class="bg-red-600 px-6 py-2 rounded text-sm font-semibold hover:bg-red-700 transition">ELIMINAR</a> <!-- Botón para eliminar el producto del carrito-->
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <!-- Acciones -->
      <div class="flex justify-between items-center mt-10">
        <a href="index.php?controller=carrito&action=vaciar"
          class="border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">VACIAR CARRITO</a> <!-- Botón para vaciar el carrito -->
        <div class="flex items-center space-x-6">
          <p class="text-lg font-bold">Total:<br><span class="text-2xl">$<?= number_format($totalCarrito, 0, ',', '.') ?></span></p> <!-- Muestra el total del carrito -->
          <?php if (isset($_SESSION['usuario']['id'])): ?> <!-- Verifica si el usuario ha iniciado sesión -->
            <a href="index.php?controller=pedido&action=formulario"
              class="bg-red-600 px-6 py-3 text-sm font-semibold rounded hover:bg-red-700 transition">
              REALIZAR PEDIDO
            </a> <!-- Botón para ir al formulario de pedido -->
          <?php else: ?>
            <a href="index.php?controller=user&action=signin"
              class="bg-red-600 px-6 py-3 text-sm font-semibold rounded hover:bg-red-700 transition">
              INICIA SESIÓN PARA PEDIR
            </a> <!-- Botón para iniciar sesión y realizar el pedido -->
          <?php endif; ?>
        </div>
      </div>

    <?php else: ?>
      <p class="text-gray-400">No hay productos en el carrito.</p> <!-- Mensaje si no hay productos en el carrito -->
      <a href="index.php" class="mt-6 inline-block border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">← Seguir explorando</a> <!-- Botón para volver a la tienda -->
    <?php endif; ?>
  </main>
