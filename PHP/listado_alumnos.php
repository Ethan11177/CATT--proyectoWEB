<?php

    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./index.html");
    }
    else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./../IMG/Escudo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="./../CSS/styleProfesores_administrador.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="./../VALIDACION/validetta-1.0.1/src/validetta.js"></script>
    <script type="text/javascript" src="./../VALIDACION/validetta-1.0.1/localization/validettaLang-es-ES.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>CATT - ESCOM</title>
    <script>

        $(document).ready(()=>{
            
            $.ajax({
                method:"POST",
                url:"./obtencion_datos_alumnos.php",
                cache: false,
                success:(respAX)=>{            
                    let AX = JSON.parse(respAX)
                    console.log(AX)

                    var div = document.getElementById("tabla")

                    for (let index = 0; index < AX.num; index++) {

                            var hijo = document.createElement("tr")
                            hijo.innerHTML = "<td>"+AX.db[index][3]+"</td><td>"+ AX.db[index][4] +" "+ AX.db[index][5] +"</td><td>"+ AX.db[index][6] +"</td><td>"+AX.db[index][7]+"</td><td> "+AX.db[index][0]+" </td>"
                
                            div.appendChild(hijo)
                    }
                }
            })

            $("form#modificadorA").submit((e)=>{

                e.preventDefault()

                $.ajax({
                    method:"POST",
                    url:"./modificar_eliminar_alumno.php",
                    data: $("form#modificadorA").serialize(),
                    cache: false,
                    success:(respAX)=>{
                        let AX = JSON.parse(respAX)

                        console.log(AX)

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
        <img src="./../IMG/Escudo.png" alt="Escudo de ESCOM.">
        <nav class="navegacion">
            <ul>
                <li><a href="./index_administrador.php">ADMINISTRADOR</a></li>
            </ul>
        </nav>
    </header>
    <main class="cuerpo">
        <div>
            <h2>Alumnos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Boleta</th>
                    </tr>
                </thead>
                <tbody id="tabla">
                </tbody>
            </table>
            <form action="#" method="post" name="modificadorA" id="modificadorA">

                <label for="Correo">Boleta que desea Modificar:</label>
                <input type="number" name="boleta" id="boleta">

                <label for="Correo">Correo:</label>
                <input type="email" name="correo" id="correo">

                <label for="nombre">Nombre(s):</label>
                <input type="text" name="nombre" id="nombre">

                <label for="apellidos">Apellido Paterno:</label>
                <input type="text" name="ape_p" id="ape_p">

                <label for="apellidos">Apellido Materno:</label>
                <input type="text" name="ape_m" id="ape_m">

                <label for="telefono">Teléfono:</label>
                <input type="tel" name="numero" id="numero" maxlength="10">

                <label for="opciones">Opciones de Modificacion:</label>
                <select name="opcion" id="opcion" data-validetta="required">
                    <option value="">-</option>
                    <option value="E">Eliminar</option>
                    <option value="M">Modificar</option>
                </select>

                <input type="submit" value="Ejecutar">
            </form>
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
