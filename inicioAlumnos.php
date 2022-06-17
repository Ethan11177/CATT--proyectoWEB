<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./index.html");
    }else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styleInicioAlumnos.css">
    <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">
    <title>CATT - ESCOM</title>
</head>
<body>
    <header class="cabeza">
        <img src="IMG/Escudo.png" alt="Escudo de ESCOM.">
        <nav class="navegacion">
            <ul>
                <li><a href="pantalla_alumnos.php">DATOS</a></li>
                <li><a href="directores_Alumnos.php">DIRECTORES/SINODALES</a></li>
                <li><a href="./PHP/cerra_session.php">SALIR</a></li>
            </ul>
        </nav>
    </header>
    <main class="cuerpo">
        <div>
            <h2>¡Bienvenido!</h2>
            <img src="IMG/kisspng-computer-icons-student-icon-design-college-vector-students-5ada87512ed101.3670843215242709291918.png" alt="Estudiante">
        </div>
    </main>
    <footer class="pie">
        <p>Escuela Superior de Cómputo</p>
        <p>Av. Juan de Dios Bátiz s/n esq. Av. Miguel Othón de Mendizabal. Colonia Lindavista. Alcaldia: Gustavo A. Madero. C. P. 07738. Ciudad de México.</p>
        <p><a href="https://www.escom.ipn.mx">www.escom.ipn.mx</a></p>
        <div>
            <a href="mailto:direccion_escom@ipn.mx"><input type="image" src="ICO/Forward.ico" width="25" alt="Correo electronico"></a>
            <a href="https://www.facebook.com/escomipnmx" target="_blank"><input type="image" src="ICO/Facebook.ico" width="25" alt="Facebook"></a>
            <a href="https://twitter.com/escomunidad" target="_blank"><input type="image" src="ICO/Twitter.ico" width="25" alt="Twitter"></a>
        </div>
    </footer>
</body>
</html>

<?php

    }

?>