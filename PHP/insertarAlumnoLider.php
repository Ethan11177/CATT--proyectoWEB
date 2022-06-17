<?php
    $conexion = mysqli_connect("localhost", "root", "", "proyecto_web");
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $boleta = $_POST["boleta"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $contrasena = $_POST["contrasena"];
    $tituloTT = $_POST["tituloTT"];
    $descripcionTT = $_POST["descripcionTT"];
    
    $respAX = [];

    if ($nombre == "" || $apellido1 == "" || $apellido2 == "" || $boleta == "" || $correo == "" || $telefono == "" || $contrasena == "" || $tituloTT == "" || $descripcionTT == "") {
        $respAX["cod"] = 0;
        $respAX["msj"] = "Error Ingrese todos los datos";
        $respAX["url"] = "";
    }else {
        
        // Para el TT
        date_default_timezone_set("America/Mexico_City");
        $año = date("Y");
        $mes = date("n");
        $dia = date("d");
        $hora = date("H");
        $segundo = date("s");
        $minutos = date("i");
        if($mes >= 1 && $mes <= 6){$semestre = 01;}
        else{$semestre = 02;}
        $idTT = $año.$semestre.'-'.$dia.$mes.$hora.$minutos.$segundo;
        $sqlCheck = "SELECT * FROM alumno WHERE BOLETA = '$boleta' OR CORREO_ELECTRONICO = '$correo';";
        $res = mysqli_query($conexion, $sqlCheck);
        if(mysqli_num_rows($res) == 0) {
            $sqlReady1 = "INSERT INTO `trabajo_terminal`(`ID_TT`, `TITULO_TT`, `DESCRIPCION_TT`) VALUES ('$idTT','$tituloTT','$descripcionTT');";
            $sqlReady2 = "INSERT INTO `alumno`(`BOLETA`, `CONTRASENA`, `ID_TT`, `NOMBRE`, `APELLIDO_PA`, `APELLIDO_MA`, `CORREO_ELECTRONICO`, `TELEFONO`) VALUES ('$boleta','$contrasena','$idTT','$nombre','$apellido1','$apellido2','$correo','$telefono');";
        

            if (mysqli_query($conexion, $sqlReady1) && mysqli_query($conexion, $sqlReady2)) {
                $respAX["cod"] = 1;
                $respAX["msj"] = "Datos Ingresados de Manera Correcta";
                $respAX["url"] = "./index.html";
            }else {
                $respAX["cod"] = 0;
                $respAX["msj"] = "Error, No se pudieron Ingresar los datos";
                $respAX["url"] = "";
            }

        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Boleta o Correo registrado";
            $respAX["url"] = "";
        }
    }

    echo json_encode($respAX);
?>