<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detalle del pedido Nº 1</title>

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
  <!-- Contenido principal -->
  <main class="px-10 py-14 max-w-5xl mx-auto space-y-10">
    <h1 class="text-2xl font-bold">Detalle del pedido N° 1</h1>

    <!-- Cambiar estado -->
    <div class="flex items-center gap-4">
      <label for="estado" class="text-sm">Cambiar estado del pedido</label>
      <select id="estado" name="estado" class="bg-black border border-white px-4 py-2 text-sm">
        <option>Pendiente</option>
        <option>Enviado</option>
        <option>Cancelado</option>
      </select>
      <button class="bg-red-600 px-4 py-2 text-sm rounded font-semibold hover:bg-red-700">CAMBIAR ESTADO</button>
    </div>

    <!-- Dirección -->
    <div class="space-y-1 text-sm leading-relaxed">
      <p class="font-semibold">Dirección del envío:</p>
      <p>Dirección: {Dirección ingresada}</p>
      <p>Ciudad: {Ciudad ingresada}</p>
      <p>Departamento: {Ciudad ingresada}</p>
      <p>Teléfono: {Teléfono ingresado}</p>
    </div>

    <!-- Datos del pedido -->
    <div class="text-sm leading-relaxed space-y-1">
      <p class="font-semibold">Datos del pedido:</p>
      <p>Número de pedido: 2</p>
      <p>Total a pagar: <span class="font-bold">$4.100.000</span></p>
      <p>Productos:</p>
    </div>

    <!-- Productos -->
    <div class="space-y-8">
      <!-- Producto 1 -->
      <div class="flex items-center space-x-6">
        <img src="7.png" alt="Producto 1" class="w-48 rounded-md" />
        <div class="flex-1">
          <p class="font-semibold">Grotti Turismo Omaggio (Superdeportivo)</p>
          <p class="text-xl font-bold mt-1">$1.600.000</p>
          <p class="text-sm mt-1">Stock: <span class="font-semibold">Sí</span></p>
        </div>
        <button class="bg-red-600 px-6 py-2 rounded text-sm font-semibold hover:bg-red-700">ELIMINAR</button>
      </div>

      <!-- Producto 2 -->
      <div class="flex items-center space-x-6">
        <img src="7.png" alt="Producto 2" class="w-48 rounded-md" />
        <div class="flex-1">
          <p class="font-semibold">Vectre & Benefactor Glendale (Deportivo y Sedan)</p>
          <p class="text-xl font-bold mt-1">$2.500.000</p>
          <p class="text-sm mt-1">Stock: <span class="font-semibold">Sí</span></p>
        </div>
        <button class="bg-red-600 px-6 py-2 rounded text-sm font-semibold hover:bg-red-700">ELIMINAR</button>
      </div>
    </div>

    <!-- Botón seguir explorando -->
    <div class="pt-6">
      <button class="border border-white px-6 py-2 text-sm hover:bg-white hover:text-black transition">SEGUIR EXPLORANDO</button>
    </div>
  </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
