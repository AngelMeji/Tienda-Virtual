<?php
    session_start(); // Inicia la sesión

    require_once __DIR__ . '/models/Producto.php';        // Importa el modelo Producto
    require_once __DIR__ . '/includes/HeaderLogout.php';  // Importa el encabezado con navegación

    // Solo permitir el acceso a usuarios con rol 'admin'
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
        // Si no es administrador, redirige al formulario de inicio de sesión
        header('Location: ../views/signin.php');
        exit;
    }

    // Crear una instancia del modelo Producto
    $productoModel = new Producto();

    // Obtener todos los productos desde la base de datos
    $productos = $productoModel->getAll();
?>

<main class="px-10 py-14 max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-8">Gestionar productos</h1>

    <!-- Botón crear producto -->
    <div class="mb-6">
        <a href="crearProducto.php" class="border border-white px-4 py-2 text-sm hover:bg-white hover:text-black transition">
            CREAR PRODUCTO
        </a>
    </div>

    <!-- Tabla de productos -->
    <div class="overflow-x-auto">
        <table class="table-auto w-full text-sm border-collapse">
            <thead>
                <tr class="text-left border-b border-white">
                    <th class="py-2">ID</th>
                    <th class="py-2">Nombre</th>
                    <th class="py-2">Precio</th>
                    <th class="py-2">Categoría</th>
                    <th class="py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($producto = $productos->fetch_assoc()): ?>
                    <tr class="border-b border-white">
                        <td class="py-4"><?= $producto['id'] ?></td>
                        <td class="py-4"><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td class="py-4">$<?= number_format($producto['precio']) ?></td>
                        <td class="py-4"><?= $producto['categoria_id'] ?></td>
                        <td class="py-4 space-x-2">
                            <a href="editarProducto.php?id=<?= $producto['id'] ?>" class="border border-white px-4 py-1 text-sm hover:bg-white hover:text-black">EDITAR</a>
                            <a href="eliminarProducto.php?id=<?= $producto['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')" class="bg-red-600 px-4 py-1 text-sm rounded hover:bg-red-700">ELIMINAR</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Footer -->
<footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
    Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
</footer>
