<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  require_once "config/conexion.php";
  $conexion = Database::connect(); 

  require_once "includes/HeaderLogout.php";
?>

  <!-- Contenido principal -->
  <main class="px-10 py-14 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-10">Todos mis pedidos</h1>

    <div class="overflow-x-auto">
      <table class="table-auto w-full border-collapse text-sm">
        <thead>
          <tr class="text-left border-b border-white">
            <th class="pb-2">N° Pedido</th>
            <th class="pb-2">Precio</th>
            <th class="pb-2">Fecha</th>
            <th class="pb-2">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $id_usuario = $_SESSION['usuario']['id'];

            if (!$id_usuario) {
                die("Error: No has iniciado sesión.");
            }

            $sql = "SELECT * FROM pedidos WHERE usuario_id = $id_usuario";
            $resultado = $conexion->query($sql);

            while($data = $resultado->fetch_object()){
          ?>
          
            <tr class="border-b border-white">
              <td class="py-3"><?= $data -> id?></td>
              <td class="py-3"><?= $data -> coste?></td>
              <td class="py-3"><?= $data -> fecha?></td>
              <td class="py-3"><?= $data -> estado?></td>
            </tr>
          <?php echo "<br>"; }?>
        </tbody>
      </table>
    </div>
  </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-center text-sm py-4 text-gray-400">
      Desarrollado por el grupo GTA ADSO | SENA CDITI 2025
    </footer>
  </body>
</html>
