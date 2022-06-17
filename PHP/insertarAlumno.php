<?php
    session_start();
    $conexion = mysqli_connect("localhost", "root", "", "proyecto_web");
    $identificar = $_SESSION["id"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $boleta = $_POST["boleta"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $contrasena = NULL;

    $respAX = [];

    if ($nombre == "" || $apellido1 == "" || $apellido2 == "" || $boleta == "" || $correo == "" ||  $telefono == "") {
        $respAX["cod"] = 0;
        $respAX["msj"] = "Error. Llene todos los campos";
        $respAX["url"] = "";
    }else {
        
        $sqlchecamosCantidadEquipo = "SELECT COUNT(*) FROM `alumno` WHERE ID_TT = (SELECT ID_TT from `alumno` WHERE BOLETA = $identificar);";
        $res = mysqli_query($conexion, $sqlchecamosCantidadEquipo);
        $capturoNumero = mysqli_fetch_row($res);
        $cantidad = $capturoNumero[0];
        if($cantidad < 4){

            $sqlchecamosRegistro = "SELECT BOLETA FROM `alumno` WHERE BOLETA = $boleta;";
            $res2 = mysqli_query($conexion, $sqlchecamosRegistro);

            if(mysqli_num_rows($res2) == 0){

                $queryID_TT = "SELECT ID_TT from `alumno` WHERE BOLETA = $identificar;";
                $res3 = mysqli_query($conexion, $queryID_TT);
                $capturoID = mysqli_fetch_row($res3);
                $idTT = $capturoID[0];
                $sqlInsertamos = "INSERT INTO `alumno`(`BOLETA`, `CONTRASENA`, `ID_TT`, `NOMBRE`, `APELLIDO_PA`, `APELLIDO_MA`, `CORREO_ELECTRONICO`, `TELEFONO`) VALUES ('$boleta','$contrasena','$idTT','$nombre','$apellido1','$apellido2','$correo','$telefono');";
                mysqli_query($conexion, $sqlInsertamos);
                
                $respAX["cod"] = 1;
                $respAX["msj"] = "Muy bien se registro los datos del Alumno";
                $respAX["url"] = "./index.html";

            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "Alumno ya registrado";
                $respAX["url"] = "";
            }
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Todos los alumnos ya registrados";
            $respAX["url"] = "";
        }
    }

    echo json_encode($respAX);
?>