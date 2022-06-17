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
    <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="CSS/style_eliminarAlumno.css">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/src/validetta.css" type="text/css" media="screen">
    <link rel="stylesheet" href="VALIDACION/validetta-1.0.1/">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/src/validetta.js"></script>
    <script type="text/javascript" src="VALIDACION/validetta-1.0.1/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CATT - ESCOM</title>
    <script>
        $(document).ready(()=>{
            // $("#actualizarAlumno").validetta();   //Revisar validetta
            $("form#eliminarAlumno").submit((e)=>{
                e.preventDefault();
                let info= {
                    boleta : $("input#boleta").val(),
                    clave : $("input#clave").val()
                }
                $.ajax({
                    method:"POST",
                    url:"./PHP/eliminamosAlumno.php",
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
                })  
            })
        })
    </script>
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
        <div>
            <h2>Eliminar alumno</h2>
            <form action="#" method="post" id="eliminarAlumno">
                <input type="text" placeholder="Ingrese la boleta del alumno a eliminar" id="boleta" maxlength="10" data-validetta="required,number,maxLength[10]" autofocus>
                <input type="password" placeholder="Contraseña" id="clave" autofocus maxlength="50" data-validetta="required,maxLength[50]">
                <button type="submit" value="Eliminar" id="eliminar">Eliminar</button>
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