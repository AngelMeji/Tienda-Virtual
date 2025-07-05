<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gestionar productos</title>

  <!-- Tailwind CSS CDN -->
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
  <!-- Contenido principal -->
  <main class="px-10 py-14 max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-8">Gestionar de productos</h1>

    <!-- Botón crear producto -->
    <div class="mb-6">
      <button class="border border-white px-4 py-2 text-sm hover:bg-white hover:text-black transition">CREAR PRODUCTO</button>
    </div>

    <!-- Tabla de productos -->
    <div class="overflow-x-auto">
      <table class="table-auto w-full text-sm border-collapse">
        <thead>
          <tr class="text-left border-b border-white">
            <th class="py-2">ID</th>
            <th class="py-2">NOMBRE</th>
            <th class="py-2">PRECIO</th>
            <th class="py-2">STOCK</th>
            <th class="py-2">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b border-white">
            <td class="py-4">1</td>
            <td class="py-4">Grotti Turismo Omaggio (Superdeportivo)</td>
            <td class="py-4">$1.600.000</td>
            <td class="py-4">Si</td>
            <td class="py-4 space-x-2">
              <button class="border border-white px-4 py-1 text-sm hover:bg-white hover:text-black">EDITAR</button>
              <button class="bg-red-600 px-4 py-1 text-sm rounded hover:bg-red-700">ELIMINAR</button>
            </td>
          </tr>
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

