<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Producto</title>
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
  <main class="flex-1 flex flex-col items-center justify-start px-4 py-12">
    <div class="w-full max-w-2xl">
      <h1 class="text-2xl font-semibold mb-8">Editar producto <span class="text-white">{Nombre}</span></h1>

      <form class="space-y-6">
        <div>
          <label class="block mb-1">Nombre</label>
          <input type="text" class="w-full bg-black border border-gray-500 text-white px-3 py-2" />
        </div>
        <div>
          <label class="block mb-1">Descripción</label>
          <input type="text" class="w-full bg-black border border-gray-500 text-white px-3 py-2" />
        </div>
        <div>
          <label class="block mb-1">Precio</label>
          <input type="text" class="w-full bg-black border border-gray-500 text-white px-3 py-2" />
        </div>
        <div>
          <label class="block mb-1">Stock</label>
          <input type="text" class="w-full bg-black border border-gray-500 text-white px-3 py-2" />
        </div>
        <div>
          <label class="block mb-1">Categoría</label>
          <input type="text" class="w-full bg-black border border-gray-500 text-white px-3 py-2" />
        </div>
        <div>
          <label class="block mb-2">Imagen</label>
          <div class="flex items-center space-x-4">
            <img src="img" alt="Imagen actual" class="w-48 h-auto object-cover border border-gray-500" />
            <input type="file" class="border border-white px-3 py-2 text-sm bg-black text-white" />
          </div>
        </div>
        <div class="text-right">
          <button type="submit" class="border border-white text-white px-6 py-2 hover:bg-white hover:text-black transition">GUARDAR</button>
        </div>
      </form>
    </div>
  </main>
    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
