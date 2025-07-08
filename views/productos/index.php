<section class="grid grid-cols-3 gap-4 px-6 py-8 items-center">
    <div class="col-span-2">
        <img src="uploads/001.jpg" alt="Autos" class="w-full rounded" />
        <p class="text-sm text-neutral-400 mt-2 font-display">Patriot y Karin Sultan RS</p>
    </div>
    <div class="bg-neutral-900 p-6 rounded flex flex-col justify-between h-full">
        <div>
            <h2 class="text-xl font-bold mb-4 font-display">Ya disponible la nueva colección de autos lujosos</h2>
        </div>
        <div class="mt-auto">
            <button class="border border-white px-6 py-2 hover:bg-white hover:text-black transition">COMPRAR</button>
            <div class="flex space-x-2 mt-4">
                <div class="w-2 h-2 bg-white rounded-full"></div>
                <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<!-- Products -->
<section class="px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Nuestros Productos</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if ($productos && mysqli_num_rows($productos) > 0): ?> <!-- Verifica si hay productos disponibles -->
            <?php while($prod = mysqli_fetch_assoc($productos)): ?> <!-- Itera sobre cada producto -->
                <div class="bg-neutral-900 p-2 rounded">
                    <img src="<?= $prod['imagen'] ?>" alt="<?= $prod['nombre'] ?>" class="rounded w-full h-48 object-cover"> <!-- Muestra la imagen del producto -->
                    <h3 class="text-sm"><?= $prod['nombre'] ?></h3> <!-- Muestra el nombre del producto -->
                    <p class="font-bold text-lg">$<?= number_format($prod['precio'], 0, ',', '.') ?></p> <!-- Muestra el precio del producto -->
                    <a href="index.php?controller=producto&action=ver&id=<?= $prod['id'] ?>" class="text-red-400 hover:underline text-sm">Comprar</a> <!-- Botón para ver el producto -->
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-400">No hay productos disponibles por el momento.</p> <!-- Mensaje si no hay productos disponibles -->
        <?php endif; ?>
    </div>
</section>