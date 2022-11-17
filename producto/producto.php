<?php
    session_start();

    if(isset($_GET['vino'])){
        $id_vino = $_GET['vino'];

        $server = "localhost";
        $user= "u480286810_Raul";
        $pass_bd = "wEbwo4-robmew-mivnir";
        $bd = "u480286810_VDV";

        $correo = $_POST['user-mail'];
        $pass = $_POST['user-pass'];

        $conexion = new mysqli($server,$user,$pass_bd,$bd);

        if ($conexion->connect_error) {
            die($conexion->connect_error);
        } else {
            $query = "SELECT id_vinos, vinos.nombre as nom_vino, vinedo.nombre as nom_vinedo, descripcion, imagen, precio FROM vinos INNER JOIN vinedo on vinedo.id_vinedo = vinos.id_vinedo WHERE id_vinos = '$id_vino'";
            $res_sql = mysqli_query($conexion,$query);
            $vinos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

            mysqli_free_result($res_sql);

            mysqli_close($conexion);
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Karma&family=League+Spartan&family=Ledger&family=Libre+Baskerville&family=Lexend+Tera&family=M+PLUS+1+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/producto/estilosProducto.css"> 
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

                <!-- Carlos aqui va tu codigo para mostrar el producto -->
<?php foreach($vinos as $vino){ ?>
    <div class="cont-Producto">
        <div class="contIzquierda">
            <div class="contRojo">
                <img src="https://vinosdelvalle.store/imagenes/vinos/<?php echo ucfirst(strtolower($vino['imagen'])) ; ?>" alt="<?php echo $vino['nom_vino']; ?>">
            </div>

        </div>
        <div class="contDerecha">
            <h1><?php echo $vino['nom_vino'] ?></h1>
            <h2><?php echo $vino['nom_vinedo'] ?></h2>
            <p><?php echo $vino['descripcion'] ?></p>

            <div class="contBotones">
                <img src="../imagenes/icon-heart.png">
                
                
            </div>
            <div class="precio">
                    <a>$<?php echo number_format((float)$vino['precio'],0,".",","); ?></a>
            </div>
            <div class="labelCant">
                <input type="number" name="cant" id="cant" min="1">
            </div>
            <div class="buttonAñadir">
                <a id="agregar-carrito" href="#">Añadir al Carrito</a>
            </div>
        </div>
    </div>
<?php } ?>
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