<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--este formulario funciona para poder filtrar por estado-->
    <form action="" method="POST">
        <label for="">filtro</label><br>
        <select name="estado" id="">
            <option value="">selecciona</option>
            <option value="procesando">Procesando</option>
            <option value="pendiente">pendiente</option>
            <option value="enviado">Enviado</option>
            <option value="entregado">Entregado</option>
        </select>

        <input type="submit" value="filtrar"><br>

        <?php   
        require_once "../controller/filtro_pedidos.php";
        
        while($data = $sql->fetch_object()){ ?><!--esto es lo mismo que en el historial, muestra los datos que se sacan despues de hacer la consulta-->
            
            <?= $data->id ?>
            <?= $data->usuario_id ?>
            <?= $data->provincia ?>
            <?= $data->localidad ?>
            <?= $data->direccion ?>
            <?= $data->coste ?>
            
            <select name="cambiar_estado[<?= $data->id ?>]" id=""> <!--este es el campo para poder actualizar el estado se usa el [ $data -> id ] justamente para recojer la id de el pedido al que se le va a cambiar el estado-->
                <option value="<?= $data->estado ?>"> <?= $data->estado ?> </option>
                <option value="pendiente">pendiente</option>
                <option value="procesando">procesando</option>
                <option value="enviado">enviado</option>
                <option value="entregado">entregado</option>
            </select>
            
            <?= $data->fecha ?>
            <?= $data->hora ?>

            <button type="submit" name="actualizar[<?= $data->id ?>]" value="<?= $data->id ?>">actualizar</button> <!--este botón manda la id de el pedido seleccionado porque si solo fuese un botón para todo, pues todo se actualiza-->
            
        <?php echo "<br>";}?>
            
    </form>
</body>
</html>