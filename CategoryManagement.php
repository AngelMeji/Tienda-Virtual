<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gestionar Categorías</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex flex-col">
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
  <!-- CONTENIDO PRINCIPAL -->
  <main class="flex-1 px-8 py-12 flex flex-col items-center">
    <div class="w-full max-w-5xl">
      <h1 class="text-2xl font-semibold mb-8">Gestionar de categorías</h1>

      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="border-b border-white">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">NOMBRE</th>
            <th class="px-4 py-2 text-right"></th>
          </tr>
        </thead>
        <tbody class="text-white">
          <!-- FILA 1 -->
          <tr class="border-b border-white">
            <td class="px-4 py-3 align-top">1</td>
            <td class="px-4 py-3 align-top">Grotti Turismo Omaggio (Superdeportivo)</td>
            <td class="px-4 py-3 flex justify-end space-x-2">
              <button class="border border-white text-white px-4 py-1 hover:bg-white hover:text-black transition">EDITAR</button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1">ELIMINAR</button>
            </td>
          </tr>
          <!-- FILA 2 -->
          <tr class="border-b border-white">
            <td class="px-4 py-3 align-top">2</td>
            <td class="px-4 py-3 align-top">Vectre & Benefactor Glendale (Deportivo y Sedán)</td>
            <td class="px-4 py-3 flex justify-end space-x-2">
              <button class="border border-white text-white px-4 py-1 hover:bg-white hover:text-black transition">EDITAR</button>
              <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1">ELIMINAR</button>
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
