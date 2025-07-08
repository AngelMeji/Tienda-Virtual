<?php
require_once './includes/HeaderLogout.php'; // Incluye el encabezado con el menú de navegación y el logo
?>

<h2 class="text-2xl font-bold mb-6 my-10">Categoría: <?= htmlspecialchars($nombreCategoria) ?></h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
    <?php if ($productos && mysqli_num_rows($productos) > 0): ?> <!-- Verifica si hay productos en la categoría -->
        <?php while ($prod = mysqli_fetch_assoc($productos)): ?> <!-- Itera sobre cada producto -->
            <div class="bg-neutral-900 p-2 rounded">
                <img src="<?= $prod['imagen'] ?>" alt="<?= $prod['nombre'] ?>" class="rounded w-full h-48 object-cover"> <!-- Muestra la imagen del producto -->
                <h3 class="text-sm"><?= $prod['nombre'] ?></h3> <!-- Muestra el nombre del producto -->
                <p class="font-bold text-lg">$<?= number_format($prod['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto --> 
                <a href="index.php?controller=carrito&action=agregar&id=<?= $prod['id'] ?>" class="text-red-400 hover:underline text-sm">Comprar</a> <!-- Botón para agregar al carrito -->
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="text-gray-400">No hay productos disponibles en esta categoría.</p> <!-- Mensaje si no hay productos en la categoría -->
    <?php endif; ?>
</div>

