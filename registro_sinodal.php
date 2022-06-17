<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./index.html");
    }else {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nuestro proyecto web.">
    <meta name="keywords" content="HTML, HTML5, CSS, JavaScript">
    <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="CSS/style_registrarDirector.css">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/src/validetta.css" type="text/css" media="screen">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/src/validetta.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CATT - ESCOM</title>
    <script>
        $(document).ready(()=>{
            // $("#registrarDirector").validetta();   //Revisar validetta
            $("form#registrarDirector").submit((e)=>{
                e.preventDefault();
                let info= {
                correo : $("input#correo").val(),
                }
                $.ajax({
                    method:"POST",
                    url:"./PHP/<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./index.html");
    }else {

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nuestro proyecto web.">
    <meta name="keywords" content="HTML, HTML5, CSS, JavaScript">
    <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="CSS/style_registrarDirector.css">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/src/validetta.css" type="text/css" media="screen">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/src/validetta.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CATT - ESCOM</title>
    <script>
        $(document).ready(()=>{
            // $("#registrarDirector").validetta();   //Revisar validetta
            $("form#registrarDirector").submit((e)=>{
                e.preventDefault();
                let info= {
                correo : $("input#correo").val(),
                }
                $.ajax({
                    method:"POST",
                    url:"./PHP/registramosSinodal.php",
                    data: info,
                    cache: false,
                    success:(respAX)=>{
                        AX = JSON.parse(respAX)

                        //console.log(AX)

                        let fecha = new Date()

                        if (AX.cod != 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'CATT - ' + fecha.getDate() + " - " + (fecha.getMonth() + 1) + " - " + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                                didDestroy:()=>{
                                    window.location.href = AX.url
                                }
                            })
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'CATT - ' + fecha.getDate() + " - " + (fecha.getMonth() + 1) + " - " + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                                footer: '<a href="Index.html">Clic para regresar al inicio.</a>'
                            })
                        }
                    }
                });    
            });
        });
    </script>
    <title>CATT - ESCOM</title>
</head>
<body>
    <header class="cabeza">
        <img src="IMG/Escudo.png" alt="Escudo de ESCOM.">
        <nav class="navegacion">
            <ul>
                <li><a href="inicioAlumnos.php">INICIO</a></li>
                <li><a href="pantalla_alumnos.php">DATOS</a></li>
                <li><a href="directores_Alumnos.php">DIRECTORES</a></li>
                <li><a href="./PHP/cerra_session.php">SALIR</a></li>
            </ul>
        </nav>
    </header>
    <main class="cuerpo">
        <div id="contenedor">
            <h2>Registrar director</h2>
            <form action="#" method="post" id="registrarDirector">
                <input type="email" placeholder="Correo electrónico" id="correo" maxlength="50" data-validetta="required,email,maxLength[50]" autofocus>
                <button type="submit" value="Registrar" id="registro">Registrar</button>
            </form>
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

?>.php",
                    data: info,
                    cache: false,
                    success:(respAX)=>{
                        AX = JSON.parse(respAX)

                        //console.log(AX)

                        let fecha = new Date()

                        if (AX.cod != 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'CATT - ' + fecha.getDate() + " - " + (fecha.getMonth() + 1) + " - " + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                                didDestroy:()=>{
                                    window.location.href = AX.url
                                }
                            })
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'CATT - ' + fecha.getDate() + " - " + (fecha.getMonth() + 1) + " - " + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                                footer: '<a href="Index.html">Clic para regresar al inicio.</a>'
                            })
                        }
                    }
                });    
            });
        });
    </script>
    <title>CATT - ESCOM</title>
</head>
<body>
    <header class="cabeza">
        <img src="IMG/Escudo.png" alt="Escudo de ESCOM.">
        <nav class="navegacion">
            <ul>
                <li><a href="inicioAlumnos.php">INICIO</a></li>
                <li><a href="pantalla_alumnos.php">DATOS</a></li>
                <li><a href="directores_Alumnos.php">DIRECTORES</a></li>
                <li><a href="./PHP/cerra_session.php">SALIR</a></li>
            </ul>
        </nav>
    </header>
    <main class="cuerpo">
        <div id="contenedor">
            <h2>Registrar sinodal</h2>
            <form action="#" method="post" id="registrarDirector">
                <input type="email" placeholder="Correo electrónico" id="correo" maxlength="50" data-validetta="required,email,maxLength[50]" autofocus>
                <button type="submit" value="Registrar" id="registro">Registrar</button>
            </form>
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