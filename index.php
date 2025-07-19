<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Zircón Biker </title>
    <link rel="stylesheet" href="CSS/index.css" />
</head>

<body>
    <?php
    include "header.php"
    ?>
    <main id="main-content" class="contenido-principal">
    <div id="notification" class="hidden">Producto agregado al carrito</div>
        <section class="contenido_1">
            <p>
                Bienvenido a Zircon Biker<br>
                donde la calidad se encuentra <br>
                con la pasión por las dos ruedas.
            </p>
            <img id="motoprin-1" src="imgs/Logos/motoPrincipal1.png" alt="moto">
        </section>
        <section class="contenido_2  separador">
            <div class="saludo">
                <h2 class="saludo">¡hola motero!, qué deseas hacer hoy </h2>
            </div>
            <div class="img-contenedor">
                <div id="mot"><a href="catalogoMotos.php" style="text-decoration: none; color: black;">
                        <img src="imgs/Logos/LogoMotosP1.jpg" alt="Motos">
                        <p class="opcion">
                            Motos
                        </p>
                    </a>
                </div>
                <div id="acc"><a href="accesorios.php" style="text-decoration:none ; color:black">
                        <img src="imgs/Logos/LogoAccesorioP1.png" alt="Accesorios">
                        <p class="opcion">
                            Accesorios
                        </p>
                    </a>
                </div>
                <div id="ase"> <a href="contacto.php" style="text-decoration: none; color: black;">
                        <img src="imgs/Logos/LogoConsultaP1.jpg" alt="Asesoria">
                        <p class="opcion">
                            Asesoria
                        </p>
                    </a>
                </div>
            </div>
        </section>
        <section class="contenido_3">
            <div class="texto-c3">
                <p>
                    Los mejores modelos <br>
                    adaptados a tu estilo
                </p>
            </div>
            <div id="galeria">
                <img src="MOTOS/cuatrimoto.jpg" alt="Cuatrimoto" class="active">
                <img src="MOTOS/motodeportiva.jpg" alt="Moto Deportiva">
                <img src="MOTOS/motourbana.jpg" alt="Moto Urbana">
                <img src="imgs/Accesorios/1/principal.png" alt="Casco1">
                <img src="imgs/Accesorios/2/principal.png" alt="Guantes1">
                <img src="imgs/Accesorios/3/principal.png" alt="Casaca1">
                <img src="imgs/Accesorios/4/principal.png" alt="Casco2">
                <img src="imgs/Accesorios/5/principal.png" alt="Guantes2">
                <img src="imgs/Accesorios/6/principal.png" alt="Casaca3">
            </div>
        </section>
        <section class="contenido_4">
            <div class="contenedor">
                <div class="imagen">
                    <img src="imgs/Logos/financiamientoimg.png" alt="Persona con moto">
                </div>
                <div class="texto">
                    <h1>ESTÁS A UN SOLO PASO DE <span>LA MOTO DE TUS SUEÑOS</span></h1>
                    <div class="descripcion">
                        <h2>TÚ SÍ PUEDES TENER UNA <span>MOTO NUEVA</span></h2>
                        <div class="pregunta">
                            <h3>¿Necesitas financiamiento para tu moto?</h3>
                            <p>Ofrecemos opciones de financiamiento adaptadas a tu perfil
                                para que puedas adquirir la moto de tus sueños y alcanzar tus metas..</p>
                        </div>
                        <div class="simulacion">
                            <h3>Simula tu crédito</h3>
                            <p>Comienza ahora a organizar tus pagos. Con nuestro
                                simulador, puedes conocer el monto aproximado de
                                las cuotas antes de solicitar tu crédito.
                                Te ayudamos y asesoramos para que tomes la mejor decisión.</p>
                            <button class="button-section4" onclick="location.href='financiamiento.php'"> Financia
                                tu moto ahora</button>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <script type="module" src="JS/funcionalidades/index.js"></script>
    <script src="JS/animaciones/anime.min.js"></script>
    <script src="JS/animaciones/animarIndex.js"></script>
    <script src="JS/funcionalidades/alerta.js"></script>
    <script>
        console.log('<?php echo $_SESSION['mensaje']?>');
        <?php if (isset($_SESSION['mensaje'])){ ?>
            mostrarNotificacion('<?php echo $_SESSION['mensaje']?>');
        <?php }
        unset($_SESSION['mensaje']); ?>
    </script>
    <?php
    include "footer.php"
    ?>
</body>

</html>