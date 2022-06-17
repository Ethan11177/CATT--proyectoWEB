<?php

    session_start();
    
    if (!isset($_SESSION["id"])) {
        header("localtion:./index.html");
    }else {

?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pofesores</title>
    <meta name='viewport' content='width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no'/>
    <script src="./JS/jquery_3.6.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="CSS/registro_alumno.css">
    <link rel="icon" href="IMG/Escudo.png" type="image/png" sizes="16x16">

    <script>
        $(document).ready(()=>{

            $("form#registroA").submit((e)=>{
                e.preventDefault();
                let info= {
                    correo : $("input#correo").val(),
                    contrasena : $("input#contrasena").val(),
                    nombre : $("input#nombre").val(),
                    ape_pa : $("input#apellido_pa").val(),
                    ape_ma : $("input#apellido_ma").val(),
                    tel : $("input#telefono").val()
                }

                

                $.ajax({
                    method:"POST",
                    url:"./PHP/ingresar_profesor.php",
                    data: info,
                    cache: false,
                    success:(respAX)=>{
                        
                        let AX = JSON.parse(respAX);
                        let fecha = new Date();

                        if (AX.cod != 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'CATT - ' + fecha.getDate() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                                didDestroy:()=>{
                                    window.location.href = AX.url
                                }
                            })
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'CATT - ' + fecha.getDate() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getFullYear(),
                                text: AX.msj,
                                confirmButtonText: 'OK',
                            })
                        }

                    }
                });

            });

        });
    </script>
    </head>
    <body>
        <header class="cabeza">
            <img src="IMG/Escudo.png" alt="Escudo de ESCOM.">
            <nav class="navegacion">
                <ul>
                    <li><a href="./PHP/index_administrador.php">ADMINISTRADOR</a></li>
                </ul>
            </nav>
        </header>
        <main class="cuerpo">
            <div id="contenedor">
                <form action="#" method="post" name="RegistroAlumnos" id="registroA">
                    <h3>Profesores</h3>
                    <fieldset id="f1">
                        <legend>Datos del Profesor</legend>
                        <input type="email" placeholder="Correo Electronico" maxlength="60" id="correo" autofocus="">
                        <input type="text" placeholder="Contraseña maximo 10 Caracteres" maxlength="10" id="contrasena">
                        <input type="text" placeholder="Nombre(s)" maxlength="40" id="nombre">
                        <input type="text" placeholder="Apellido Paterno" maxlength="40" id="apellido_pa">
                        <input type="text" placeholder="Apellido Materno" maxlength="40" id="apellido_ma">
                        <input type="tel" placeholder="Telefono" maxlength="10", id="telefono">
                    </fieldset>
                    <button type="submit" value="Registrar" id="bts">Registrar</button>
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