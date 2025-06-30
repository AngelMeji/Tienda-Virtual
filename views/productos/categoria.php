<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2 class="titulo-productos">Categoría: <?= htmlspecialchars($nombreCategoria) ?></h2>

<div class="grid-productos">
    <?php if ($productos && mysqli_num_rows($productos) > 0): ?> <!-- Verifica si hay productos en la categoría -->
        <?php while ($prod = mysqli_fetch_assoc($productos)): ?> <!-- Itera sobre cada producto -->
            <div class="card-producto">
                <img src="uploads/<?= $prod['imagen'] ?>" alt="<?= $prod['nombre'] ?>"> <!-- Muestra la imagen del producto -->
                <h3><?= $prod['nombre'] ?></h3> <!-- Muestra el nombre del producto -->
                <p>$<?= number_format($prod['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto --> 
                <a href="index.php?controller=carrito&action=agregar&id=<?= $prod['id'] ?>" class="boton">Comprar</a> <!-- Botón para agregar al carrito -->
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay productos disponibles en esta categoría.</p> <!-- Mensaje si no hay productos en la categoría -->
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
