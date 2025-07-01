<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - GGA Vehículos</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    html, body {
      height: 100%;
      overflow: hidden;
    }
  </style>
</head>
<body class="bg-black text-white font-sans">

  <!-- Navbar -->
  <nav class="flex items-center justify-between p-4 bg-black text-white">
    <div class="text-2xl font-bold">
      <span class="text-gray-300">GGA</span> <span class="text-red-600">vehículos</span>
    </div>
    <ul class="flex gap-6">
      <li><a href="#" class="hover:text-red-500">Inicio</a></li>
      <li><a href="#" class="hover:text-red-500">Categoría 1</a></li>
      <li><a href="#" class="hover:text-red-500">Categoría 2</a></li>
      <li><a href="#" class="hover:text-red-500">Categoría 3</a></li>
    </ul>
    <a href="login.php" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">INICIAR SESIÓN</a>
  </nav>

  <!-- Main Content -->
  <main class="flex h-[calc(100vh-64px)]">
    <!-- Left side: Image (60%) -->
    <div class="w-[60%] bg-cover bg-center" style="background-image: url('../uploads/008.jpg')">
    </div>

    <!-- Right side: Register Form (40%) -->
    <div class="w-[40%] bg-black flex items-center justify-center">
      <div class="w-full max-w-md p-8">
        <h2 class="text-3xl font-bold mb-8">REGISTRARSE</h2>

        <!-- FORMULARIO CONECTADO AL CONTROLADOR -->
        <form action="../controllers/UserController.php" method="POST">
          <label class="block mb-2 text-sm" for="name">Nombre</label>
          <input
            type="text"
            id="name"
            name="name"
            required
            class="w-full mb-6 px-4 py-2 bg-black border border-gray-400 text-white placeholder-gray-500"
            placeholder="Nombre"
          />

          <label class="block mb-2 text-sm" for="email">Correo Electrónico</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            class="w-full mb-6 px-4 py-2 bg-black border border-gray-400 text-white placeholder-gray-500"
            placeholder="Correo Electrónico"
          />

          <label class="block mb-2 text-sm" for="password">Contraseña</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            class="w-full mb-6 px-4 py-2 bg-black border border-gray-400 text-white placeholder-gray-500"
            placeholder="Contraseña"
          />

          <button
            type="submit"
            name="register"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded w-full"
          >
            REGISTRAR
          </button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
