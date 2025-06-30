<?php require_once __DIR__ . '/../layout/header.php'; ?>

<?php if ($productoDetalle): ?> <!-- Verifica si el producto existe -->
    <div class="producto-detalle">
        <img src="uploads/<?= $productoDetalle['imagen'] ?>" alt="<?= $productoDetalle['nombre'] ?>" class="imagen-grande"> <!-- Muestra la imagen del producto -->
        <div class="info-producto">
            <h2><?= $productoDetalle['nombre'] ?></h2> <!-- Muestra el nombre del producto -->
            <p><?= $productoDetalle['descripcion'] ?></p> <!-- Muestra la descripción del producto -->
            <p class="precio">$<?= number_format($productoDetalle['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto -->
            <a href="index.php?controller=carrito&action=agregar&id=<?= $productoDetalle['id'] ?>" class="boton">Agregar al carrito</a> <!-- Botón para agregar al carrito -->
        </div>
    </div>
<?php else: ?>
    <p>Producto no encontrado.</p> <!-- Mensaje si el producto no existe -->
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
