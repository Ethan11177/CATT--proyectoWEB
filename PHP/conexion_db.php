<?php
    
    $conexion = mysqli_connect("localhost","root","","proyecto_web");

    $boleta = $_POST["boleta"];
    $contrasena = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $ape_pa = $_POST["ape_pa"];
    $ape_ma = $_POST["ape_ma"];
    $correo = $_POST["correo"];
    $tel = $_POST["tel"];

    $sqlCheck = "SELECT * FROM alumno WHERE BOLETA = '$boleta';";
    $res = mysqli_query($conexion,$sqlCheck);

    if (mysqli_num_rows($res)==0) {
        $sqlReady = "INSERT INTO alumno(`BOLETA`,`CONTRASENA`,`NOMBRE`,`APELLIDO_PA`,`APELLIDO_MA`,`CORREO_ELECTRONICO`,`TELEFONO`) VALUES('$boleta','$contrasena','$nombre','$ape_pa','$ape_ma','$correo','$tel');";
    
        $res = mysqli_query($conexion, $sqlReady);
        
        echo "Datos Insertados de Manera Correcta";

    }else {
        echo "ERROR\nLa Boleta ya esta en la Base de Datos";
    }
    
?>