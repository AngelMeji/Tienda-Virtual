<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Inicia la sesión para acceder a las variables de sesión
}

  require_once './includes/HeaderLogout.php'; // Se incluye el encabezado con el menú de
?>

  <!-- Formulario -->
  <main class="px-10 py-14 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-10">Realizar pedido</h1>

    <?php if (!empty($_SESSION['carrito'])): ?> <!-- Verifica si hay productos en el carrito -->

    <form method="post" action="index.php?controller=pedido&action=procesar" class="space-y-6">

      <div>
        <label for="nombre" class="block text-sm mb-1">Nombre completo</label>
        <input type="text" name="nombre" id="nombre" required class="w-full bg-black border border-white text-white px-4 py-2 outline-none">
      </div>

      <div>
        <label for="direccion" class="block text-sm mb-1">Dirección</label>
        <input type="text" id="direccion" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="ciudad" class="block text-sm mb-1">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" required class="w-full bg-black border border-white text-white px-4 py-2 outline-none">
      </div>

      <div>
        <label for="departamento" class="block text-sm mb-1">Departamento</label>
        <input type="text" id="departamento" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="contacto" class="block text-sm mb-1">Número de contacto</label>
        <input type="text" id="contacto" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="metodo_pago" class="block text-sm mb-1">Método de pago</label>
        <select name="metodo_pago" id="metodo_pago" class="w-full bg-black border border-white text-white px-4 py-2 outline-none">
          <option value="Entrega">Pago contra entrega</option>
          <option value="Transferencia">Transferencia</option>
        </select>
      </div>

      <div class="pt-4 flex justify-end">
        <button type="submit" class="border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">
          CONFIRMAR PEDIDO
        </button>
      </div>
    </form>
    
    <?php else: ?>
      <p class="text-red-400 text-sm">No hay productos en el carrito.</p>
    <?php endif; ?>
  </main>
