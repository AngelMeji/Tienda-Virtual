<?php
  require_once "config/conexion.php";
  $conexion = Database::connect(); 
  require_once './includes/HeaderLogout.php';
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
            
            if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Luego haces tu consulta
    $conexion = new mysqli("localhost", "root", "", "nombre_bd");
    $sql = "SELECT * FROM pedidos WHERE cliente_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    // etc...
} else {
    echo "ID no recibido.";
}

            $sql = $conexion->query("select * from pedidos where usuario_id = $id");

            while($data = $sql->fetch_object()){
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
