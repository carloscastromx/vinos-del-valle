<?php
    session_start();

    if(isset($_GET['buscar'])){
        $buscar = $_GET['buscar'];

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
            $query = "SELECT id_vinos, vinos.nombre as nom_vino, vinedo.nombre as nom_vinedo, imagen, precio FROM vinos INNER JOIN vinedo on vinedo.id_vinedo = vinos.id_vinedo WHERE vinos.nombre LIKE '%$buscar%' OR tipo LIKE '%$buscar%'";
            $res_sql = mysqli_query($conexion,$query);
            $vinos = mysqli_fetch_all($res_sql,MYSQLI_ASSOC);

            mysqli_free_result($res_sql);

            mysqli_close($conexion);
        }
    }

    if(isset($_GET['vinedo'])){
        $vinedo_id = $_GET['vinedo'];

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
            $query = "SELECT id_vinos, vinos.nombre as nom_vino, vinedo.nombre as nom_vinedo, imagen, precio FROM vinos INNER JOIN vinedo on vinedo.id_vinedo = vinos.id_vinedo WHERE vinedo.id_vinedo = '$vinedo_id'";
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
    <link href="https://fonts.googleapis.com/css2?family=Karma&family=League+Spartan&family=Ledger&family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/vinos/vinos.css">
    <link rel="stylesheet" href="../css/Lupa/estilosLupa.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="fila">
                <nav class="menu">
                    <a href="../">
                        <img src="../imagenes/logo_vinos_del_valle.svg" alt="LogoIMG" height="50">
                    </a>
                    <div class="Busqueda">
                        <input type="text" placeholder="Buscar" id="input-busqueda">
                    </div>
                    
                    <img style="cursor: pointer;" src="../imagenes/icono-lupa.svg" alt="#" id="btn-buscar">
                    
                </nav>
                
                <div class="icono-user">
                    <a href="../login/index.php"> 
                    <img src="../imagenes/icono-user.svg " alt="#">
                    
                    <div class="vertical"></div>
                    
                    <a href="../carrito/index.php">
                        <img src="../imagenes/icono-carrito.svg" alt="#">
                    </a>
               </a>
               </div>
                   
                    
                </div>
            </div>
        </div>
    </header>
    <section class="vinos" style="display: flex; margin-bottom: 40px;">
        <div class="enlacesLupa">
            <div class="textoLupa">
                <ul>
                    <li> <a href="../exclusivo/index.php">Exclusivos </a></li>
                    <li> <a href="../vinedos/index.php">Viñedo </a></li>
                    <li> <a href="../vinos/index.php">Vinos </a></li>
                </ul>
            </div>
        </div>
        <div class="productos vinos-cont">
            <?php foreach($vinos as $vino){ ?>
                    <a class="prod1" href="../producto/producto.php?vino=<?php echo $vino['id_vinos']; ?>">
                        <div class="overlap-group-container">
                            <div class="image-container">
                                <img class="vinoImg" src="https://vinosdelvalle.store/imagenes/vinos/<?php echo ucfirst(strtolower($vino['imagen'])) ; ?>" alt="<?php echo $vino['nom_vino']; ?>"/>
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
                    </a>
            <?php } ?>
        </div>
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
    <script>
        $(document).ready(function(){
            $("#btn-buscar").on('click', function(){
                console.log("click");
                var termino = $("#input-busqueda").val();
                if(termino == ""){
                    alert("Ingresa un término de búsqueda");
                } else {
                    window.location.href = "/Lupa/index.php?buscar="+termino;
                }
            });
        });
    </script>
</body>
</html>
