<?php 
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: https://vinosdelvalle.store/login/index.php");
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
        $mail_cliente = $_SESSION['user-id'];
        $query = "SELECT * FROM pedidos INNER JOIN clientes ON clientes.id_clientes = pedidos.id_clientes WHERE correo = '$mail_cliente'";
        $res_sql = mysqli_query($conexion,$query);
        
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
    <link rel="stylesheet" href="../css/user/user.css">
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

    <section class="userSection">
        <!-- Tarjeta de Usuario -->
        <div class="userContainer">
            <!-- Foto y circulo -->
            <div class="nombreFoto">
                <div class="circulo">
                    
                </div>
                <img src="../imagenes/user.png" alt="UserIcon"/>
                
            </div>
            <div class="nombre">
                <h1><?php echo $pedidos[0]['nombre_cliente']; ?> (<?php echo $pedidos[0]['alias']; ?>)</h1>
            </div>
            
            
            <!-- Tabla de Pedido -->
            <section class="historialPedidos">
                <div class="encabezados">
                    <p>No. Referencia</p>
                    <p>Fecha</p>
                    <p>Precio</p>
                    <p>Detalle</p>
                </div>
                <?php foreach($pedidos as $pedido){ ?>
                <div class="datos">
                    <p>#<?php echo $pedido['id_pedido']; ?></p>
                    <p><?php echo $pedido['fecha']; ?></p>
                    <p>$<?php echo number_format((float)$pedido['total'],0,".",","); ?></p>
                    <a href="../detallePedidos/index.php?pedido=<?php echo $pedido['id_pedido']; ?>">Ver Detalle</a>
                </div>
                <?php } ?>
            </section>    
            
        </div>

        
        

    </section>
    
</body>
</html>