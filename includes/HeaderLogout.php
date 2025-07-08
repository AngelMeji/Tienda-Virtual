<?php
  if (session_status() === PHP_SESSION_NONE) { // Inicia la sesión solo si no ha sido iniciada previamente, para evitar errores por múltiples llamadas a session_start()
    session_start();
  }
  require_once __DIR__ . '/../models/Categoria.php'; // Se incluye el modelo Categoria que ya internamente llama a la base de datos
  $categorias = Categoria::getAll(); // Se obtiene el resultado de todas las categorías desde el modelo
?>

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
        <a href="index.php"><img src="uploads/logo.png" alt="GTA vehículos" class="h-7 w-auto"/></a>
      </div>

      <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <ul class="flex flex-wrap justify-center gap-x-10 gap-y-2 px-4">
          <li><a href="index.php" class="text-[#e0e0e0] font-medium hover:underline font-display">Inicio</a></li>
          <!-- Categorías dinámicas cargadas desde la base de datos -->
          <?php while ($categoria = mysqli_fetch_assoc($categorias)): ?> 
              <li>
                  <a href="index.php?controller=producto&action=porCategoria&id=<?= $categoria['id'] ?>" class="text-[#e0e0e0] font-medium hover:underline font-display"> <!-- Enlace a la categoría -->
                      <?= $categoria['nombre'] ?> <!-- Nombre de la categoría -->
                  </a>
              </li>
          <?php endwhile; ?>
        </ul>
      </nav>

      <div class="flex items-center space-x-4">
        <?php if (isset($_SESSION['user_id'])): ?>
          <!-- Mostrar nombre y botón cerrar sesión -->
          <a href="index.php?controller=user&action=logout" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition font-display">
            CERRAR SESIÓN
          </a>
          <span class="text-white font-semibold">
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </span>
        <?php else: ?>
          <!-- Mostrar botones de inicio y registro si no ha iniciado sesión -->
          <a href="index.php?controller=user&action=registerView" class="bg-[#b00000] text-white px-5 py-2 font-semibold rounded hover:bg-red-700 transition font-display">
            REGISTRARSE
          </a>
          <a href="index.php?controller=user&action=signin" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition font-display">
            INICIAR SESIÓN
          </a>
        <?php endif; ?>
      </div>
  </header>
  <body class="bg-black text-white font-sans">