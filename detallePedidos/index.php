<?php
    session_start();

    if(!isset($_GET['pedido'])){
        header("location: https://vinosdelvalle.store/User/index.php");
        exit();
    }

    $server = "localhost";
    $user= "u480286810_Raul";
    $pass_bd = "wEbwo4-robmew-mivnir";
    $bd = "u480286810_VDV";

    $conexion = new mysqli($server,$user,$pass_bd,$bd);

    if ($conexion->connect_error) {
        die($conexion->connect_error);
    } else {
        $id_pedido = $_GET['pedido'];
        $query = "SELECT * FROM pedidos INNER JOIN clientes ON clientes.id_clientes = pedidos.id_clientes INNER JOIN info_pedidos ON info_pedidos.id_pedido = pedidos.id_pedido INNER JOIN vinos on vinos.id_vinos = info_pedidos.id_vino WHERE pedidos.id_pedido = '$id_pedido'";
        $res_sql = mysqli_query($conexion,$query);

        if($res_sql == false){
            die(mysqli_error($conexion));
        }
        
        $pedidos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        mysqli_close($conexion);
    }

?>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinos del Valle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karma&family=League+Spartan&family=Ledger&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/detallePedidos/estilosDetalle.css">
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="fila">
                <nav class="menu">
                    <a href="../exclusivo/index.php">Exclusivos</a>
                    <a href="../vinos/index.php">Vinos</a>
                    <a href="../">
                        <img src="../imagenes/logo_vinos_del_valle.svg" alt="LogoIMG" height="50">
                    </a>
                    <a href="../vinedos/index.php">Viñedos</a>
                    <a href="../login/index.php">Login</a>
                </nav>
                <div class="enlaces-header">
                    <a href="../Lupa/index.php">
                        <img src="../imagenes/icono-lupa.svg" alt="#">
                    </a>
                    <div class="vertical"></div>
                    <a href="../carrito/index.php">
                        <img src="../imagenes/icono-carrito.svg" alt="#">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenedor Rojo -->
    <section class="section_Detalle">
        <!-- Contenedor Azul -->
        <div class="cont_Detalle">
            <section class="titulo">
                <h1>Detalles de Pedido</h1>
            </section>

            <!-- Contenedor Verde -->
            <section class="tabla_Detalle">
                <div class="encabezados_Pedidos">
                    <p>No.Pedidos</p>
                    <p>Producto</p>
                    <p>Dirección de Envio</p>
                    <p>Importe</p>
                </div>
                <?php foreach($pedidos as $pedido){ ?>
                <div class="datos_Pedidos">
                    <p>#<?php echo $pedido['id_pedido']; ?></p>
                    <p><?php echo $pedido['nombre']; ?></p>
                    <p class="direccion"><?php echo $pedidos[0]['direccion']; ?></p>
                    <p>$<?php echo number_format((float)$pedido['subtotal'],0,".",","); ?></p>
                </div>
                <?php } ?>
            </section>
            <section class="section_Total">
                <div class="total_Titulo">
                    <h1>Total</h1>
                </div>
                <div class="cantidad_Total">
                    <p>$<?php echo number_format((float)$pedido['total'],0,".",","); ?></p>
                </div>

            </section>
            
        </div>
    </section>
    
</body>
</html>