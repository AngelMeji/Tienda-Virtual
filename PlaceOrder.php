<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Realizar Pedido</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">

  <header class="bg-[#0d0d0d] py-4">
    <div class="max-w-[1300px] mx-auto px-4 relative flex items-center justify-between">

      <div class="flex items-center">
        <img src="uploads/logo.png" alt="GTA vehículos" class="h-7 w-auto" />
      </div>

      <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <ul class="flex flex-wrap justify-center gap-x-10 gap-y-2 px-4">
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Inicio</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 1</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 2</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 3</a></li>
        </ul>
      </nav>

      <div class="flex items-center space-x-4">
        <a href="#" class="bg-[#b00000] text-white px-5 py-2 font-semibold rounded hover:bg-red-700 transition">
          REGISTRARSE
        </a>
        <a href="#" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition">
          INICIAR SESION
        </a>
      </div>
    </div>
  </header>
  <!-- Formulario -->
  <main class="px-10 py-14 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-10">Realizar pedido</h1>

    <form class="space-y-6">

      <div>
        <label for="direccion" class="block text-sm mb-1">Dirección</label>
        <input type="text" id="direccion" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="ciudad" class="block text-sm mb-1">Ciudad</label>
        <input type="text" id="ciudad" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="departamento" class="block text-sm mb-1">Departamento</label>
        <input type="text" id="departamento" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div>
        <label for="contacto" class="block text-sm mb-1">Número de contacto</label>
        <input type="text" id="contacto" class="w-full bg-black border border-white text-white px-4 py-2 outline-none" />
      </div>

      <div class="pt-4 flex justify-end">
        <button type="submit" class="border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">
          CONFIRMAR PEDIDO
        </button>
      </div>
    </form>
  </main>
    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
