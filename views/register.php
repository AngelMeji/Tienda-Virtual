<?php
  require_once __DIR__ . '/../includes/HeaderLogout.php'; // Include the header with the logout menu
?>

  <!-- Main Content -->
  <main class="flex h-[calc(100vh-64px)]">
    <div class="w-[60%] bg-cover bg-center" style="background-image: url('uploads/008.jpg')">
    </div>

    <div class="w-[40%] bg-black flex items-center justify-center">
      <div class="w-full max-w-md p-8">
        <h2 class="text-3xl font-bold mb-8">REGISTRARSE</h2>

        <!-- FORMULARIO CONECTADO AL CONTROLADOR -->
        <form action="index.php?controller=user&action=register" method="POST">
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
