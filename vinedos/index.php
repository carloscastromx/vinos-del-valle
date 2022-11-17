<?php 
    session_start();
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
    <link rel="stylesheet" href="../css/estilos.css"> 
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
    <section class="contenedor">
        <h1 class="vinedos-h1">Viñedos</h1>
        <p class="nuestros-vinedos">Nuestros Viñedos</p>
        <p class="vinedos-txt">Conoce nuestra colección de viñedos que dejaran hasta el paladar
            más exigente satisfecho </p>
    </section>
    <section class="vinedo-banner vinedo-1">
        
            
            <div class="contenedorLince">
                 <!-- Carlitos aqui va el codigo para que redireccione
            a la pagina de la lupa y Saques los vinos que sean de Lince 
            te dejo para que pongas el hypervinculo
         el id de san Lince es= 1-->

                <h2><a href="../Lupa/index.php?vinedo=1"> Lince </a> </h2>
                <p>Ciudad de México</p>
            </div>
           
        </div>
    </section>
    <section class="datos-vinedo">
        <p>Para personas que ya estan en el mundo del vino pero aún desean encontrar nuevas sensaciones </p>
    </section>
    <section class="vinedo-banner vinedo-2">
        <div class="contenedorSanRafa">

            <!-- Carlitos aqui va el codigo para que redireccione
            a la pagina de la lupa y Saques los vinos que sean de San Rafa
            el id de san rafa es= 2 -->
            <h2><a href="../Lupa/index.php?vinedo=2"> San Rafa </a></h2>
            <p>San Miguel De Allende</p>
        </div>
    </section>
    <section class="datos-vinedo alt">
        <p>Nuestro viñedo para aquellas personas que desean experimentar nuevas sensaciones,
            desde un vino tinto hasta un rosado </p>
    </section>
    <section class="vinedo-banner vinedo-3">
        <div class="contenedorMon">
            <h2><a href="../exclusivo/index.php"> Mondragon </a>  </h2>
            <p>Guanajato</p>
        </div>
    </section>
    <section class="datos-vinedo">
        <p>El viñedo que extiende los sabores para aquellas personas 
            que desean probar lo mejor de la casa, hasta el paladar más exigente se rinde a este viñedo </p>
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