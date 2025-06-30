<?php
    require_once  '../config/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //aqui se obtiene la id del usuario por URL, esta id de usuario tiene que ser la del usuario que inició sesion anteriormente
        $id = $_GET["id"];
        
        $sql = $conexion->query("select * from pedidos where usuario_id = $id");//asi hago la consulta yo más facil

        while($data = $sql->fetch_object()){?> <!--este while sirve para mostrar los datos que se sacan despues de hacer las consultas-->
        <?=$data -> id?><!--data es la variable en la cual se guarda la info del campo que se requiere, en este caso seria la id del pedido y asi susesivamente-->
        <?=$data -> provincia?>        
        <?=$data -> localidad?>        
        <?=$data -> direccion?>        
        <?=$data -> coste?>        
        <?=$data -> estado?>        
        <?=$data -> fecha?>        
        <?=$data -> hora?>        
    <?php
        }
    ?>
    
</body>
</html>