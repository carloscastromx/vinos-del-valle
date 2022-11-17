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

                <div class="datos_Pedidos">
                    <p>#1</p>
                    <p>Nombre Vino 1</p>
                    <p class="direccion">Av. Francisco I. Madero, Lazaro Cardenas, 53560 Naucalpan de Juárez, Méx.</p>
                    <p>$500.50</p>
                </div>
            </section>
            <section class="section_Total">
                <div class="total_Titulo">
                    <h1>Total</h1>
                </div>
                <div class="cantidad_Total">
                    <p>$500.50</p>
                </div>

            </section>
            
        </div>
    </section>
    
</body>
</html>