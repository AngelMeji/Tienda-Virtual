<?php require_once "controllers/filtro_pedidos.php"; 
require_once "includes/HeaderLogout.php";
?>

  <!-- Contenido principal -->
  <main class="px-10 py-14 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-10">Gestionar pedidos</h1>

    <div class="overflow-x-auto">
      <form action="" method="POST">
        <label for="">Filtrar por estado</label>
        <select name="estado" class="text-black mx-4 rounded">
          <option value="">Seleccionar</option>
          <option value="procesando">Procesando</option>
          <option value="pendiente">Pendiente</option>
          <option value="enviado">Enviado</option>
          <option value="entregado">Entregado</option>
        </select>

        <input type="submit" value="filtrar" class="px-3 bg-red-700 my-3 rounded">

        <table class="table-auto w-full border-collapse text-sm my-3">
        <thead>
          <tr class="text-left border-b border-white">
            <th class="pb-2">N° Pedido</th>
            <th class="pb-2">Precio</th>
            <th class="pb-2">Direccion</th>
            <th class="pb-2">Fecha</th>
            <th class="pb-2">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($data = $sql->fetch_object()){
          ?>
          <tr class="border-b border-white">
            <td class="py-3"><?= $data -> id ?></td>
            <td class="py-3"> <?= $data->coste ?></td>
            <td class="py-3"><?= $data->direccion ?></td>
            <td class="py-3"><?= $data->fecha?></td>

            <td class="text-black"><select class="rounded" name="cambiar_estado[<?=$data->id ?>]" >
              <option value="<?= $data->estado ?>"> <?= $data->estado ?> </option>
              <option value="pendiente">Pendiente</option>
              <option value="procesando">Procesando</option>
              <option value="enviado">Enviado</option>
              <option value="entregado">Entregado</option>
            </select></td>
            
            <td><button class="rounded bg-red-700 px-3 py-1" type="submit" name="actualizar[<?= $data->id ?>]" value="<?= $data->id ?>">actualizar</button></td>
          </tr>

            
          <?php echo "<br>"; }?>
        </tbody>
      </table>
      </form>
    </div>
  </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
