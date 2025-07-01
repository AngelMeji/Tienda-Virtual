<?php

require_once __DIR__ . '/../../models/Categoria.php'; // Se incluye el modelo Categoria que ya internamente llama a la base de datos
$categorias = Categoria::getAll(); // Se obtiene el resultado de todas las categorías desde el modelo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>GTA vehiculos</title>
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
<body>
    <header>
        <div class="logo">
            <a href="index.php">GTA vehiculos</a>
        </div>

        <!-- Menú de navegación -->
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <!-- Categorías dinámicas cargadas desde la base de datos -->
                <?php while ($categoria = mysqli_fetch_assoc($categorias)): ?>
                    <li>
                        <a href="index.php?controller=producto&action=porCategoria&id=<?= $categoria['id'] ?>"> <!-- Enlace a la categoría -->
                            <?= $categoria['nombre'] ?> <!-- Nombre de la categoría -->
                        </a>
                    </li>
                <?php endwhile; ?>

                <!-- Enlaces fijos -->
                <li><a href="../index.php?controller=usuario&action=registro">Registrarse</a></li> <!-- Enlace al registro de usuario -->
                <li><a href="../index.php?controller=usuario&action=login">Iniciar Sesión</a></li> <!-- Enlace al inicio de sesión -->
                <a href="index.php?controller=carrito&action=ver">🛒 Carrito (<?= isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0 ?>)</a>  <!-- Enlace al carrito de compras con el conteo de productos -->
            </ul>
        </nav>
    </header>

    <!-- Contenedor principal donde se cargará el contenido dinámico de cada vista -->
    <main>