<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./index.html");
    }else {
        
        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        $identificador = $_SESSION["id"];
        $consultaSQL = "SELECT * FROM `alumno` WHERE ID_TT = (SELECT ID_TT FROM `alumno` WHERE BOLETA = $identificador);";
        $resultados = mysqli_query($conexion, $consultaSQL);
        $alumnos = "";
        while($fila = mysqli_fetch_row($resultados)){
            $alumnos .= "<tr><td>".$fila[0]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td></tr>";
        }
        $consultaSQLProfesores = "SELECT * FROM `directores_sinodales` WHERE ID_TT1 = (SELECT A.ID_TT FROM alumno A WHERE A.BOLETA = $identificador);";
        $resultados2 = mysqli_query($conexion, $consultaSQLProfesores);
        $profesores = "";
        while($fila2 = mysqli_fetch_row($resultados2)){
            $profesores .= "<tr><td>".$fila2[1]."</td><td>".$fila2[2]."</td></tr>";
        }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="CSS/stylepantalla_alumnos.css">
        <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/src/validetta.css" type="text/css" media="screen">
        <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="VALIDACION/validetta-1.0.1/src/validetta.js"></script>
        <script type="text/javascript" src="VALIDACION/validetta-1.0.1/localization/validettaLang-es-ES.js"></script>
        <title>CATT - ESCOM</title>
    </head>
    <body>
        <header class="cabeza">
            <img src="IMG/Escudo.png" alt="Escudo de ESCOM.">
            <nav class="navegacion">
                <ul>
                    <li><a href="inicioAlumnos.php">INICIO</a></li>
                    <li><a href="directores_Alumnos.php">DIRECTORES</a></li>
                    <li><a href="./PHP/cerra_session.php">SALIR</a></li>
                </ul>
            </nav>
        </header>
        <main class="cuerpo">
            <div>
                <h2>Datos generales</h2>
                <h3>Alumnos</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Boleta</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Correo electrónico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $alumnos; ?>
                    </tbody>
                </table>
                <h3>Directores y sinodales</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Correo electrónico</th>
                            <th>Cargo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $profesores; ?>
                    </tbody>
                </table>
                <a href="registro_alumno.php">Registrar alumno</a>
                <a href="actualizar_Alumno.php">Modificar alumno</a>
                <a href="eliminar_Alumno.php">Eliminar alumno</a>
                <button type="submit">Generar comprobante</button>
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