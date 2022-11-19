<?php 
    session_start();

    if(!isset($_SESSION['carrito'])){
        header("location: https://vinosdelvalle.store/carrito/index.php");
    }
    if(!isset($_SESSION['login'])){
        header("location: https://vinosdelvalle.store/login/index.php?error=Debes iniciar sesión para poder realizar un pedido");
    }

    $server = "localhost";
    $user= "u480286810_Raul";
    $pass_bd = "wEbwo4-robmew-mivnir";
    $bd = "u480286810_VDV";

    $conexion = new mysqli($server,$user,$pass_bd,$bd);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    } else {
        $mail_usuario = $_SESSION['user-id'];
        $query = "SELECT id_clientes FROM clientes WHERE correo = '$mail_usuario' LIMIT 1";

        $res_sql = mysqli_query($conexion,$query);
        if($res_sql == false){
            die(mysqli_error($conexion));
        }
        $datos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        foreach($datos as $id){
            $id_clien = $id['id_clientes'];
        }

        $total_pedido = $_SESSION['total'];
        $fecha_pedido = date('Y-m-d');

        $query = "INSERT INTO pedidos(id_clientes, total, fecha)
        VALUES($id_clien,'$total_pedido','$fecha_pedido')";

        $res_sql = mysqli_query($conexion,$query);
        if($res_sql == false){
            die(mysqli_error($conexion));
        }

        mysqli_free_result($res_sql);

        $query = "SELECT * FROM pedidos ORDER BY id_pedido DESC LIMIT 1";
        $res_sql = mysqli_query($conexion,$query);
        if($res_sql == false){
            die(mysqli_error($conexion));
        }
        $id_pedido_reciente = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        foreach($id_pedido_reciente as $x){
            $id_pedido = $x['id_pedido'];
        }

        $ids_vinos = implode(",", $_SESSION['carrito']);
        $cantidad_vinos = array_count_values($_SESSION['carrito']);

        $query = "SELECT * FROM vinos WHERE id_vinos IN ($ids_vinos)";
        $res_sql = mysqli_query($conexion,$query);
        if($res_sql == false){
            die(mysqli_error($conexion));
        }
        $resultados = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        foreach($resultados as $vino){
            $precio_vino = $vino['precio'];
            $piezas = $cantidad_vinos[$vino['id_vinos']];
            $precio_vino = (float)$vino['precio'] * (float)$piezas;
            $id_vino = $vino['id_vinos'];

            $query = "INSERT INTO info_pedidos(id_pedido, id_vino, cant, subtotal)
            VALUES('$id_pedido', '$id_vino', '$piezas', '$precio_vino')";
            $res_sql = mysqli_query($conexion,$query);
            if($res_sql == false){
                die(mysqli_error($conexion));
            }
            mysqli_free_result($res_sql);
        }

        mysqli_close($conexion);

        $_SESSION['carrito'] = array();

        header("Location: https://vinosdelvalle.store/User/index.php");
    }
?>