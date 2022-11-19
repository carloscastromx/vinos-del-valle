<?php 
    session_start();

    if(!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = array();
    }

    if(isset($_GET['vino']) && isset($_GET['cant'])){
        $x = (int)$_GET['cant'];
        for($i = 1; $i <= $x; $i++){
            array_push($_SESSION['carrito'],$_GET['vino']);
        }
    }

    $cant_array = array_count_values($_SESSION['carrito']);

    $total_precio = 0;

    $server = "localhost";
    $user= "u480286810_Raul";
    $pass_bd = "wEbwo4-robmew-mivnir";
    $bd = "u480286810_VDV";

    $conexion = new mysqli($server,$user,$pass_bd,$bd);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    } else {
        $ids_vinos = implode(",", $_SESSION['carrito']);

        $query = "SELECT vinos.id_vinos, vinos.nombre as nom_vino, vinos.descripcion, vinos.imagen, vinos.precio, vinedo.nombre as nom_vinedo FROM vinos INNER JOIN vinedo ON vinedo.id_vinedo = vinos.id_vinedo WHERE id_vinos IN ($ids_vinos)";
        $res_sql = mysqli_query($conexion,$query);
        $vinos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        mysqli_close($conexion);

        foreach($vinos as $vino){
            $total_precio += (float)$cant_array[$vino['id_vinos']] * (float)$vino['precio'];
        }

        $_SESSION['total'] = $total_precio;
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
    <link rel="stylesheet" href="../css/carrito/carrito.css"> 
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

                    <div class="icono-user">
                         <a href="../login/index.php"> 
                         <img src="../imagenes/icono-user.svg " alt="#">

                    </a>
                    </div>
                   
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
    <section class="main-carrito contenedor">
        <h1>Carrito de Compras</h1>
        <section>
            <div class="large-row">
                
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">Producto (s)</div>
                            <div class="divTableCell">Precio</div>
                            <div class="divTableCell">Cantidad</div>
                            <div class="divTableCell"> Total</div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="carrito-box">
                <?php foreach($vinos as $vino){ ?>
                    <div class="producto-carrito">
                        <div class="producto-div">
                            <div class="imagen-producto">
                                <img src="../imagenes/vinos/<?php echo ucfirst(strtolower($vino['imagen'])) ; ?>" alt="#">
                            </div>
                            <div class="datos-producto-carrito">
                                <h3><?php echo $vino['nom_vino']; ?></h3>
                                <p><?php echo $vino['nom_vinedo']; ?></p>
                            </div>
                        </div>
                        <div class="precio-div">
                            <p>$<?php echo number_format((float)$vino['precio'],0,".",","); ?></p>
                        </div>
                        <div class="cantidad-div">
                            <p><?php echo $cant_array[$vino['id_vinos']]; ?></p>
                        </div>
                        <div class="total-div">
                            <p>$<?php echo number_format((float)$cant_array[$vino['id_vinos']] * (float)$vino['precio'],0,".",","); ?></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="total-row">
                    <p>Total</p>
                    <p class="precio">$<?php echo number_format((float)$total_precio,0,".",","); ?></p>
                </div>
            </div>

            <section class="section_Pago">
                <div class="titulo_Pago">
                    <h1>Tarjeta de Credito</h1>
                </div>
                
                <div class="cont_Pago">
                    <!-- Titular -->
                    <div class="titular_Tarjeta">
                        <label for="name" >Titular de Tarjeta: </label>
                        <input class="redondo" type="text" minlength="1" maxlength="45" placeholder="Daniel Ayala Domínguez">  
                    </div>
                        <!-- Numero de Tarjeta -->
                    <div class="num_Tarjeta">
                        <label for="name" >No. Tarjeta: </label>
                        <input class="redondo" type="text" minlength="16" maxlength="16" placeholder="XXXX XXXX XXXX XXXX">  
                    </div>
                    <!-- CVV -->
                    <div class="cvv_Tarjeta">
                        <label for="tarjeta" >CVV: </label>
                        <input class="redondo" type="text" minlength="3" maxlength="3" placeholder="XXX">  
                    </div>
                    <!-- Fecha Expiracion -->
                    <div class="fecha_Tarjeta">
                        <label for="tarjeta" >Fecha de Expiracion: </label>
                        <input class="redondo" type="month" minlength="4" maxlength="4" placeholder="xx/xx">  
                    </div>
                </div>


            </section>

            <div class="btn-carrito-row">
                <a href="procesar.php" class="boton-pago">Comprar</a>
            </div>        
        </section>
    </section>
    <footer>
        <div class="contenedor">
            <h3>Contáctenos</h3>
            <div class="iconos-redes-sociales">
                <a href="https://www.facebook.com/profile.php?id=100087619160116">
                    <img src="../imagenes/icon-facebook.png" alt="">
                </a>
                <a href="https://www.instagram.com/vinosdelvalle2022">
                    <img src="../imagenes/icon-instagram.png" alt="">
                </a>
                <a href="https://twitter.com/vdelvalle2022">
                    <img src="../imagenes/icon-twitter.png" alt="">
                </a>
            </div>
            <div class="datos-footer">
                <p class="correo">contacto@vinosdelvalle.store</p>
                <p class="copyright">Copyright © 2022 VINOSDELVALLE. Todos los derechos reservados.</p>
                <p></p>
            </div>
        </div>
    </footer>
</body>
</html>