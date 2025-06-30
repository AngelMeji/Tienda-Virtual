<?php
require_once __DIR__ . '/../layout/header.php'; // Carga el encabezado de la vista
?>

<section class="banner"> <!-- Sección del banner -->
    <img src="../uploads/0a911033a5531158c0e990883a5fdb1fae608415.jpg" alt="Banner"> <!-- Imagen del banner -->
        <h2>Ya disponible la nueva colección de autos lujosos</h2> <!-- Título del banner -->
        <a class="boton" href="#">COMPRAR</a> <!-- Botón de compra -->
    </div>
</section>


<h2 class="titulo-productos">Nuestros Productos</h2>

<div class="grid-productos">
    <?php if ($productos && mysqli_num_rows($productos) > 0): ?> <!-- Verifica si hay productos disponibles -->
        <?php while($prod = mysqli_fetch_assoc($productos)): ?> <!-- Itera sobre cada producto -->
            <div class="card-producto">
                <img src="uploads/<?= $prod['imagen'] ?>" alt="<?= $prod['nombre'] ?>"> <!-- Muestra la imagen del producto -->
                <h3><?= $prod['nombre'] ?></h3> <!-- Muestra el nombre del producto -->
                <p>$<?= number_format($prod['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto -->
                <a href="index.php?controller=producto&action=ver&id=<?= $prod['id'] ?>" class="boton">Comprar</a> <!-- Botón para ver el producto -->
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay productos disponibles por el momento.</p> <!-- Mensaje si no hay productos disponibles -->
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>