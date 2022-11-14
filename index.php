<?php 
    $server = "localhost";
    $user= "u480286810_Raul";
    $pass_bd = "wEbwo4-robmew-mivnir";
    $bd = "u480286810_VDV";

    $conexion = new mysqli($server,$user,$pass_bd,$bd);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    } else {
        
        $consulta = "SELECT id_vinos, vinos.nombre as nom_vino, vinedo.nombre as nom_vinedo, precio, imagen From vinos INNER JOIN vinedo on vinedo.id_vinedo = vinos.id_vinedo ORDER BY precio DESC LIMIT 8";
        $res_sql = mysqli_query($conexion,$consulta);

        $productos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

        mysqli_free_result($res_sql);

        mysqli_close($conexion);
        
    }
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinos del Valle</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karma&family=League+Spartan&family=Ledger&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css"> 
    <link rel="stylesheet" href="css/vinos/vinos.css">
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="fila">
                <nav class="menu">
                    <a href="#">Exclusivos</a>
                    <a href="vinos/">Vinos</a>
                    <a href="#">
                        <img src="imagenes/logo_vinos_del_valle.svg" alt="LogoIMG" height="50">
                    </a>
                    <a href="vinedos/">Viñedos</a>
                    <a href="login/">Login</a>
                </nav>
                <div class="enlaces-header">
                    <a href="#">
                        <img src="imagenes/icono-lupa.svg" alt="#">
                    </a>
                    <div class="vertical"></div>
                    <a href="carrito/">
                        <img src="imagenes/icono-carrito.svg" alt="#">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="contenedor">
        <div class="tarjetas-home">
            <div class="tarjeta-home vinedos">
                <div class="contenido">
                    <a href="vinedos/">Viñedos</a>
                </div>
            </div>
            <div class="tarjeta-home vinos">
                <div class="contenido">
                    <a href="#">Vinos</a>
                </div>
            </div>
            <div class="tarjeta-home exclusivos">
                <div class="contenido">
                    <a href="#">Exclusivos</a>
                </div>
            </div>
        </div>
        <div class="vinos-populares">
            <h2>Populares</h2>
            <div class="vinos-cont">
            <?php foreach($productos as $vino){ ?>
                <div class="prod1">
                    <div class="overlap-group-container">
                        <div class="image-container">
                            <img class="vinoImg" src="https://vinosdelvalle.store/imagenes/vinos/<?php echo $vino['imagen']; ?>" alt="image 3"/>
                        </div>
                        <div class="overlap-group">
                            <div class="overlap-group-1">
                                <div class="titulo-1 valgin-text-middle leaguespartan-normal-almond-36px"><?php echo $vino['nom_vino']; ?></div>
                                <div class="titulo-2 valgin-text-middle librebaskerville-normal-pink-swan-16px"><?php echo $vino['nom_vinedo']; ?></div>
                                <img class="favIcon" src="https://vinosdelvalle.store/imagenes/favIcon.png" alt="image 5"/>
                            </div>
                            <div class="titulo-3">$<?php echo number_format((float)$vino['precio'],0,".",","); ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="nuestra-historia">
            <div class="col-texto">
                <h2>Nuestra Historia</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget iaculis metus, ut maximus libero. Aliquam sed quam nec mi pretium ullamcorper a luctus leo.</p>
                <p>Aliquam sed quam nec mi pretium ullamcorper a luctus leo. </p>
            </div>
            <div class="col-img">
                <img src="imagenes/img-nuestra-historia.png" alt="">
                <div class="recuadro"></div>
            </div>
        </div>
    </section>
    <section class="ordena-ahora">
        <div class="contenedor">
            <h2>Ordene Ahora</h2>
            <p>Fusce eu odio sit amet ligula laoreet faucibus. Maecenas non venenatis ipsum. Phasellus elementum scelerisque ultrices. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada </p>
            <div class="botones-ordenar">
                <a href="#">Online</a>
                <a href="#" class="btn-uber-eats">
                    <img src="imagenes/UberText.png" alt="">
                </a>
            </div>
        </div>
    </section>
   
    <footer>
        <div class="contenedor">
            <h3>Contáctenos</h3>
            <div class="iconos-redes-sociales">
                <a href="#">
                    <img src="imagenes/icon-facebook.png" alt="">
                </a>
                <a href="#">
                    <img src="imagenes/icon-instagram.png" alt="">
                </a>
                <a href="#">
                    <img src="imagenes/icon-twitter.png" alt="">
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
