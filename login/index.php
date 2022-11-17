<?php 
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            
            //Buscar alias por si ya existe
            $query = "SELECT * FROM clientes WHERE correo = '$correo' AND contrasena = '$pass'";
            $res_sql = mysqli_query($conexion,$query);
            $filas_query = mysqli_num_rows($res_sql);

            if($filas_query > 0){
                $_SESSION["login"] = '1';
                header("Location: https://vinosdelvalle.store/login/index.php?exito=Inicio de sesión exitoso");
                exit();
            } else {
                header("Location: https://vinosdelvalle.store/login/index.php?error=Datos incorrectos");
                exit();
            }

            mysqli_free_result($res_sql);

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
    <link rel="stylesheet" href="../css/login/estilosLogin.css"> 
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
    <!--Contenedor Central-->
    <div class = "contenedor_central">
        <h1>Log In</h1>
        <p class="resultado-txt <?php if(isset($_GET['error'])){
                echo "error-txt";
        } else if(isset($_GET['exito'])){
           echo "exito-txt";
        } ?>"><?php if(isset($_GET['error'])){
            echo $_GET['error'];
        } else if(isset($_GET['exito'])){
            echo $_GET['exito'];
        } ?></p>
        <form method="post">
            <!--Email-->
            <div class="text_field">
                <input type="text" name="user-mail" id="user-mail" required>
                <span></span>
                <label>Correo</label>
            </div>
            <!--Password-->
            <div class="text_field">
                <input type="password" name="user-pass" id="user-pass" required>
                <span></span>
                <label>Contraseña</label>
            </div>
            <!--Submit Button-->
            <input type="submit" value="Login">
            <!--No Registrado?-->
            <div class="registrarse_link">
                ¿No esta registrado?
                <a href = "../registro/">Registrarse</a>
            </div>
        </form>
    </div>

    
</body>
</html>