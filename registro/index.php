<?php

    session_start();

    if(isset($_POST['alias'])){
        $server = "localhost";
        $user= "u480286810_Raul";
        $pass_bd = "wEbwo4-robmew-mivnir";
        $bd = "u480286810_VDV";

        $alias = $_POST['alias'];
        $nombre = $_POST['nombre'];
        $mail = $_POST['mail'];
        $cumple = $_POST['cumple'];
        $password = $_POST['password'];
        $direccion = $_POST['dir-calle'] . ", " . $_POST['dir-int'] . ", " . $_POST['dir-ciudad'] . ", " . $_POST['dir-cp'];

        $conexion = new mysqli($server,$user,$pass_bd,$bd);

        if ($conexion->connect_error) {
            die($conexion->connect_error);
        } else {
            //Buscar alias por si ya existe
            $query = "SELECT * FROM clientes WHERE alias = '$alias'";
            $res_sql = mysqli_query($conexion,$query);
            $filas_query = mysqli_num_rows($res_sql);

            mysqli_free_result($res_sql);

            if($filas_query >= 1){
                header("Location: https://vinosdelvalle.store/registro/index.php?error=El alias ya existe");
                exit();
            }

            //Insert en clientes
            $query = "INSERT INTO clientes(alias, nombre_cliente, contrasena, correo, cumpleanos, direccion)
            VALUES('$alias', '$nombre', '$password', '$mail', '$cumple', '$direccion')";

            $res_sql = mysqli_query($conexion,$query);

            if($res_sql == true){
                $_SESSION["login"] = '1';
                header("Location: https://vinosdelvalle.store/registro/index.php?error=Haz sido registrado y loggeado");
            } else {
                header("Location: https://vinosdelvalle.store/registro/index.php?exito=Error al registrar usuario");
                exit();
            }

            mysqli_free_result($res_sql);

            mysqli_close($conexion);
        }

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
    <link rel="stylesheet" href="../css/registro/estilosRegistro.css"> 
</head>
<body>
    <header>
        <div class="contenedor">
            <div class="fila">
                <nav class="menu">
                    <a href="../exclusivo/">Exclusivos</a>
                    <a href="../vinos/">Vinos</a>
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
                    <a href="../Lupa/">
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

    <!--Contenedor Central-->
    <div class = "contenedor_central">
        <h1>Registrarse</h1>
        <p class="resultado-txt <?php if(isset($_GET['error'])){
                echo "error-txt";
        } else if(isset($_GET['exito'])){
           echo "exito-txt";
        } ?>"><?php if(isset($_GET['error'])){
            echo $_GET['error'];
        } else if(isset($_GET['exito'])){
            echo $_GET['exito'];
        } ?></p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="cont_izquierda">
                <h2>Perfil</h2>

                <!--Alias-->
                <div class="text_field">
                    <input type="text" id="alias" name="alias" required>
                    <span></span>
                    <label>Alias</label>
                </div>
                <!--Nombre-->
                <div class="text_field">
                    <input type="text" id="nombre" name="nombre" required>
                    <span></span>
                    <label>Nombre Completo</label>
                </div>
                <!--Correo-->
                <div class="text_field">
                    <input type="text" id="mail" name="mail" required>
                    <span></span>
                    <label>Correo</label>
                </div>
                <!--Fecha de nacimiento-->
                <div class="text_field">
                    <!-- <label for="Nacimiento">Fecha de naciemiento</label> -->
                    <!-- <label>dd/mm/aaaa</label> -->
                    <div class="cumple_field">
                        <input type="date" id="cumple" name="cumple"required>
                    </div>

                </div>
                <!--Contraseña-->
                <div class="text_field">
                    <input type="password" id="password" name="password" required>
                    <span></span>
                    <label>Contraseña</label>
                </div>

                <!--Confirmar contraseña (Despues de las pruebas)-->
                <!-- <div class="text_field">
                    <input type="password" required>
                    <span></span>
                    <label>Confirmar contraseña</label>
                </div> -->

            </div>
            
            <!--Contenedor derecha-->
            <div class="cont_derecha">
                <h2>Direccion</h2>
                <!--Dirección-->
                <div class="text_field">
                    <input type="text" id="dir-calle" name="dir-calle" required>
                    <span></span>
                    <label>Calle y número</label>
                </div>

                <div class="text_field">
                    <input type="text" id="dir-int" name="dir-int" required>
                    <span></span>
                    <label>Nº Interior</label>
                </div>

                <div class="text_field">
                    <input type="text" id="dir-ciudad" name="dir-ciudad" required>
                    <span></span>
                    <label>Ciudad</label>
                </div>
                
                <div class="text_field">
                    <input type="text" id="dir-cp" name="dir-cp" required>
                    <span></span>
                    <label>Codigo Postal</label>
                </div>
            </div>

            <!--Submit Button-->
            <input type="submit" value="Login"></button>
            <!--Ya tiene cuenta-->
            <div class="registrarse_link">
                ¿Ya tiene una cuenta?
                <a href = "../login/">Log In</a>
            </div>
            
        </form>
    </div>
    
</body>
</html>