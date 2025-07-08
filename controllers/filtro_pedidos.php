<?php
    require_once  'config/conexion.php';
    $conexion = Database::connect();
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $estado = $_POST["estado"];

        // Este es el codigo y las sentencias sql para poder filtrar por estado
        if(!empty($estado)){    //si el botón se selecciona se hace la consulta que muestra los pedidos con la condicion del estado 
            $sql = $conexion->query("select * from pedidos where estado = '$estado'");
        }else{
            $sql = $conexion->query("select * from pedidos"); //si se acciona el botón sin seleccionar se hace la consulta en la que se muestran todos los pedidos
        }

        // Actualizar estado de pedidos
        if(!empty($_POST["actualizar"])){ //recibe el array que manda el botón de actualizar
            foreach($_POST["actualizar"] as $id => $value){ //se recorre ese array
                if(!empty($_POST["cambiar_estado"][$id])){
                    $estado2 = $_POST["cambiar_estado"][$id]; // se guarda el estado seleccionado en esta variable
                    $sql2 = $conexion->query("update pedidos set estado = '$estado2' where id = $id"); // se hace la consulta
                }
            }
            header("Location: ManageOrders.php");
        }
    }else{
        $sql = $conexion->query("select * from pedidos"); //si todavia no ha presionado el botón para que el controlador reciba el post igual se hace la consulta para que muestre todos los pedidos
    }
?>