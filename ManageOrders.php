<?php require_once "controllers/filtro_pedidos.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gestionar pedidos</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white font-sans">

  <header class="bg-[#0d0d0d] py-4">
    <div class="max-w-[1300px] mx-auto px-4 relative flex items-center justify-between">

      <div class="flex items-center">
        <img src="uploads/logo.png" alt="GTA vehículos" class="h-7 w-auto" />
      </div>

      <nav class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
        <ul class="flex flex-wrap justify-center gap-x-10 gap-y-2 px-4">
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Inicio</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 1</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 2</a></li>
          <li><a href="#" class="text-[#e0e0e0] font-medium hover:underline">Categoría 3</a></li>
        </ul>
      </nav>

      <div class="flex items-center space-x-4">
        <a href="#" class="bg-[#b00000] text-white px-5 py-2 font-semibold rounded hover:bg-red-700 transition">
          REGISTRARSE
        </a>
        <a href="#" class="border border-white text-white px-5 py-2 font-semibold rounded hover:bg-white hover:text-black transition">
          INICIAR SESION
        </a>
      </div>
    </div>
  </header>
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
