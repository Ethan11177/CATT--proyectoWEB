<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location:./../index.html");
    }
    else {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Le damos una descripcion a nuestra pagina -->
    <meta name="description" content="Nuestro proyecto web.">
    <!-- Le damos palabras clave de nuestra pagina -->
    <meta name="keywords" content="HTML, HTML5, CSS, JavaScript">
    <!-- Colocamos el icono en nuestra parte superior -->
    <link rel="icon" href="./../IMG/Escudo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="./../CSS/styleIndex.css">
    <title>CATT - ESCOM</title>
</head>
<body>
    <header class="cabeza">
        <img src="./../IMG/Escudo.png" alt="Escudo de ESCOM.">
        <nav class="navegacion">
            <ul>
                <li><a href="./cerra_session.php">SALIR</a></li>
                <!-- <li><a href="registro_alumno.html">REGISTRO ALUMNO</a></li> -->
            </ul>
        </nav>
    </header>
    <main class="cuerpo">
        <h1>Comisión Académica de Trabajos Terminales (CATT)</h1>
        <div>
            <div class="proto">
                <h2>Protocolo</h2>
                <img src="./../IMG/kisspng-pdf-adobe-acrobat-computer-icons-pdf-icon-5b23e6c8e168c0.9082328015290794969233.png">
                <h3>Registro</h3>
                <ul>
                    <li><a href="./../registro_profesor.php">Registro de Profesor</a></li>
                    <li><a href="./../profesores_administrador.php">Listado de profesores</a></li>
                </ul>
            </div>
            <div class="proto">
                <h2>Listado de TT's</h2>
                <img src="./../IMG/kisspng-pdf-adobe-acrobat-computer-icons-pdf-icon-5b23e6c8e168c0.9082328015290794969233.png">
                <h3>Trabajos terminales</h3>
                <a href="./../TrabajosTerminales_administrador.html">Listado de Trabajos Terminales</a>
            </div>
            <div class="proto">
                <h2>Alumnos</h2>
                <img src="./../IMG/kisspng-pdf-adobe-acrobat-computer-icons-pdf-icon-5b23e6c8e168c0.9082328015290794969233.png">
                <h3>Registro de alumnos inscritos</h3>
                <ul>
                    <li><a href="./listado_alumnos.php">Listado de Alumnos inscritos</a></li>
                </ul>
            </div>
        </div>
    </main>
    <footer class="pie">
        <p>Escuela Superior de Cómputo</p>
        <p>Av. Juan de Dios Bátiz s/n esq. Av. Miguel Othón de Mendizabal. Colonia Lindavista. Alcaldia: Gustavo A. Madero. C. P. 07738. Ciudad de México.</p>
        <p><a href="https://www.escom.ipn.mx">www.escom.ipn.mx</a></p>
        <div>
            <a href="mailto:direccion_escom@ipn.mx"><input type="image" src="./../ICO/Forward.ico" width="25" alt="Correo electronico"></a>
            <a href="https://www.facebook.com/escomipnmx" target="_blank"><input type="image" src="./../ICO/Facebook.ico" width="25" alt="Facebook"></a>
            <a href="https://twitter.com/escomunidad" target="_blank"><input type="image" src="./../ICO/Twitter.ico" width="25" alt="Twitter"></a>
        </div>
    </footer>
</body>
</html>

<?php
            }
?>
