<?php
  // Importa el archivo HeaderLogout.php que probablemente contiene el menú, categorías y diseño del encabezado
  require_once __DIR__ . '/../includes/HeaderLogout.php';

  // Inicia la sesión si aún no ha sido iniciada
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  // Verifica si el usuario ya tiene una sesión activa (es decir, ya inició sesión)
  if (isset($_SESSION['user_id'])) {
      // Si el usuario ya está logueado, lo redirige a otra página, como el inicio o el panel
      header("Location: ../index.php");
      exit(); // Detiene la ejecución del script
  }
?>
  <!-- Main Content -->
  <main class="flex h-[calc(100vh-64px)]">
    <div class="w-[60%] bg-cover bg-center" style="background-image: url('uploads/003.jpg')">
    </div>

    <div class="w-[40%] bg-black flex items-center justify-center">
      <div class="w-full max-w-md p-8">
        <h2 class="text-3xl font-bold mb-8">INICIAR SESIÓN</h2>

        <!-- Conexión al controlador -->
        <form action="index.php?controller=user&action=login" method="POST">
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
            name="login"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded w-full"
          >
            INICIAR
          </button>
        </form>
      </div>
    </div>
  </main>

