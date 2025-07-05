<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GTA Vehículos</title>
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
  <!-- Main Content -->
  <main class="flex flex-col md:flex-row justify-between px-10 py-10 space-y-10 md:space-y-0 md:space-x-12">

    <!-- Imagen + info -->
    <div class="max-w-md">
      <img src="" alt="Grotti Turismo Omaggio" class="rounded-lg mb-2" />
      <p class="italic text-sm text-gray-300">Grotti Turismo Omaggio (Superdeportivo)</p>
      <p class="mt-4"><span class="font-semibold">Stock:</span> Si</p>
      <button class="mt-4 border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">AÑADIR A CARRITO</button>
    </div>

    <!-- Descripción -->
    <div class="max-w-xl">
      <h1 class="text-2xl font-bold mb-6">Un superdeportivo elegante y veloz ideal para dominar las calles de GTA Online.</h1>
      <p class="text-sm text-gray-300 mb-8 leading-relaxed">
        El Pegassi Torero XO es un superdeportivo de lujo en GTA Online, inspirado en el diseño de autos italianos clásicos y modernos.
        Ofrece una combinación de velocidad, aceleración y maniobrabilidad excepcionales, lo que lo convierte en una excelente opción para carreras y desplazamientos rápidos.
        Su estética agresiva y aerodinámica, junto con amplias opciones de personalización, lo hacen destacar tanto en rendimiento como en estilo.
      </p>

      <div class="flex justify-between items-center">
        <p class="text-2xl font-semibold">$1.600.600</p>
        <div class="space-x-4">
          <button class="bg-red-600 px-6 py-2 text-sm font-semibold rounded hover:bg-red-700 transition">COMPRAR</button>
          <button class="border border-white px-6 py-2 text-sm font-semibold hover:bg-white hover:text-black transition">VER OTROS</button>
        </div>
      </div>
    </div>

  </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
