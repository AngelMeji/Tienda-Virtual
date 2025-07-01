<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> GTA Vehículos </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: 'Helvetica Now Display';
            src: url('/fonts/HelveticaNowDisplay-BoldIta.woff2') format('woff2');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Helvetica Now Display';
            src: url('/fonts/HelveticaNowDisplay-BoldIta.woff') format('woff');
            font-weight: 700;
            font-style: normal;
        }
    </style>
  </head>
  <!-- Header -->
  <header class="flex justify-between items-center px-6 py-4 bg-black border-b border-neutral-800">
    <div class="flex items-center space-x-2">
      <img src="logo.png" alt="logo" class="h-6" />
      <span class="text-red-600 font-bold">vehículos</span>
    </div>
    <nav class="flex space-x-6 text-sm">
      <a href="#" class="hover:underline">Inicio</a>
      <a href="#" class="hover:underline">Categoría 1</a>
      <a href="#" class="hover:underline">Categoría 2</a>
      <a href="#" class="hover:underline">Categoría 3</a>
    </nav>
    <div class="flex space-x-2">
      <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 text-sm">REGISTRARSE</button>
      <button class="border border-white px-4 py-1 text-sm">INICIAR SESIÓN</button>
    </div>
  </header>