<?php
  // Si la sesión no ha sido iniciada, la inicia
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  // Importa el archivo donde está la clase "Categoria"
  require_once __DIR__ . '/../models/Categoria.php';

  // Llama al método getAll() de la clase Categoria para obtener todas las categorías desde la base de datos
  $categorias = Categoria::getAll();

  // Verifica si hay un usuario en sesión. Si no hay, $usuario queda como null
  $usuario = $_SESSION['usuario'] ?? null;

  // Verifica si hay un carrito en sesión. Si no hay, lo inicializa con cantidad 0 y total 0
  $carrito = $_SESSION['carrito'] ?? ['cantidad' => 0, 'total' => 0];
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
        <?php while ($categoria = mysqli_fetch_assoc($categorias)): ?>
          <li>
            <a href="index.php?controller=producto&action=porCategoria&id=<?= $categoria['id'] ?>" class="text-[#e0e0e0] font-medium hover:underline font-display">
              <?= htmlspecialchars($categoria['nombre']) ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </nav>

    <div class="flex items-center space-x-4">
      <?php if ($usuario): ?>
      <a href="index.php?controller=user&action=logout" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition font-display">
        CERRAR SESIÓN
      </a>
      <span class="text-white font-semibold">
        <?= htmlspecialchars($usuario['nombre']) ?>
      </span>

      <!-- Menú hamburguesa de usuario -->
      <div class="relative ml-4">
        <button onclick="toggleMenu()" class="text-white focus:outline-none">
          <!-- Icono de hamburguesa -->
          ☰
        </button>
        
        <ul id="userMenu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg text-sm text-black z-50">
          <li class="px-4 py-2 border-b font-semibold">Carrito</li>
          <li class="px-4 py-2">Productos: <?= $_SESSION['carrito']['cantidad'] ?? 0 ?></li>
          <li class="px-4 py-2">Total: $<?= $_SESSION['carrito']['total'] ?? 0 ?></li>
          <li class="px-4 py-2 border-b"><a href="index.php?controller=carrito&action=ver">Ver Carrito</a></li>

          <?php if (isset($_SESSION['usuario'])): ?>
              <?php if ($_SESSION['usuario']['rol'] === 'admin'): ?>
                <li class="px-4 py-2 border-b font-semibold">Admin</li>
                <li class="px-4 py-2"><a href="ProductManagement.php">Gestionar productos</a></li>
                <li class="px-4 py-2"><a href="CategoryManagement.php">Gestionar categorías</a></li>
                <li class="px-4 py-2"><a href="ManageOrders.php">Gestionar pedidos</a></li>
                <li class="px-4 py-2"><a href="AllMyOrders.php">Mis pedidos</a></li>
                <li class="px-4 py-2"><a href="index.php?controller=user&action=logout">Cerrar sesión</a></li>
              <?php else: ?>
                <li class="px-4 py-2 border-b font-semibold">Usuario</li>
                <li class="px-4 py-2"><a href="index.php?controller=pedido&action=misPedidos">Mis pedidos</a></li>
                <li class="px-4 py-2"><a href="index.php?controller=user&action=logout">Cerrar sesión</a></li>
              <?php endif; ?>
          <?php endif; ?>
        </ul>
      </div>
      <script>
        function toggleMenu() {
          // Busca el elemento con ID 'userMenu' (puede ser un menú desplegable)
          const menu = document.getElementById('userMenu');

          // Alterna la clase 'hidden' en ese elemento:
          // - Si el menú está oculto, lo muestra
          // - Si está visible, lo oculta
          menu.classList.toggle('hidden');
        }
      </script>
      <?php else: ?>
        <a href="index.php?controller=user&action=registerView" class="bg-[#b00000] text-white px-5 py-2 font-semibold rounded hover:bg-red-700 transition font-display">
          REGISTRARSE
        </a>
        <a href="index.php?controller=user&action=signin" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition font-display">
          INICIAR SESIÓN
        </a>
      <?php endif; ?>
    </div>
  </div>
</header>
<body class="bg-black text-white font-sans">