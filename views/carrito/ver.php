<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Carrito de Compras</h2>

<!-- Verifica si la variable de sesión 'carrito' no está vacía (es decir, si hay productos agregados) -->
<?php if (!empty($_SESSION['carrito'])): ?> 
    <table> <!-- Inicia la tabla HTML donde se mostrarán los productos del carrito -->
        <thead> <!-- Inicia el encabezado de la tabla -->
            <tr> <!-- Inicia una fila de encabezados -->
                <th>Producto</th> <!-- Encabezado de columna: nombre del producto -->
                <th>Imagen</th> <!-- Encabezado de columna: imagen del producto -->
                <th>Precio</th> <!-- Encabezado de columna: precio individual del producto -->
                <th>Cantidad</th> <!-- Encabezado de columna: cantidad de productos seleccionados -->
                <th>Total</th> <!-- Encabezado de columna: total por cada producto (precio * cantidad) -->
                <th>Eliminar</th> <!-- Encabezado de columna: opción para eliminar el producto del carrito -->
            </tr>
        </thead>
        <tbody> <!-- Inicia el cuerpo de la tabla donde se listarán los productos -->
            <?php $totalCarrito = 0; ?> <!-- Inicializa una variable para ir sumando el total de la compra -->
            <?php foreach ($_SESSION['carrito'] as $item): ?> <!-- Comienza un ciclo foreach para recorrer cada producto en el carrito -->
                <tr>
                    <td><?= $item['nombre'] ?></td> <!-- Muestra el nombre del producto -->
                    <td><img src="uploads/<?= $item['imagen'] ?>" width="80"></td> <!-- Muestra la imagen del producto, asumiendo que las imágenes están en una carpeta 'uploads' -->
                    <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td> <!-- Muestra el precio del producto, formateado con separador de miles -->
                    <td><?= $item['cantidad'] ?></td> <!-- Muestra la cantidad del producto en el carrito -->
                    <td>$<?= number_format($item['precio'] * $item['cantidad'], 0, ',', '.') ?></td> <!-- Muestra el total por producto (precio * cantidad), formateado con separador de miles -->
                    <td>
                        <a href="index.php?controller=carrito&action=eliminar&id=<?= $item['id'] ?>">🗑</a> <!-- Muestra un enlace para eliminar el producto del carrito, pasando su ID como parámetro -->
                    </td>
                </tr>
                <?php $totalCarrito += $item['precio'] * $item['cantidad']; ?> <!-- Acumula el total del carrito sumando el total de este producto -->
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><strong>Total:</strong></td> <!-- Celda que abarca 4 columnas y muestra el texto "Total:" -->
                <td><strong>$<?= number_format($totalCarrito, 0, ',', '.') ?></strong></td> <!-- Muestra el total general del carrito con formato -->
                <td><a href="index.php?controller=carrito&action=vaciar">Vaciar carrito</a></td> <!-- Enlace que permite vaciar todo el carrito -->
            </tr>
        </tfoot>
    </table>
<?php else: ?> <!-- Si el carrito está vacío, muestra un mensaje alternativo -->
    <p>No hay productos en el carrito.</p>
<?php endif; ?>

<!-- Botón para finalizar pedido -->
 <a href="index.php?controller=pedido&action=formulario" class="boton">Finalizar compra</a>

<!-- Botón para seguir explorando productos -->
<div style="margin-top: 20px;">
    <a href="index.php" class="boton">← Seguir explorando</a>
</div>


<?php require_once __DIR__ . '/../layout/footer.php'; ?>