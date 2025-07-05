<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GTA Vehículos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
          theme: {
          extend: {
              fontFamily: {
              display: ['Helvetica Now Display', 'sans-serif'],
              }
          }
          }
      }
    </script>
  </head>
  <header class="bg-[#0d0d0d] py-4">
    <div class="max-w-[1300px] mx-auto px-4 relative flex items-center justify-between">

      <div class="flex items-center">
        <img src="uploads/logo.png" alt="GTA vehículos" class="h-7 w-auto" />
      </div>

      <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <ul class="flex flex-wrap justify-center gap-x-10 gap-y-2 px-4">
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline font-display">Inicio</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline font-display">Categoría 1</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline font-display">Categoría 2</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline font-display">Categoría 3</a></li>
        </ul>
      </nav>

      <div class="flex items-center space-x-4">
        <a href="#" class="bg-[#b00000] text-white px-5 py-2 font-semibold rounded hover:bg-red-700 transition font-display">
          REGISTRARSE
        </a>
        <a href="#" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition font-display">
          INICIAR SESION
        </a>
      </div>
    </div>
  </header>
  <body class="bg-black text-white font-sans">