<?php require_once __DIR__ . '/../layout/header.php'; ?>

<h2>Finalizar Pedido</h2>

<?php if (!empty($_SESSION['carrito'])): ?> <!-- Verifica si el carrito tiene productos. Si no está vacío, se muestra el formulario -->
<form method="post" action="index.php?controller=pedido&action=procesar"> <!-- Comienza el formulario. Usa el método POST y envía los datos a 'pedido/procesar' -->
    <label>Nombre completo:</label><br> <!-- Etiqueta para el campo de nombre -->
    <input type="text" name="nombre" required><br><br> <!-- Campo de entrada para el nombre, requerido -->

    <label>Dirección de envío:</label><br> <!-- Etiqueta para el campo de dirección -->
    <textarea name="direccion" rows="3" required></textarea><br><br> <!-- Área de texto para la dirección, requerida -->

    <label>Teléfono:</label><br> <!-- Etiqueta para el campo de teléfono -->
    <input type="tel" name="telefono" required><br><br> <!-- Campo de entrada para el teléfono, requerido -->

    <label>Método de pago:</label><br> <!-- Etiqueta para el campo de método de pago -->
    <select name="metodo_pago"> <!-- Menú desplegable para seleccionar el método de pago -->
        <option value="Entrega">Pago contra entrega</option>
        <option value="Transferencia">Transferencia</option>
    </select><br><br>

    <input type="submit" value="Confirmar pedido" class="boton"> <!-- Botón para enviar el formulario y confirmar el pedido -->
</form>

<?php else: ?> <!-- Si el carrito está vacío, muestra un mensaje -->
    <p>No hay productos en el carrito.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>