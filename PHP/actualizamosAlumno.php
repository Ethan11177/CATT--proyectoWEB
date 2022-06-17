<?php
    session_start();

    if (!isset($_SESSION["id"])) {
        header("location: ./../index.html");
    }else{

        $conexion = mysqli_connect("localhost","root","","proyecto_web");
        
        $identificador = $_SESSION["id"];
        $boleta = $_POST["boleta"];
        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $contrasena = NULL;

        $respAX = [];

        if($boleta != NULL || $nombre != "" || $apellido1 != "" || $apellido2 != "" || $correo != "" || $telefono != ""){

            $consulta = "SELECT * FROM alumno WHERE ID_TT = (SELECT ID_TT from `alumno` WHERE BOLETA = $identificador) AND BOLETA = $boleta;";
            $res = mysqli_query($conexion, $consulta);

            if(mysqli_num_rows($res) == 1){

                $queryID_TT = "SELECT ID_TT from `alumno` WHERE BOLETA = $identificador;";
                $res3 = mysqli_query($conexion, $queryID_TT);
                $capturoID = mysqli_fetch_row($res3);

                $idTT = $capturoID[0];

                $actualizar = "UPDATE `alumno` SET `BOLETA`='$boleta',`CONTRASENA`='$contrasena',`ID_TT`='$idTT',`NOMBRE`='$nombre',`APELLIDO_PA`='$apellido1',`APELLIDO_MA`='$apellido2',`CORREO_ELECTRONICO`='$correo',`TELEFONO`='$telefono' WHERE BOLETA = $boleta;";
                mysqli_query($conexion, $actualizar);
                
                $respAX["cod"] = 1;
                $respAX["msj"] = "Todos los datos ingresados de manera correcta";
                $respAX["url"] = "./index.html";

            }else{
                $respAX["cod"] = 0;
                $respAX["msj"] = "No existe el registro ".$boleta;
                $respAX["url"] = "";
            }
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error llene todos los datos";
            $respAX["url"] = "";
        }

        mysqli_close($conexion);

        echo json_encode($respAX);

    }
?>